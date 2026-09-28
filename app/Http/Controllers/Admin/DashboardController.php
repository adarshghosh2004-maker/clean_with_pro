<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AudioBook;
use App\Models\Author_Request;
use App\Models\Common;
use App\Models\Category;
use App\Models\Content_Transaction;
use App\Models\Feature;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Magazine;
use App\Models\Package;
use App\Models\Question;
use App\Models\Service;
use App\Models\User;
use App\Models\Video;
use App\Models\Language;
use App\Models\Novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class DashboardController extends Controller
{
    public $common;
    private $folder_category = "category";
    private $folder_author = "user";
    private $folder_langauge = "language";
    private $folder_novels = "novels";
    private $folder_magazines = "magazines";
    private $folder_audio_books = "audio_books";
    public function __construct()
    {
        $this->common = new Common;
    }

    /**
     * The only quote status that is allowed to contribute to earnings.
     *
     * A quote is a booking row in tbl_user. Status codes are:
     *   0 = pending   (draft/submitted, not yet accepted)
     *   1 = confirmed (shared/confirmed, work not finished yet)
     *   2 = completed (the confirmed amount was actually delivered)
     *   3 = cancelled
     * Only 2 counts towards earnings. Anything else is deliberately excluded.
     */
    const EARNING_STATUS = 2;

    /**
     * Base query for qualifying completed-service revenue.
     *
     * A row qualifies when the quote/booking (tbl_user) is marked Completed (status = 2)
     * and belongs to a service (service_id is not null). The amount recorded is the
     * quote's own amount (tbl_user.amount). Invoices (tbl_invoice.total) are not used
     * because they are admin-generated documents whose total can diverge from the
     * completed quote amount, causing inflated revenue.
     *
     * There is no soft-delete column on tbl_user, so deleted quotes are already gone
     * from the table and need no extra filter.
     */
    private function revenueBaseQuery()
    {
        return DB::table('tbl_user as u')
            ->where('u.status', self::EARNING_STATUS)
            ->whereNotNull('u.service_id');
    }

    /**
     * SQL expression for the final qualifying service amount.
     * Uses the completed quote's own amount field.
     */
    private function revenueAmountExpression()
    {
        return 'CAST(u.amount AS DECIMAL(15,2))';
    }

    /**
     * Total revenue for every qualifying completed service (all time).
     */
    private function getTotalRevenue()
    {
        $amountExpr = $this->revenueAmountExpression();

        $row = $this->revenueBaseQuery()
            ->selectRaw("COALESCE(SUM({$amountExpr}), 0) as total_revenue")
            ->first();

        return round((float) ($row->total_revenue ?? 0), 2);
    }

    /**
     * SQL expression that turns the varchar booking date into a real DATE.
     *
     * tbl_user.date is a varchar(255) column, so the stored 'Y-m-d' string has to be
     * cast before YEAR()/MONTH() can be trusted.
     *
     * The guards matter more than they look. STR_TO_DATE in this server's mode does
     * not return NULL for an unparseable value, it returns the literal string
     * '0000-00-00' — which is neither a date nor NULL, so it would sail past the
     * "undated" check and silently vanish from the reconciliation. Trimming first
     * also catches a date field holding nothing but spaces, and LEFT(..., 10) keeps
     * a stored '2026-09-14 10:30:00' parsing as the date it starts with.
     *
     * Anything still unparseable resolves to NULL and is reported separately as
     * undated earnings, so the month buckets always reconcile back to the total.
     */
    private function earningParsedDateExpression()
    {
        return "STR_TO_DATE(NULLIF(LEFT(NULLIF(TRIM(u.date), ''), 10), '0000-00-00'), '%Y-%m-%d')";
    }

    /**
     * Number of completed quotes that the earnings sum is built from.
     */
    private function getCompletedQuoteCount()
    {
        return (int) $this->revenueBaseQuery()->count();
    }

    /**
     * Year boundaries the Earning Analysis page is allowed to navigate between.
     *
     * The window is anchored on the real booking dates of the completed quotes and
     * widened to include the current year, so the steppers can never walk into a
     * period the system has no data for and can never get stuck before today.
     */
    private function earningYearBounds()
    {
        $dateExpr = $this->earningParsedDateExpression();
        $currentYear = (int) date('Y');

        $row = $this->revenueBaseQuery()
            ->selectRaw("MIN(YEAR({$dateExpr})) as min_year, MAX(YEAR({$dateExpr})) as max_year")
            ->first();

        $min = (int) ($row->min_year ?? 0);
        $max = (int) ($row->max_year ?? 0);

        return [
            'earliest' => $min > 0 ? min($min, $currentYear) : $currentYear,
            'latest'   => $max > 0 ? max($max, $currentYear) : $currentYear,
            'current'  => $currentYear,
        ];
    }

    /**
     * Month names used by the trend chart and the period captions. English only,
     * matching the axis labels the dashboard chart already renders.
     */
    private function earningMonthNames()
    {
        return [
            1 => 'January', 2 => 'February', 3 => 'March',     4 => 'April',
            5 => 'May',     6 => 'June',     7 => 'July',      8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',
        ];
    }

    /**
     * Accepts a 'Y-m-d' string and returns it only when it is a real calendar date.
     * Anything else is dropped rather than passed to SQL.
     */
    private function sanitizeEarningDate($value)
    {
        $value = trim((string) $value);

        if ($value === '') {
            return null;
        }

        $parsed = \DateTime::createFromFormat('Y-m-d', $value);

        if (!$parsed || $parsed->format('Y-m-d') !== $value) {
            return null;
        }

        return $value;
    }

    /**
     * Normalised filter state for the whole Earning Analysis page.
     *
     *   date_from / date_to  booking-date range on the quote itself
     *   year                 optional calendar year; when set it scopes the dataset
     *                       AND pins the trend chart to that year
     *   month                optional calendar month (1-12), across every year
     *   service_id           optional service; 0 is the real "Special Offer" bucket
     *   chart_view           'day' (one month, day by day), 'month' (12 months of a
     *                       year) or 'year' (a year window)
     *   chart_year           the year the trend chart is parked on
     *   chart_month          the month the trend chart is parked on, for 'day' only
     *   input_search         free text over customer / id / service
     *
     * Everything is validated here, so no caller can push an unsanitised value into
     * the query builders further down.
     */
    private function earningFilters(Request $request)
    {
        $bounds = $this->earningYearBounds();

        $dateFrom = $this->sanitizeEarningDate($request->input('date_from'));
        $dateTo = $this->sanitizeEarningDate($request->input('date_to'));

        // A reversed range would quietly return nothing; swap it instead.
        if ($dateFrom !== null && $dateTo !== null && $dateFrom > $dateTo) {
            list($dateFrom, $dateTo) = array($dateTo, $dateFrom);
        }

        $year = ctype_digit((string) $request->input('year')) ? (int) $request->input('year') : null;
        if ($year !== null && ($year < 1970 || $year > $bounds['latest'])) {
            $year = null;
        }

        $month = ctype_digit((string) $request->input('month')) ? (int) $request->input('month') : null;
        if ($month !== null && ($month < 1 || $month > 12)) {
            $month = null;
        }

        $serviceId = ctype_digit((string) $request->input('service_id')) ? (int) $request->input('service_id') : null;

        $chartView = in_array($request->input('chart_view'), array('year', 'day'), true)
            ? $request->input('chart_view')
            : 'month';

        $chartYear = ctype_digit((string) $request->input('chart_year')) ? (int) $request->input('chart_year') : null;

        $chartMonth = ctype_digit((string) $request->input('chart_month')) ? (int) $request->input('chart_month') : null;
        if ($chartMonth !== null && ($chartMonth < 1 || $chartMonth > 12)) {
            $chartMonth = null;
        }

        // The daily view plots a single month, so it parks on the month filter when
        // one is set and on the current month otherwise — the same default the
        // current-period card has always used for the monthly view.
        if ($chartMonth === null) {
            $chartMonth = $month !== null ? $month : (int) date('m');
        }

        $selection = array(
            'date_from'  => $dateFrom,
            'date_to'    => $dateTo,
            'year'       => $year,
            'month'      => $month,
            'service_id' => $serviceId,
        );

        if ($year !== null) {
            // A year filter pins the chart, so the chart follows the filter rather
            // than the data bounds. Clamping here would park the chart on a year
            // the selection has excluded, and a pinned chart cannot be stepped.
            $chartYear = $year;
        } else {
            // Otherwise the chart lives inside the years the selection really has.
            // Defaulting to the current year would render an empty chart whenever
            // the filters point at older data, which is the whole point of filtering.
            $selectionBounds = $this->earningSelectionYearBounds($selection);

            if ($chartYear === null) {
                $chartYear = $selectionBounds['latest'];
            }

            $chartYear = max($selectionBounds['earliest'], min($chartYear, $selectionBounds['latest']));
        }

        return [
            'date_from'  => $dateFrom,
            'date_to'    => $dateTo,
            'year'       => $year,
            'month'      => $month,
            'service_id' => $serviceId,
            'chart_view' => $chartView,
            'chart_year' => $chartYear,
            'chart_month' => $chartMonth,
            'search'     => trim((string) $request->input('input_search', '')),
        ];
    }

    /**
     * The years the *filtered selection* actually contains.
     *
     * The trend chart and its steppers move inside this, not inside the global
     * bounds: filtering to 2023-2024 should park the chart on 2024 and let the
     * steppers walk 2024 -> 2023, never out to today. A selection with no dated
     * completed quotes has nothing to narrow with, so it falls back to the
     * global bounds and the page shows the usual empty-chart state.
     */
    private function earningSelectionYearBounds(array $filters)
    {
        $dateExpr = $this->earningParsedDateExpression();

        $row = $this->filteredEarningQuery($filters)
            ->selectRaw("MIN(YEAR({$dateExpr})) as min_year, MAX(YEAR({$dateExpr})) as max_year")
            ->first();

        $min = (int) ($row->min_year ?? 0);
        $max = (int) ($row->max_year ?? 0);

        if ($min < 1 || $max < 1) {
            return $this->earningYearBounds();
        }

        return [
            'earliest' => $min,
            'latest'   => $max,
            'current'  => (int) date('Y'),
        ];
    }

    /**
     * The qualifying-revenue query with the page filters applied.
     */
    private function filteredEarningQuery(array $filters)
    {
        return $this->applyEarningFilters($this->revenueBaseQuery(), $filters);
    }

    /**
     * The page filters, applied to whichever base query is handed in.
     *
     * Both the earnings aggregates and the all-status breakdown are scoped by the
     * one date/service recipe, so a selection can never mean two different things
     * in two panels: the breakdown is the same selection as the cards above it, it
     * simply does not restrict itself to completed quotes.
     */
    private function applyEarningFilters($query, array $filters)
    {
        $dateExpr = $this->earningParsedDateExpression();

        if ($filters['date_from'] !== null) {
            $query->whereRaw("{$dateExpr} >= ?", array($filters['date_from']));
        }

        if ($filters['date_to'] !== null) {
            $query->whereRaw("{$dateExpr} <= ?", array($filters['date_to']));
        }

        if ($filters['service_id'] !== null) {
            $query->where('u.service_id', $filters['service_id']);
        }

        if ($filters['year'] !== null) {
            $query->whereRaw("YEAR({$dateExpr}) = ?", array($filters['year']));
        }

        if ($filters['month'] !== null) {
            $query->whereRaw("MONTH({$dateExpr}) = ?", array($filters['month']));
        }

        return $query;
    }

    /**
     * The single slice of calendar time the "current period" figures describe.
     *
     * It is whatever the trend chart is parked on, read inside the whole filtered
     * selection:
     *
     *   day   view -> the one calendar month of the chart's year the day view is
     *                 parked on (the month filter if one is set, otherwise the
     *                 current calendar month)
     *   month view -> one calendar month of the chart's year (the month filter if
     *                 one is set, otherwise the current calendar month)
     *   year  view -> the chart's year as a whole
     *
     * That is the point: the card always names the same slice of time the chart is
     * showing, so the two can never contradict each other, and the figure is still
     * measured inside every active filter. If a filter excludes that period, the
     * card reads zero with the rest of the page rather than quietly reporting a
     * period the user filtered out.
     *
     * @return array{year: int, month: int|null}
     *
     * Resolved once and handed to everything that needs it, so the summary card,
     * the trend chart, the volume chart and the insights can never end up
     * describing two different months of the same selection.
     */
    private function earningPeriodSlice(array $filters)
    {
        $currentMonth = $filters['month'] !== null ? (int) $filters['month'] : (int) date('m');

        return array(
            'year'  => (int) $filters['chart_year'],
            'month' => $filters['chart_view'] === 'year'
                ? null
                : ($filters['chart_view'] === 'day' ? (int) $filters['chart_month'] : $currentMonth),
        );
    }

    /**
     * Completed earnings for one explicit calendar slice, read inside the whole
     * filtered selection. Month = null means the year as a whole.
     */
    private function earningFigureForPeriod(array $filters, array $slice)
    {
        $amountExpr = $this->revenueAmountExpression();
        $dateExpr = $this->earningParsedDateExpression();
        $monthNames = $this->earningMonthNames();

        $year = (int) $slice['year'];
        $month = $slice['month'] === null ? null : (int) $slice['month'];

        $query = $this->filteredEarningQuery($filters)
            ->whereRaw("YEAR({$dateExpr}) = ?", array($year));

        if ($month !== null) {
            $query->whereRaw("MONTH({$dateExpr}) = ?", array($month));
        }

        $row = $query
            ->selectRaw("COUNT(*) as completed_quotes, COALESCE(SUM({$amountExpr}), 0) as earnings")
            ->first();

        return array(
            'year'             => $year,
            'month'            => $month,
            'label'            => $month === null ? (string) $year : $monthNames[$month] . ' ' . $year,
            'earnings'         => round((float) ($row->earnings ?? 0), 2),
            'completed_quotes' => (int) ($row->completed_quotes ?? 0),
        );
    }

    /**
     * The calendar slice immediately before the current one, measured over the
     * same filtered selection.
     *
     *   month view -> the preceding month, stepping back into December of the
     *                 previous year when the current slice is January
     *   year  view -> the preceding year
     *
     * Both sides come from the database, so a period with nothing completed in
     * it reports 0.00 rather than being hidden: "there were no completed quotes
     * then" is itself the fact the comparison is making.
     */
    private function earningPreviousPeriodFigure(array $filters, array $slice)
    {
        if ($slice['month'] === null) {
            $previous = array('year' => (int) $slice['year'] - 1, 'month' => null);
        } elseif ((int) $slice['month'] > 1) {
            $previous = array('year' => (int) $slice['year'], 'month' => (int) $slice['month'] - 1);
        } else {
            $previous = array('year' => (int) $slice['year'] - 1, 'month' => 12);
        }

        return $this->earningFigureForPeriod($filters, $previous);
    }

    /**
     * Earnings over time for the period the trend chart is showing.
     *
     * 'day'   view  -> every calendar day of one month
     * 'month' view  -> the twelve months of one year
     * 'year'  view  -> a rolling five-year window ending on the selected year
     *
     * The daily view is the same aggregation one bucket finer: the identical
     * completed-quote query, grouped by DAYOFMONTH() instead of MONTH(). The month
     * length comes from the calendar rather than being assumed, so a 28-day
     * February, a 29-day leap February, a 30-day month and a 31-day month each
     * produce exactly the days they have. A day with no completed quotes has no
     * row in the grouped result and is written out as 0.00 rather than dropped, so
     * the axis shows the whole month and the gaps stay visible as gaps.
     *
     * Only completed quotes (status = 2) are ever counted, and the same filters as
     * the rest of the page are applied, so the chart always reconciles with the
     * summary cards. Completed quotes whose booking date cannot be parsed carry no
     * year, so they cannot appear on a time axis; they are reported separately as
     * 'undated' instead of being silently dropped from the reconciliation.
     */
    private function earningTrend(array $filters)
    {
        $amountExpr = $this->revenueAmountExpression();
        $dateExpr = $this->earningParsedDateExpression();
        $bounds = $this->earningSelectionYearBounds($filters);
        $monthNames = $this->earningMonthNames();

        $year = (int) $filters['chart_year'];
        $month = (int) $filters['chart_month'];
        $pinned = $filters['year'] !== null;

        $buckets = array();
        $startYear = $year;
        $endYear = $year;

        if ($filters['chart_view'] === 'day') {
            /* 't' on the first of the month is the month's real length, so a leap
               February gets 29 buckets and a normal one 28 without either being
               hard-coded. */
            $daysInMonth = (int) date('t', mktime(0, 0, 0, $month, 1, $year));

            for ($d = 1; $d <= $daysInMonth; $d++) {
                $buckets[$d] = array(
                    'key'         => sprintf('%04d-%02d-%02d', $year, $month, $d),
                    'label'       => sprintf('%s %d, %d', $monthNames[$month], $d, $year),
                    'short_label' => (string) $d,
                );
            }

            $totals = $this->filteredEarningQuery($filters)
                ->whereRaw("YEAR({$dateExpr}) = ?", array($year))
                ->whereRaw("MONTH({$dateExpr}) = ?", array($month))
                ->selectRaw("DAYOFMONTH({$dateExpr}) as bucket, COUNT(*) as quote_count, COALESCE(SUM({$amountExpr}), 0) as earnings")
                ->groupBy('bucket')
                ->get()
                ->keyBy('bucket');
        } elseif ($filters['chart_view'] === 'year') {
            $startYear = $pinned ? $year : max($bounds['earliest'], $year - 4);
            $endYear = $year;

            for ($y = $startYear; $y <= $endYear; $y++) {
                $buckets[$y] = array('key' => (string) $y, 'label' => (string) $y, 'short_label' => (string) $y);
            }

            $totals = $this->filteredEarningQuery($filters)
                ->whereRaw("YEAR({$dateExpr}) BETWEEN ? AND ?", array($startYear, $endYear))
                ->selectRaw("YEAR({$dateExpr}) as bucket, COUNT(*) as quote_count, COALESCE(SUM({$amountExpr}), 0) as earnings")
                ->groupBy('bucket')
                ->get()
                ->keyBy('bucket');
        } else {
            for ($m = 1; $m <= 12; $m++) {
                $buckets[$m] = array(
                    'key'         => sprintf('%04d-%02d', $year, $m),
                    'label'       => $monthNames[$m],
                    'short_label' => substr($monthNames[$m], 0, 3),
                );
            }

            $totals = $this->filteredEarningQuery($filters)
                ->whereRaw("YEAR({$dateExpr}) = ?", array($year))
                ->selectRaw("MONTH({$dateExpr}) as bucket, COUNT(*) as quote_count, COALESCE(SUM({$amountExpr}), 0) as earnings")
                ->groupBy('bucket')
                ->get()
                ->keyBy('bucket');
        }

        $series = array();
        $categories = array();
        $periodTotal = 0.0;
        $periodQuotes = 0;
        $hasData = false;

        foreach ($buckets as $key => $bucket) {
            $row = $totals[$key] ?? null;

            $earnings = $row ? round((float) $row->earnings, 2) : 0.0;
            $quotes = $row ? (int) $row->quote_count : 0;

            $periodTotal += $earnings;
            $periodQuotes += $quotes;
            $hasData = $hasData || $earnings > 0;

            $categories[] = $bucket['short_label'];
            $series[] = array(
                'bucket'           => $bucket['key'],
                'label'            => $bucket['label'],
                'short_label'      => $bucket['short_label'],
                'earnings'         => $earnings,
                'completed_quotes' => $quotes,
            );
        }

        $undatedRow = $this->filteredEarningQuery($filters)
            ->whereRaw("{$dateExpr} IS NULL")
            ->selectRaw("COUNT(*) as quote_count, COALESCE(SUM({$amountExpr}), 0) as earnings")
            ->first();

        /* The steppers move by whatever unit the active view is drawn in: a month
           in the daily view, a year in the monthly and yearly views. The daily
           bounds put a month on the same line as a year, so it is held between
           January of the earliest year and December of the latest one; the yearly
           bounds are the year comparisons they have always been. */
        if ($filters['chart_view'] === 'day') {
            $position = $year * 12 + $month;
            $canStepBack = !$pinned && $position > ($bounds['earliest'] * 12 + 1);
            $canStepForward = !$pinned && $position < ($bounds['latest'] * 12 + 12);
        } else {
            $canStepBack = !$pinned && $year > $bounds['earliest'];
            $canStepForward = !$pinned && $year < $bounds['latest'];
        }

        return array(
            'view'              => $filters['chart_view'],
            'year'              => $year,
            'month'             => $month,
            'start_year'        => $startYear,
            'end_year'          => $endYear,
            'pinned'            => $pinned,
            'categories'        => $categories,
            'series'            => $series,
            'labels'            => array_column($series, 'label'),
            'earnings'          => array_column($series, 'earnings'),
            'completed_quotes'  => array_column($series, 'completed_quotes'),
            'period_total'      => round($periodTotal, 2),
            'period_quotes'     => $periodQuotes,
            'period_label'      => $filters['chart_view'] === 'year'
                ? ($startYear === $endYear ? (string) $year : $startYear . ' - ' . $endYear)
                : ($filters['chart_view'] === 'day'
                    ? $monthNames[$month] . ' ' . $year
                    : (string) $year),
            'has_data'          => $hasData,
            'earliest_year'     => $bounds['earliest'],
            'latest_year'       => $bounds['latest'],
            'can_step_back'     => $canStepBack,
            'can_step_forward'  => $canStepForward,
            'undated'           => array(
                'earnings'         => round((float) ($undatedRow->earnings ?? 0), 2),
                'completed_quotes' => (int) ($undatedRow->quote_count ?? 0),
            ),
        );
    }

    /**
     * The four summary figures for the page.
     *
     * Total / count / average describe the whole filtered selection. The current
     * period is passed in rather than queried here, so the card and the trend
     * chart are always reading the same month of the same selection instead of
     * two queries that can disagree.
     */
    private function earningSummary(array $filters, array $period)
    {
        $amountExpr = $this->revenueAmountExpression();

        $row = $this->filteredEarningQuery($filters)
            ->selectRaw("COUNT(*) as completed_quotes, COALESCE(SUM({$amountExpr}), 0) as total_earnings")
            ->first();

        $total = round((float) ($row->total_earnings ?? 0), 2);
        $count = (int) ($row->completed_quotes ?? 0);

        return array(
            'total_earnings'   => $total,
            'completed_quotes' => $count,
            'average_earnings' => $count > 0 ? round($total / $count, 2) : 0.0,
            'period_earnings'  => $period['earnings'],
            'period_quotes'    => $period['completed_quotes'],
            'period_label'     => $period['label'],
            'has_data'         => $count > 0,
        );
    }

    /**
     * Completed earnings split by the service each quote belongs to.
     *
     * Reads the real service_id on the quote and the real title in tbl_service, so
     * the slices are the services customers actually booked. service_id = 0 is the
     * "Special Offer" bucket and service titles that are missing fall back to a
     * neutral label, so no earnings are ever dropped. The tail beyond the top
     * services is grouped into a single "Other" slice, because a doughnut with
     * one hair-thin wedge per service is not a chart anybody can read.
     */
    private function earningDistribution(array $filters, $limit = 7)
    {
        $amountExpr = $this->revenueAmountExpression();

        $rows = $this->filteredEarningQuery($filters)
            ->leftJoin('tbl_service as s', 's.id', '=', 'u.service_id')
            ->selectRaw("u.service_id, s.title as service_title, COUNT(*) as quote_count, COALESCE(SUM({$amountExpr}), 0) as earnings")
            ->groupBy('u.service_id', 's.title')
            ->orderByDesc('earnings')
            ->get();

        $total = 0.0;
        $quotes = 0;

        foreach ($rows as $row) {
            $total += (float) $row->earnings;
            $quotes += (int) $row->quote_count;
        }

        $total = round($total, 2);

        $slices = array();
        $all = array();
        $other = null;

        foreach ($rows as $index => $row) {
            $title = trim((string) $row->service_title);

            if ($title === '') {
                $title = (int) $row->service_id === 0 ? __('label.special_offer') : __('label.service');
            }

            $slice = array(
                'service_id'       => (int) $row->service_id,
                'label'            => $title,
                'earnings'         => round((float) $row->earnings, 2),
                'completed_quotes' => (int) $row->quote_count,
                'share'            => $total > 0 ? round(((float) $row->earnings / $total) * 100, 1) : 0.0,
                'is_other'         => false,
            );

            /* Kept before the top-N cut so the highest and lowest *services* are
               real services, never the synthetic "Other" bucket. */
            $all[] = $slice;

            if ($index < $limit) {
                $slices[] = $slice;
            } else {
                if ($other === null) {
                    $other = array(
                        'service_id'       => null,
                        'label'            => __('label.other_services'),
                        'earnings'         => 0.0,
                        'completed_quotes' => 0,
                        'share'            => 0.0,
                        'is_other'         => true,
                    );
                }

                $other['earnings'] += $slice['earnings'];
                $other['completed_quotes'] += $slice['completed_quotes'];
            }
        }

        if ($other !== null) {
            $other['earnings'] = round($other['earnings'], 2);
            $other['share'] = $total > 0 ? round(($other['earnings'] / $total) * 100, 1) : 0.0;
            $slices[] = $other;
        }

        /* $all is already ordered by earnings descending, so the first row is the
           largest and the last row is the smallest. "Lowest" is only reported when
           there is a second, different service to compare against: with a single
           service the same figure is both the highest and the lowest, and printing
           it twice would read as two findings rather than one. */
        $highest = count($all) > 0 ? $all[0] : null;
        $lowest = null;

        if (count($all) > 1) {
            $candidate = $all[count($all) - 1];

            if ($candidate['label'] !== $highest['label'] || $candidate['earnings'] !== $highest['earnings']) {
                $lowest = $candidate;
            }
        }

        return array(
            'slices'           => $slices,
            'labels'           => array_column($slices, 'label'),
            'earnings'         => array_column($slices, 'earnings'),
            'total'            => $total,
            'completed_quotes' => $quotes,
            'distinct_services' => count($all),
            'highest'          => $highest,
            'lowest'           => $lowest,
            'has_data'         => count($slices) > 0,
        );
    }

    /**
     * Base query for the all-status analysis: every quote, whatever its status.
     *
     * Identical to revenueBaseQuery() except that it does not pin status = 2. The
     * service_id rule is kept so the pipeline view covers exactly the same quote
     * population the dashboard counters and the report table cover, and so a
     * status is never compared against a total built from a different set of
     * rows. This is a reporting query: nothing that reaches revenueBaseQuery()
     * is derived from it, so the earnings figure cannot move because a status
     * was added to the page.
     */
    private function quoteStatusBaseQuery()
    {
        return DB::table('tbl_user as u')
            ->whereNotNull('u.service_id');
    }

    /**
     * The quote statuses the page analyses, in pipeline order.
     *
     * The four the application actually uses are named, and any further status
     * code present in tbl_user is appended automatically rather than being left
     * out of the report — a new status added to the quote workflow shows up here
     * on its own instead of quietly inflating "everything else" or vanishing.
     *
     * Discovery is a real DISTINCT read of the table, not a guess, and it is
     * unfiltered by date on purpose: the set of statuses a system has is not a
     * property of the period the admin happens to be looking at, so filtering
     * to an empty month cannot make a real status disappear from the page.
     */
    private function quoteStatusCatalog()
    {
        $catalog = array(
            0 => array('label_key' => 'label.pending', 'badge' => 'status-0'),
            1 => array('label_key' => 'label.confirmed', 'badge' => 'status-1'),
            2 => array('label_key' => 'label.completed', 'badge' => 'status-2'),
            3 => array('label_key' => 'label.cancelled', 'badge' => 'status-3'),
        );

        try {
            $found = $this->quoteStatusBaseQuery()
                ->distinct()
                ->orderBy('u.status')
                ->pluck('u.status');
        } catch (Exception $e) {
            /* If the probe fails the four named statuses still render, which is a
               better outcome than taking the whole analysis panel down over it. */
            $found = array();
        }

        foreach ($found as $code) {
            $code = (int) $code;

            if (!array_key_exists($code, $catalog)) {
                $catalog[$code] = array(
                    'label_key' => 'label.quote_status_generic',
                    'badge'     => 'earn-status-chip--other',
                );
            }
        }

        $rows = array();
        $position = 0;

        foreach ($catalog as $code => $meta) {
            $rows[] = array(
                'code'      => $code,
                'label'     => $meta['label_key'] === 'label.quote_status_generic'
                    ? __('label.quote_status_generic', array('code' => $code))
                    : __($meta['label_key']),
                'badge'     => 'status-badge ' . $meta['badge'],
                'is_earning'=> $code === self::EARNING_STATUS,
                'position'  => $position++,
            );
        }

        return $rows;
    }

    /**
     * The quote pipeline for the current selection: every quote grouped by its
     * real status, with the count, the summed quote amount and the share of the
     * selection's quotes.
     *
     * This is reporting only. It reads the same quote rows and the same
     * tbl_user.amount field as the earnings aggregates, through the same filters,
     * but it never feeds them: the Total Earnings figure is still
     * SUM(amount) over revenueBaseQuery() alone (status = 2), so a pending,
     * confirmed or cancelled quote appears in this table as an amount and is
     * still worth nothing in the earnings cards.
     *
     * One GROUP BY produces the counts, so no quote can be counted twice, and
     * every status in the catalog is emitted even with a count of zero — an
     * admin looking at a month with no cancellations needs to be told that,
     * not shown a panel with a gap in it.
     */
    private function earningStatusBreakdown(array $filters, $currency)
    {
        $amountExpr = $this->revenueAmountExpression();

        $rows = $this->applyEarningFilters($this->quoteStatusBaseQuery(), $filters)
            ->selectRaw("u.status as status_code, COUNT(*) as quote_count, COALESCE(SUM({$amountExpr}), 0) as amount")
            ->groupBy('u.status')
            ->get();

        $measured = array();

        foreach ($rows as $row) {
            $measured[(int) $row->status_code] = array(
                'quote_count' => (int) $row->quote_count,
                'amount'      => round((float) $row->amount, 2),
            );
        }

        $totalQuotes = 0;
        $totalValue = 0.0;

        foreach ($measured as $row) {
            $totalQuotes += $row['quote_count'];
            $totalValue += $row['amount'];
        }

        $totalValue = round($totalValue, 2);

        $statuses = array();

        foreach ($this->quoteStatusCatalog() as $meta) {
            $row = isset($measured[$meta['code']])
                ? $measured[$meta['code']]
                : array('quote_count' => 0, 'amount' => 0.0);

            $statuses[] = array(
                'code'             => $meta['code'],
                'label'            => $meta['label'],
                'badge'            => $meta['badge'],
                'is_earning'       => $meta['is_earning'],
                'quote_count'      => $row['quote_count'],
                'amount'           => $row['amount'],
                'amount_formatted' => $this->formatEarning($row['amount'], $currency),
                'share'            => $totalQuotes > 0
                    ? round(($row['quote_count'] / $totalQuotes) * 100, 1)
                    : 0.0,
            );
        }

        return array(
            'statuses'         => $statuses,
            'labels'           => array_column($statuses, 'label'),
            'quote_counts'     => array_column($statuses, 'quote_count'),
            'total_quotes'     => $totalQuotes,
            'total_value'      => $totalValue,
            'total_value_formatted' => $this->formatEarning($totalValue, $currency),
            'has_data'         => $totalQuotes > 0,
        );
    }

    /**
     * Options for the filter controls, taken from the real tables.
     *
     * "Special Offer" is only offered when completed quotes actually use it, and the
     * year list is bounded by the booking dates that exist rather than by a guess.
     */
    private function earningFilterOptions()
    {
        $bounds = $this->earningYearBounds();

        $years = array();
        for ($y = $bounds['latest']; $y >= $bounds['earliest']; $y--) {
            $years[] = $y;
        }

        $services = Service::orderBy('title')->get(array('id', 'title'));

        $usesSpecialOffer = $this->revenueBaseQuery()->where('service_id', 0)->exists();
        if ($usesSpecialOffer) {
            $services = $services->prepend(new Service(array('id' => 0, 'title' => __('label.special_offer'))));
        }

        return array(
            'years'    => $years,
            'services' => $services,
            'months'   => $this->earningMonthNames(),
            'bounds'   => $bounds,
        );
    }

    /**
     * Money formatter shared by the view payloads, so a figure is rendered the same
     * way in the cards, the chart tooltips, the legend and the table.
     */
    private function formatEarning($amount, $currency)
    {
        return $currency . number_format((float) $amount, 2);
    }

    /**
     * The "Earning Insights" list: short factual statements, each one a direct
     * restatement of a number already calculated above.
     *
     * Two rules govern every sentence here:
     *
     *  1. Nothing is inferred. No sentence says a service is good, popular,
     *     underperforming or worth pushing, and none of them tells the reader
     *     what to do. Where a comparison is genuinely a comparison — the largest
     *     and the smallest service by completed earnings — it is stated as the
     *     numbers it is, and the amounts and quote counts are printed alongside
     *     it so the claim can be checked on the spot.
     *  2. Nothing is invented. Every figure arrives as an argument from
     *     summary / distribution / period / previous, all of which are read
     *     through revenueBaseQuery() (status = 2) with the page filters
     *     applied. An insight is never able to disagree with the card, the
     *     chart or the table above it.
     *
     * Items are omitted rather than padded: a selection with a single service
     *     has no "lowest earning service", so no such card is produced.
     *
     * Sentences carrying a count are built with trans_choice() rather than __(),
     * so "1 completed quote" and "2 completed quotes" both read correctly in every
     * language file instead of shipping an English plural into a translated page.
     */
    private function earningInsights(array $summary, array $distribution, array $period, array $previous, $currency)
    {
        $total = (float) $summary['total_earnings'];
        $count = (int) $summary['completed_quotes'];
        $services = (int) $distribution['distinct_services'];

        $items = array();

        $items[] = array(
            'id'    => 'completed_total',
            'icon'  => 'fa-solid fa-circle-check',
            'label' => __('label.earning_insight_completed_total'),
            'value' => $this->formatEarning($total, $currency),
            'text'  => trans_choice('label.earning_insight_completed_total_text', $count, array(
                'count'  => $count,
                'amount' => $this->formatEarning($total, $currency),
            )),
            'tone'  => 'neutral',
        );

        $highest = $distribution['highest'];
        $lowest = $distribution['lowest'];

        if ($highest !== null) {
            $items[] = array(
                'id'    => 'highest_service',
                'icon'  => 'fa-solid fa-arrow-up',
                'label' => __('label.earning_insight_highest_service'),
                'value' => $this->formatEarning($highest['earnings'], $currency),
                'text'  => $this->earningServiceInsightText($highest, __('label.earning_insight_rank_highest'), $services, $currency),
                'tone'  => 'up',
            );
        }

        if ($lowest !== null) {
            $items[] = array(
                'id'    => 'lowest_service',
                'icon'  => 'fa-solid fa-arrow-down',
                'label' => __('label.earning_insight_lowest_service'),
                'value' => $this->formatEarning($lowest['earnings'], $currency),
                'text'  => $this->earningServiceInsightText($lowest, __('label.earning_insight_rank_lowest'), $services, $currency),
                'tone'  => 'down',
            );
        }

        $items[] = array(
            'id'    => 'average',
            'icon'  => 'fa-solid fa-divide',
            'label' => __('label.earning_insight_average'),
            'value' => $this->formatEarning($summary['average_earnings'], $currency),
            'text'  => trans_choice('label.earning_insight_average_text', $count, array(
                'count'  => $count,
                'amount' => $this->formatEarning($summary['average_earnings'], $currency),
            )),
            'tone'  => 'neutral',
        );

        $periodQuotes = (int) $period['completed_quotes'];

        $items[] = array(
            'id'    => 'period',
            'icon'  => 'fa-solid fa-calendar-day',
            'label' => __('label.earning_insight_period'),
            'value' => $this->formatEarning($period['earnings'], $currency),
            'text'  => trans_choice('label.earning_insight_period_text', $periodQuotes, array(
                'period' => $period['label'],
                'amount' => $this->formatEarning($period['earnings'], $currency),
                'count'  => $periodQuotes,
            )),
            'tone'  => 'neutral',
        );

        /* The comparison is only offered when the selection actually has completed
           quotes in it. With an empty selection every period reads 0.00 and the
           statement "0.00 against 0.00" states nothing. */
        if ($count > 0) {
            $difference = round($period['earnings'] - $previous['earnings'], 2);

            $items[] = array(
                'id'    => 'previous_period',
                'icon'  => 'fa-solid fa-code-compare',
                'label' => __('label.earning_insight_previous_period'),
                'value' => $this->formatEarningDifference($difference, $currency),
                'text'  => __('label.earning_insight_previous_period_text', array(
                    'period'          => $period['label'],
                    'amount'          => $this->formatEarning($period['earnings'], $currency),
                    'previous'        => $previous['label'],
                    'previous_amount' => $this->formatEarning($previous['earnings'], $currency),
                    'difference'      => $this->formatEarningDifference($difference, $currency),
                )),
                'tone'  => $difference > 0 ? 'up' : ($difference < 0 ? 'down' : 'flat'),
            );
        }

        if ($services > 0) {
            $items[] = array(
                'id'    => 'services',
                'icon'  => 'fa-solid fa-layer-group',
                'label' => __('label.earning_insight_services'),
                'value' => (string) $services,
                'text'  => trans_choice('label.earning_insight_services_text', $services, array(
                    'services' => $services,
                    'amount'   => $this->formatEarning($total, $currency),
                )),
                'tone'  => 'neutral',
            );
        }

        return $items;
    }

    /**
     * The one sentence shared by the highest and the lowest service insight.
     *
     * $rank is the translated word for the comparison ("highest" / "lowest") so
     * each sentence reads correctly in every language file, and the counts and
     * amounts are printed inline so the comparison is verifiable rather than
     * asserted.
     *
     * The comparison clause is only added when there are at least two services
     * to compare. With a single service in the selection the same figure is
     * trivially both the largest and the smallest, and "the highest of the one
     * service" says nothing the plain sentence has not already said.
     */
    private function earningServiceInsightText(array $service, $rank, $services, $currency)
    {
        $quotes = (int) $service['completed_quotes'];

        $sentence = trans_choice('label.earning_insight_service_text', $quotes, array(
            'service' => $service['label'],
            'amount'  => $this->formatEarning($service['earnings'], $currency),
            'count'   => $quotes,
        ));

        if ($services < 2) {
            return $sentence;
        }

        return $sentence . ' ' . __('label.earning_insight_service_rank_text', array(
            'rank'     => $rank,
            'services' => $services,
        ));
    }

    /**
     * A signed money figure, used only for the period-over-period difference.
     * The sign is written out rather than implied by a colour, so the number
     * carries the meaning on its own.
     */
    private function formatEarningDifference($difference, $currency)
    {
        $difference = round((float) $difference, 2);

        if ($difference > 0) {
            return '+' . $this->formatEarning($difference, $currency);
        }

        if ($difference < 0) {
            return '-' . $this->formatEarning(abs($difference), $currency);
        }

        return $this->formatEarning(0, $currency);
    }

    /**
     * Everything the Earning Analysis page needs, for one filter state.
     *
     * The current-period slice is resolved once and handed to the summary, the
     * trend, the previous-period comparison and the insights, so the card, the
     * charts, the table and the insight sentences can never end up describing two
     * different months of the same selection.
     *
     * The service distribution is always read, even for the chart's AJAX
     * refresh, because two of the insights are service comparisons and a period
     * step must not leave half the insight list describing a different selection
     * than the other half.
     *
     * The status breakdown rides along for the same reason: it describes the same
     * selection, so a period step has to bring it along too. It is a leaf — read
     * here, rendered on the page, and never passed back into an earnings figure.
     */
    private function earningPayload(array $filters)
    {
        $currency = Currency_Code();
        $slice = $this->earningPeriodSlice($filters);
        $period = $this->earningFigureForPeriod($filters, $slice);
        $previous = $this->earningPreviousPeriodFigure($filters, $slice);

        $summary = $this->earningSummary($filters, $period);
        $trend = $this->earningTrend($filters);
        $distribution = $this->earningDistribution($filters);
        $statusBreakdown = $this->earningStatusBreakdown($filters, $currency);

        return array(
            'status'         => 200,
            'currency'       => $currency,
            'earning_status' => self::EARNING_STATUS,
            'filters'        => $filters,
            'summary'        => array_merge($summary, array(
                'total_earnings_formatted'   => $this->formatEarning($summary['total_earnings'], $currency),
                'average_earnings_formatted' => $this->formatEarning($summary['average_earnings'], $currency),
                'period_earnings_formatted'  => $this->formatEarning($summary['period_earnings'], $currency),
            )),
            'status_breakdown' => $statusBreakdown,
            'trend'          => array_merge($trend, array(
                'period_total_formatted'     => $this->formatEarning($trend['period_total'], $currency),
                'undated_earnings_formatted' => $this->formatEarning($trend['undated']['earnings'], $currency),
            )),
            'insights'       => $this->earningInsights($summary, $distribution, $period, $previous, $currency),
            'distribution'   => array_merge($distribution, array(
                'earnings_formatted' => array_map(function ($amount) use ($currency) {
                    return $this->formatEarning($amount, $currency);
                }, $distribution['earnings']),
            )),
        );
    }

    /**
     * Dedicated Earning Analysis page.
     *
     * Every *earnings* figure here is derived exclusively from completed quotes
     * (status = 2) and from the quote's own amount (tbl_user.amount). Pending,
     * confirmed and cancelled quotes contribute nothing, and invoice totals are
     * never touched.
     *
     * The one addition is the Quote Status Overview, a reporting panel that
     * counts and sums quotes of every status over the same filtered selection.
     * It is built by a separate query and is not an input to anything above it,
     * so the amounts it shows for pending, confirmed and cancelled quotes
     * cannot reach the Total Earnings card.
     */
    public function earning(Request $request)
    {
        try {
            $filters = $this->earningFilters($request);
            $payload = $this->earningPayload($filters);

            if ($request->ajax()) {
                return response()->json($payload);
            }

            return view('admin.earning.index', array_merge($payload, array(
                'has_completed_quotes' => $this->getCompletedQuoteCount() > 0,
                'filter_options'       => $this->earningFilterOptions(),
            )));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    /**
     * Trend series, summary figures and insight sentences for the requested
     * period, used by the Monthly / Yearly toggle and the period steppers. Only
     * completed quotes are ever counted, and the filters on the request are the
     * ones already applied to the page, so a step cannot quietly change what
     * "total" means.
     *
     * The insight list travels with the response rather than being rebuilt in the
     * browser: the period sentence and the previous-period comparison move with the
     * steppers, and a figure on screen is always one the server produced.
     *
     * The all-status breakdown travels with them for the same reason. A period
     * step re-reads the pipeline server-side rather than re-deriving it here, so
     * the status cards, the doughnut and the table below them always describe the
     * period the trend chart is parked on.
     */
    public function earningChartData(Request $request)
    {
        try {
            $payload = $this->earningPayload($this->earningFilters($request));

            return response()->json(array(
                'status'           => 200,
                'trend'            => $payload['trend'],
                'summary'          => $payload['summary'],
                'insights'         => $payload['insights'],
                'status_breakdown' => $payload['status_breakdown'],
            ));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    /**
     * Completed quotes behind the analysis table, paginated for DataTables.
     *
     * status = 2 is applied here as well as in the aggregates, so the table can
     * never show a quote the earnings figures do not include.
     */
    public function earningQuotes(Request $request)
    {
        try {
            $filters = $this->earningFilters($request);
            $currency = Currency_Code();
            $dateExpr = $this->earningParsedDateExpression();

            // Built on the query builder rather than the model because the page
            // filters are written against the same aliased date expression the
            // aggregates use, and the service title is needed in the same query.
            // The id is selected as quote_id so the table can order newest first:
            // a bare "id" would be ambiguous across the join, and an alias is
            // unambiguous in an ORDER BY.
            $query = DB::table('tbl_user as u')
                ->leftJoin('tbl_service as s', 's.id', '=', 'u.service_id')
                ->where('u.status', self::EARNING_STATUS)
                ->select(array('u.id as quote_id', 'u.name', 'u.email', 'u.service_id', 'u.date', 'u.amount', 's.title as service_title'));

            if ($filters['date_from'] !== null) {
                $query->whereRaw("{$dateExpr} >= ?", array($filters['date_from']));
            }

            if ($filters['date_to'] !== null) {
                $query->whereRaw("{$dateExpr} <= ?", array($filters['date_to']));
            }

            if ($filters['year'] !== null) {
                $query->whereRaw("YEAR({$dateExpr}) = ?", array($filters['year']));
            }

            if ($filters['month'] !== null) {
                $query->whereRaw("MONTH({$dateExpr}) = ?", array($filters['month']));
            }

            if ($filters['service_id'] !== null) {
                $query->where('u.service_id', $filters['service_id']);
            }

            if ($filters['search'] !== '') {
                $search = $filters['search'];
                $bookingId = ltrim($search, '0');
                $bookingId = $bookingId === '' ? '0' : $bookingId;

                $query->where(function ($q) use ($search, $bookingId) {
                    $q->where('u.name', 'LIKE', "%{$search}%")
                        ->orWhere('u.email', 'LIKE', "%{$search}%")
                        ->orWhere('u.phone', 'LIKE', "%{$search}%")
                        ->orWhere('u.suburb', 'LIKE', "%{$search}%")
                        ->orWhere('s.title', 'LIKE', "%{$search}%");

                    if (ctype_digit($bookingId)) {
                        $q->orWhere('u.id', (int) $bookingId);
                    }
                });
            }

            return DataTables()::of($query)
                ->addIndexColumn()
                ->addColumn('quote_no', function ($row) {
                    return '<span class="earn-cell-quote-no">' . str_pad($row->quote_id, 4, '0', STR_PAD_LEFT) . '</span>';
                })
                ->addColumn('customer', function ($row) {
                    $name = trim((string) $row->name) !== '' ? $row->name : '-';
                    $email = trim((string) $row->email) !== '' ? $row->email : '';

                    return '<div class="earn-cell-stack">'
                        . '<span class="earn-cell-strong">' . e($name) . '</span>'
                        . ($email !== '' ? '<small>' . e($email) . '</small>' : '')
                        . '</div>';
                })
                ->addColumn('service', function ($row) {
                    $title = trim((string) $row->service_title);

                    if ($title === '') {
                        $title = (int) $row->service_id === 0 ? __('label.special_offer') : __('label.service');
                    }

                    return e($title);
                })
                ->addColumn('quote_date', function ($row) {
                    $timestamp = strtotime((string) $row->date);

                    return $timestamp ? date('d M Y', $timestamp) : '-';
                })
                ->addColumn('amount', function ($row) use ($currency) {
                    return '<span class="earn-cell-amount">' . e($this->formatEarning($row->amount, $currency)) . '</span>';
                })
                ->addColumn('status', function ($row) {
                    return '<span class="primary-btn">' . e(__('label.completed')) . '</span>';
                })
                ->rawColumns(array('quote_no', 'customer', 'amount', 'status'))
                ->make(true);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function index()
    {
        try {
            $data['total_users'] = User::count();
            $data['total_services'] = Service::count();
            $data['total_videos'] = Video::count();
            $data['total_images'] = Gallery::count();
            $data['total_feedbacks'] = Feedback::count();
            $data['total_questions'] = Question::count();
            $data['pending_requests'] = User::where('status', 0)->whereNotNull('service_id')->count();
            $data['confirmed_requests'] = User::where('status', 1)->whereNotNull('service_id')->count();
            $data['completed_requests'] = User::where('status', 2)->whereNotNull('service_id')->count();
            $data['cancelled_requests'] = User::where('status', 3)->whereNotNull('service_id')->count();
            $data['active_services'] = Service::where('status', 1)->count();

            // User requests chart - Current Year and Current Month initial data
            $currentYear = (int)date('Y');
            $currentMonth = (int)date('m');

            // Year Data
            $yearCounts = User::whereNotNull('service_id')
                ->whereYear('created_at', $currentYear)
                ->selectRaw('MONTH(created_at) as month_num, COUNT(*) as aggregate')
                ->groupBy('month_num')
                ->pluck('aggregate', 'month_num')
                ->toArray();

            $user_year = [];
            for ($i = 1; $i <= 12; $i++) {
                $user_year[] = (int)($yearCounts[$i] ?? 0);
            }

            // Month Data
            $daysInMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->daysInMonth;
            $monthCounts = User::whereNotNull('service_id')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->selectRaw('DAY(created_at) as day_num, COUNT(*) as aggregate')
                ->groupBy('day_num')
                ->pluck('aggregate', 'day_num')
                ->toArray();

            $user_month = [];
            for ($i = 1; $i <= $daysInMonth; $i++) {
                $user_month[] = (int)($monthCounts[$i] ?? 0);
            }

            $data['user_year'] = $user_year;
            $data['user_year_total'] = array_sum($user_year);
            $data['user_month'] = $user_month;
            $data['current_year'] = $currentYear;
            $data['current_month'] = $currentMonth;

            // Top services with most requests
            $topServices = Service::withCount([
                'user_requests' => function ($query) {
                    $query->whereNotNull('service_id');
                }
            ])->orderBy('user_requests_count', 'desc')->limit(5)->get();

            $this->common->imageNameToUrl($topServices, 'banner_img', 'service');
            $data['top_services'] = $topServices;

            $data['recent_users'] = User::orderBy('created_at', 'desc')->limit(6)->get();

            // Revenue / earnings - total only (used by the Total Earnings card)
            $currency = Currency_Code();
            $totalEarnings = $this->getTotalRevenue();

            $data['currency'] = $currency;
            $data['total_earnings'] = $totalEarnings;
            $data['total_earnings_formatted'] = $currency . number_format($totalEarnings, 2);

            return view('admin.dashboard.dashboard', $data);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function getChartData(Request $request)
    {
        try {
            $view = $request->input('view', 'year');
            $year = (int)$request->input('year', date('Y'));
            $month = (int)$request->input('month', date('m'));

            $currentYear = (int)date('Y');
            $currentMonth = (int)date('m');

            if ($year > $currentYear) {
                $year = $currentYear;
            }

            if ($view === 'month') {
                if ($year === $currentYear && $month > $currentMonth) {
                    $month = $currentMonth;
                }
                if ($month < 1) $month = 1;
                if ($month > 12) $month = 12;

                $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

                $counts = User::whereNotNull('service_id')
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->selectRaw('DAY(created_at) as day_num, COUNT(*) as aggregate')
                    ->groupBy('day_num')
                    ->pluck('aggregate', 'day_num')
                    ->toArray();

                $data = [];
                $categories = [];
                $totalQuotes = 0;

                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $count = (int)($counts[$day] ?? 0);
                    $data[] = $count;
                    $categories[] = (string)$day;
                    $totalQuotes += $count;
                }

                $monthName = Carbon::createFromDate($year, $month, 1)->format('F Y');

                return response()->json([
                    'status' => 200,
                    'view' => 'month',
                    'year' => $year,
                    'month' => $month,
                    'month_name' => $monthName,
                    'days_in_month' => $daysInMonth,
                    'categories' => $categories,
                    'series_data' => $data,
                    'total_quotes' => $totalQuotes,
                    'is_current_month' => ($year === $currentYear && $month === $currentMonth)
                ]);
            } else {
                // Year view
                $counts = User::whereNotNull('service_id')
                    ->whereYear('created_at', $year)
                    ->selectRaw('MONTH(created_at) as month_num, COUNT(*) as aggregate')
                    ->groupBy('month_num')
                    ->pluck('aggregate', 'month_num')
                    ->toArray();

                $data = [];
                $totalQuotes = 0;
                for ($m = 1; $m <= 12; $m++) {
                    $count = (int)($counts[$m] ?? 0);
                    $data[] = $count;
                    $totalQuotes += $count;
                }

                return response()->json([
                    'status' => 200,
                    'view' => 'year',
                    'year' => $year,
                    'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    'series_data' => $data,
                    'total_quotes' => $totalQuotes
                ]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
