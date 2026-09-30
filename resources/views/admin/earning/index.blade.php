@extends('admin.layout.page-app')
@section('page_title', __('label.earning_analysis'))
@section('tab_title', __('label.earning_analysis'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')
        <div class="body-content earning-page">
            
            <div class="earn-head">
                <div class="earn-head__top">
                    <div class="earn-head__main">
                        <h1 class="earn-head__title">{{ __('label.earning_analysis') }}</h1>
                        <p class="earn-head__sub">{{ __('label.earning_analysis_subtitle') }}</p>
                    </div>
                    <p class="earn-scope-note">
                        <i class="fa-solid fa-lock"></i>
                        <span>{{ __('label.earnings_scope_note') }}</span>
                    </p>
                </div>

                <form method="GET" action="{{ route('admin.earning') }}" class="earn-filter-grid earn-head__filters"
                    id="earnFilters">
                    <div class="earn-field">
                        <label class="earn-field__label" for="earnDateFrom">{{ __('label.date_from') }}</label>
                        <input type="date" class="form-control" id="earnDateFrom" name="date_from"
                            value="{{ $filters['date_from'] }}" max="{{ date('Y-m-d') }}">
                    </div>
                    <div class="earn-field">
                        <label class="earn-field__label" for="earnDateTo">{{ __('label.date_to') }}</label>
                        <input type="date" class="form-control" id="earnDateTo" name="date_to"
                            value="{{ $filters['date_to'] }}" max="{{ date('Y-m-d') }}">
                    </div>
                    <div class="earn-field">
                        <label class="earn-field__label" for="earnMonth">{{ __('label.select_month') }}</label>
                        <select class="form-control" id="earnMonth" name="month">
                            <option value="">{{ __('label.all_months') }}</option>
                            @foreach ($filter_options['months'] as $monthNumber => $monthName)
                                <option value="{{ $monthNumber }}"
                                    @selected($filters['month'] === $monthNumber)>{{ $monthName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="earn-field">
                        <label class="earn-field__label" for="earnYear">{{ __('label.select_year') }}</label>
                        <select class="form-control" id="earnYear" name="year">
                            <option value="">{{ __('label.all_years') }}</option>
                            @foreach ($filter_options['years'] as $yearNumber)
                                <option value="{{ $yearNumber }}"
                                    @selected($filters['year'] === $yearNumber)>{{ $yearNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="earn-field">
                        <label class="earn-field__label" for="earnService">{{ __('label.select_service') }}</label>
                        <select class="form-control" id="earnService" name="service_id">
                            <option value="">{{ __('label.all_services') }}</option>
                            @foreach ($filter_options['services'] as $serviceOption)
                                <option value="{{ $serviceOption->id }}"
                                    @selected($filters['service_id'] === (int) $serviceOption->id)>
                                    {{ $serviceOption->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="earn-filter-actions">
                        <button type="submit" class="btn btn-default" id="earnApply">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                            <span>{{ __('label.apply_filters') }}</span>
                        </button>
                        <a class="btn btn-cancel" href="{{ route('admin.earning') }}" id="earnReset">
                            <i class="fa-solid fa-rotate-left"></i>
                            <span>{{ __('label.reset_filters') }}</span>
                        </a>
                    </div>
                </form>
            </div>
            <div class="row counter-row earn-section">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary earn-card--accent">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-sack-dollar fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.total_earnings') }}</span>
                                <h3 id="earnTotal">{{ $summary['total_earnings_formatted'] }}</h3>
                                <small class="earn-card__meta">
                                    {{ $distribution['distinct_services'] }} {{ __('label.services') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary earn-card--count">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-clipboard-check fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.completed_quotes') }}</span>
                                <h3 id="earnCount">{{ $summary['completed_quotes'] }}</h3>
                                <small class="earn-card__meta">
                                    {{ $filter_options['bounds']['earliest'] }}&ndash;{{ $filter_options['bounds']['latest'] }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-divide fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.average_earnings_per_completed_quote') }}</span>
                                <h3 id="earnAverage">{{ $summary['average_earnings_formatted'] }}</h3>
                                <small class="earn-card__meta earn-card__meta--figure">
                                    {{ $summary['completed_quotes'] }} {{ __('label.completed_quotes') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-calendar-day fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.current_period_earnings') }}</span>
                                <h3 id="earnPeriodValue">{{ $summary['period_earnings_formatted'] }}</h3>
                                <small class="earn-card__meta" id="earnPeriodLabel">{{ $summary['period_label'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── QUOTE STATUS OVERVIEW ───────────────────────────────────
                 The whole pipeline, not just the money.

                 Everything else on this page counts completed quotes only,
                 because that is what earnings means. This block is the other
                 half of the report: how many quotes exist in this selection at
                 all, what each status is worth, and where they sit on the way
                 from submitted to finished.

                 It is deliberately placed outside the @if ($has_completed_quotes)
                 branch. A month with six pending quotes and no completions is
                 exactly the month an admin needs this panel, so it renders on
                 an otherwise empty earnings page too.

                 Same filters as everything else: these figures are the
                 selection described at the top of the page, not a second
                 dataset with a selector of its own.                      --}}
            <div class="cart-bg earn-panel earn-section earn-status" id="earnStatusSection">
                <div class="box-title">
                    <div class="earn-panel__heading">
                        <h2 class="title"><i
                                class="fa-solid fa-diagram-project fa-lg mr-2"></i>{{ __('label.quote_status_overview') }}</h2>
                        <p class="earn-panel__sub">{{ __('label.quote_status_overview_subtitle') }}</p>
                    </div>
                </div>

                {{-- One card per status, in the order the pipeline runs. The
                     count is the figure; the value and the share sit under it
                     as the two things a count alone does not tell you.     --}}
                <ul class="earn-status__grid" id="earnStatusGrid">
                    @foreach ($status_breakdown['statuses'] as $statusRow)
                        <li class="earn-status-card @if ($statusRow['is_earning']) earn-status-card--earning @endif"
                            data-earn-status="{{ $statusRow['code'] }}">
                            <span class="earn-status-card__head">
                                <span class="{{ $statusRow['badge'] }}">{{ $statusRow['label'] }}</span>
                            </span>
                            <span class="earn-status-card__count" data-earn-status-count>{{ $statusRow['quote_count'] }}</span>
                            <span class="earn-status-card__label">{{ __('label.total_quotes') }}</span>
                            <span class="earn-status-card__foot">
                                <span class="earn-status-card__value" data-earn-status-amount>{{ $statusRow['amount_formatted'] }}</span>
                                <span class="earn-status-card__share" data-earn-status-share>{{ $statusRow['share'] }}%</span>
                            </span>
                            <progress class="earn-status-card__meter earn-status-card__meter--{{ $statusRow['code'] }}"
                                value="{{ $statusRow['share'] }}" max="100"
                                data-earn-status-bar
                                aria-label="{{ $statusRow['label'] }}"></progress>
                        </li>
                    @endforeach
                </ul>

                {{-- The plot and the table are rendered together and toggled as
                     one, because "no quotes in this period" has to say so once.
                     Both branches are in the markup from the start: a period step
                     swaps them in place, so the panel never re-fetches itself. --}}
                <div class="row earn-grid earn-status__body @if (!$status_breakdown['has_data']) d-none @endif"
                    id="earnStatusBody">
                        <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                            <div class="earn-plot earn-status__plot">
                                <div id="earnStatusChart"></div>
                            </div>
                        </div>

                        {{-- The same numbers the doughnut is drawing, in reading
                             order, so the chart is never the only place a
                             figure exists. Completed is marked as the row that
                             feeds the earnings card; the others are marked as
                             carrying no earnings.                          --}}
                        <div class="col-lg-7 col-12">
                            <div class="table-responsive">
                                <table class="table table-striped text-center table-bordered earn-status__table"
                                    id="earnStatusTable">
                                    <thead>
                                        <tr class="table-bg">
                                            <th class="text-left">{{ __('label.status') }}</th>
                                            <th>{{ __('label.total_quotes') }}</th>
                                            <th class="earn-cell-amount-cell">{{ __('label.total_quote_value') }}</th>
                                            <th>{{ __('label.percentage') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($status_breakdown['statuses'] as $statusRow)
                                            <tr data-earn-status-row="{{ $statusRow['code'] }}"
                                                @if ($statusRow['is_earning']) class="earn-status__row--earning" @endif>
                                                <td class="text-left">
                                                    <span class="earn-status__label">
                                                        <span class="{{ $statusRow['badge'] }}">{{ $statusRow['label'] }}</span>
                                                        @if ($statusRow['is_earning'])
                                                            <i class="fa-solid fa-circle-check earn-status__earnings-flag"
                                                                title="{{ __('label.counted_in_earnings') }}"></i>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td data-earn-status-row-count>{{ $statusRow['quote_count'] }}</td>
                                                <td class="earn-cell-amount-cell">
                                                    <span class="earn-cell-amount"
                                                        data-earn-status-row-amount>{{ $statusRow['amount_formatted'] }}</span>
                                                </td>
                                                <td data-earn-status-row-share>{{ $statusRow['share'] }}%</td>
                                            </tr>
                                        @endforeach
                                        <tr class="earn-status__row--total">
                                            <td class="text-left">{{ __('label.total_quotes') }}</td>
                                            <td data-earn-status-total-count>{{ $status_breakdown['total_quotes'] }}</td>
                                            <td class="earn-cell-amount-cell">
                                                <span class="earn-cell-amount"
                                                    data-earn-status-total-amount>{{ $status_breakdown['total_value_formatted'] }}</span>
                                            </td>
                                            <td>100%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="earn-empty earn-empty--inline @if ($status_breakdown['has_data']) d-none @endif"
                    id="earnStatusEmpty">
                    <span class="earn-empty__icon"><i class="fa-solid fa-diagram-project"></i></span>
                    <p class="earn-empty__text">{{ __('label.no_quotes_in_selection') }}</p>
                    <p class="earn-empty__hint">{{ __('label.no_quotes_in_selection_hint') }}</p>
                </div>

                {{-- The one sentence that keeps the two halves of this page
                     from being confused. The amounts above are the value of the
                     work sitting in each state, not revenue: only the completed
                     row is inside the Total Earnings card.                --}}
                <small class="earn-note">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>{{ __('label.quote_status_earnings_note') }}</span>
                </small>
            </div>

            @if ($has_completed_quotes)
                {{-- ── ANALYTICS ─────────────────────────────────────────────────
                     Three panels sharing one period. The trend and the volume
                     plot read the same buckets as each other, so a tall month is
                     visibly the same month in both. The trend panel is the
                     designed Earnings panel from the shared stylesheet, reused
                     as-is by rendering the plot as #revenueChart inside a
                     .cart-bg.                                                        --}}
                <div class="row earn-grid earn-section">
                    <div class="col-xl-8 col-12 mb-4">
                        <div class="cart-bg earn-panel">
                            <div class="box-title d-flex justify-content-between align-items-center flex-wrap">
                                <div class="earn-panel__heading">
                                    <h2 class="title"><i
                                            class="fa-solid fa-chart-column fa-lg mr-2"></i>{{ __('label.earnings_trend') }}</h2>
                                    <p class="earn-panel__sub">{{ __('label.earnings_trend_subtitle') }}</p>
                                </div>
                                <div class="dash-chart-btns">
                                    <button type="button" class="dash-chart-btn @if ($filters['chart_view'] === 'day') active @endif"
                                        data-earn-view="day" id="earnViewDay">{{ __('label.daily') }}</button>
                                    <button type="button" class="dash-chart-btn @if ($filters['chart_view'] === 'month') active @endif"
                                        data-earn-view="month" id="earnViewMonth">{{ __('label.monthly') }}</button>
                                    <button type="button" class="dash-chart-btn @if ($filters['chart_view'] === 'year') active @endif"
                                        data-earn-view="year" id="earnViewYear">{{ __('label.yearly') }}</button>
                                </div>
                            </div>

                            <div class="month-nav-wrapper d-flex mt-3 p-2 bg-light rounded justify-content-between align-items-center">
                                <button type="button" id="earnPrevBtn" class="btn btn-sm btn-outline-secondary font-weight-bold"
                                    @disabled(!$trend['can_step_back']) title="{{ __('label.previous_period') }}">
                                    <i class="fa-solid fa-chevron-left mr-1"></i>
                                    <span class="d-none d-sm-inline">{{ __('label.previous_period') }}</span>
                                </button>
                                <div class="text-center">
                                    <span id="earnTrendPeriod"
                                        class="h6 mb-0 font-weight-bold text-dark d-block">{{ $trend['period_label'] }}</span>
                                    <small id="earnTrendTotal" class="text-muted font-weight-semibold">
                                        {{ __('label.earnings_period_total') }}: {{ $trend['period_total_formatted'] }}
                                    </small>
                                </div>
                                <button type="button" id="earnNextBtn" class="btn btn-sm btn-outline-secondary font-weight-bold"
                                    @disabled(!$trend['can_step_forward']) title="{{ __('label.next_period') }}">
                                    <span class="d-none d-sm-inline">{{ __('label.next_period') }}</span>
                                    <i class="fa-solid fa-chevron-right ml-1"></i>
                                </button>
                            </div>

                            <div class="chart-body position-relative mt-3">
                                <div id="earnChartLoading" class="chart-loading-overlay d-none">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div id="revenueChart"></div>
                            </div>

                            <small id="revEmptyNote"
                                class="text-muted @if ($trend['has_data']) d-none @endif">{{ __('label.no_completed_earnings') }}</small>

                            <small id="earnUndatedNote"
                                class="earn-note @if ($trend['undated']['completed_quotes'] === 0) d-none @endif">
                                {{ __('label.undated_earnings_note', ['count' => $trend['undated']['completed_quotes']]) }}
                            </small>

                            <small id="earnPinnedNote"
                                class="earn-note @if (!$trend['pinned']) d-none @endif">{{ __('label.earnings_trend_pinned') }}</small>
                        </div>
                    </div>

                    <div class="col-xl-4 col-12 mb-4">
                        <div class="cart-bg earn-panel">
                            <div class="box-title">
                                <div class="earn-panel__heading">
                                    <h2 class="title"><i
                                            class="fa-solid fa-chart-pie fa-lg mr-2"></i>{{ __('label.earnings_by_service') }}</h2>
                                    <p class="earn-panel__sub">{{ __('label.earnings_by_service_subtitle') }}</p>
                                </div>
                            </div>

                            @if ($distribution['has_data'])
                                <div class="earn-plot">
                                    <div id="earnServiceChart"></div>
                                </div>

                                <ul class="earn-legend">
                                    @foreach ($distribution['slices'] as $slice)
                                        <li class="earn-legend__row">
                                            <div class="earn-legend__line">
                                                <span class="earn-legend__chip earn-dot-{{ ($loop->index % 8) + 1 }}"></span>
                                                <span class="earn-legend__label">{{ $slice['label'] }}</span>
                                                <span class="earn-legend__share"
                                                    title="{{ __('label.earnings_share') }}">{{ $slice['share'] }}%</span>
                                                <span
                                                    class="earn-legend__value">{{ $distribution['earnings_formatted'][$loop->index] }}</span>
                                            </div>
                                            <span class="earn-legend__track">
                                                <span class="earn-legend__bar earn-dot-{{ ($loop->index % 8) + 1 }}"></span>
                                            </span>
                                            <p class="earn-legend__meta">
                                                {{ $slice['completed_quotes'] }} {{ __('label.completed_quotes') }}
                                            </p>
                                        </li>
                                    @endforeach
                                    <li class="earn-legend__total">
                                        <span class="earn-legend__total-label">{{ __('label.total_earnings') }}</span>
                                        <span
                                            class="earn-legend__total-value">{{ $currency }}{{ number_format($distribution['total'], 2) }}</span>
                                    </li>
                                </ul>
                            @else
                                <div class="earn-empty earn-empty--inline">
                                    <span class="earn-empty__icon"><i class="fa-solid fa-chart-pie"></i></span>
                                    <p class="earn-empty__text">{{ __('label.no_completed_earnings') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Quote volume. The same buckets as the trend above, counting
                     completed quotes instead of money, so the two panels together
                     answer "how much" and "how many" over one period. The counts
                     come from the same GROUP BY that produces the earnings series,
                     which is why the two can never disagree. --}}
                <div class="row earn-grid earn-section">
                    <div class="col-12 mb-4">
                        <div class="cart-bg earn-panel">
                            <div class="box-title d-flex justify-content-between align-items-center flex-wrap">
                                <div class="earn-panel__heading">
                                    <h2 class="title"><i
                                            class="fa-solid fa-chart-simple fa-lg mr-2"></i>{{ __('label.completed_quote_volume') }}</h2>
                                    <p class="earn-panel__sub">{{ __('label.completed_quote_volume_subtitle') }}</p>
                                </div>
                            </div>

                            <div class="chart-body position-relative mt-3">
                                <div id="earnVolumeLoading" class="chart-loading-overlay d-none">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div id="earnVolumeChart"></div>
                            </div>

                            <div class="earn-volume__total">
                                <span class="earn-volume__total-label">{{ __('label.earnings_period_total') }}</span>
                                <span class="earn-volume__total-value" id="earnVolumeTotal">
                                    {{ $trend['period_quotes'] }} {{ __('label.completed_quotes') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── REPORT ───────────────────────────────────────────────────
                     The completed quotes behind every figure above. The footer
                     repeats the selection's three totals, read from the same
                     query, so the body of the table and the number under it are
                     the same number.                                            --}}
                <div class="cart-bg earn-table earn-section">
                    <div class="box-title d-flex justify-content-between align-items-center flex-wrap">
                        <div class="earn-panel__heading">
                            <h2 class="title"><i
                                    class="fa-solid fa-list-check fa-lg mr-2"></i>{{ __('label.report_completed_earnings') }}</h2>
                            <p class="earn-panel__sub">{{ __('label.report_completed_earnings_subtitle') }}</p>
                        </div>
                        <div class="earn-field earn-field--search">
                            <label class="visually-hidden" for="earnSearch">{{ __('label.search') }}</label>
                            <input type="search" class="form-control" id="earnSearch" autocomplete="off"
                                placeholder="{{ __('label.search_earnings') }}">
                        </div>
                    </div>

                    <div class="table-responsive table">
                        <table class="table table-striped text-center table-bordered" id="earnQuotesTable">
                            <thead>
                                <tr class="table-bg">
                                    <th>{{ __('label.#') }}</th>
                                    <th>{{ __('label.quote_no') }}</th>
                                    <th>{{ __('label.customer') }}</th>
                                    <th>{{ __('label.service') }}</th>
                                    <th>{{ __('label.quote_date') }}</th>
                                    <th class="earn-cell-amount-cell">{{ __('label.amount') }}</th>
                                    <th>{{ __('label.status') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="earn-report-foot">
                        <div class="earn-report-foot__stat">
                            <span class="earn-report-foot__label">{{ __('label.completed_quotes') }}</span>
                            <span class="earn-report-foot__value">{{ $summary['completed_quotes'] }}</span>
                        </div>
                        <div class="earn-report-foot__stat">
                            <span class="earn-report-foot__label">{{ __('label.average') }}</span>
                            <span class="earn-report-foot__value">{{ $summary['average_earnings_formatted'] }}</span>
                        </div>
                        <div class="earn-report-foot__stat">
                            <span class="earn-report-foot__label">{{ __('label.total_earnings') }}</span>
                            <span class="earn-report-foot__value earn-report-foot__value--money"
                                id="earnReportTotal">{{ $summary['total_earnings_formatted'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- ── INSIGHTS ──────────────────────────────────────────────────
                     The same numbers again, written out as sentences.

                     Each card is a restatement of a figure already calculated
                     above, not a judgement: nothing here says a service is good,
                             popular, weak or worth pushing, and nothing recommends an
                     action. Where a card does compare — the largest and the
                     smallest service by completed earnings — it prints the amounts
                     and the quote counts that produced the comparison, so the
                     statement can be checked against the report table rather than
                             taken on trust.                                               --}}
                <div class="cart-bg earn-section">
                    <div class="box-title">
                        <div class="earn-panel__heading">
                            <h2 class="title"><i
                                    class="fa-solid fa-lightbulb fa-lg mr-2"></i>{{ __('label.earning_insights') }}</h2>
                            <p class="earn-panel__sub">{{ __('label.earning_insights_subtitle') }}</p>
                        </div>
                    </div>

                    @if (count($insights) > 0)
                        <ul class="earn-insights__grid">
                            @foreach ($insights as $insight)
                                <li class="earn-insight earn-insight--{{ $insight['tone'] }}"
                                    data-earn-insight="{{ $insight['id'] }}">
                                    <span class="earn-insight__label">
                                        <i class="{{ $insight['icon'] }}"></i>
                                        <span>{{ $insight['label'] }}</span>
                                    </span>
                                    <span class="earn-insight__value" data-earn-insight-value>{{ $insight['value'] }}</span>
                                    <p class="earn-insight__text" data-earn-insight-text>{{ $insight['text'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="earn-empty earn-empty--inline">
                            <span class="earn-empty__icon"><i class="fa-solid fa-lightbulb"></i></span>
                            <p class="earn-empty__text">{{ __('label.no_completed_earnings') }}</p>
                        </div>
                    @endif
                </div>
            @else
                {{-- Nothing has ever been completed: the page says so once, in
                     full, instead of five times across charts that would all be
                     empty.                                                            --}}
                <div class="earn-empty">
                    <span class="earn-empty__icon"><i class="fa-solid fa-receipt"></i></span>
                    <p class="earn-empty__text">{{ __('label.no_completed_earnings') }}</p>
                    <p class="earn-empty__hint">{{ __('label.no_completed_earnings_hint') }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(document).ready(function () {

            var EARN = {
                currency: @json($currency),
                urls: {
                    chart: @json(route('admin.earning.chart.data')),
                    quotes: @json(route('admin.earning.quotes.data'))
                },
                text: {
                    trend: @json(__('label.earnings_trend')),
                    trendEmpty: @json(__('label.no_completed_earnings')),
                    total: @json(__('label.total_earnings')),
                    totalQuotes: @json(__('label.total_quotes')),
                    periodTotal: @json(__('label.earnings_period_total')),
                    share: @json(__('label.earnings_share')),
                    undated: @json(__('label.undated_earnings_note')),
                    volume: @json(__('label.completed_quote_volume')),
                    completedQuotes: @json(__('label.completed_quotes')),
                    statusEmpty: @json(__('label.no_quotes_in_selection'))
                },
                trend: @json($trend),
                statusBreakdown: @json($status_breakdown),
                filters: @json($filters)
            };

            /* Category colours are declared once, in the admin stylesheet
               (section 10.1 of style.css) and read back out of it here, so a
               legend chip can never be a different colour from the slice it
               labels. */
            function earnPalette() {
                var host = document.querySelector('.earning-page') || document.documentElement;
                var computed = window.getComputedStyle(host);
                var colors = [];

                for (var i = 1; i <= 8; i++) {
                    var value = computed.getPropertyValue('--earn-cat-' + i);
                    colors.push((value && value.trim()) || '#0f9d7a');
                }

                return colors;
            }

            var PALETTE = earnPalette();

            /* Status colours are declared once in the admin stylesheet (section
               10.1) and read back the same way, so a status chip in the card, a
               slice in the doughnut and a row in the table cannot be three
               different colours for one status. Keyed by the status code the
               database actually holds, not by its position in the list. */
            function earnStatusPalette() {
                var host = document.querySelector('.earning-page') || document.documentElement;
                var computed = window.getComputedStyle(host);
                var colors = {};
                var codes = EARN.statusBreakdown.statuses.map(function (status) {
                    return status.code;
                });

                codes.forEach(function (code) {
                    var value = computed.getPropertyValue('--earn-status-' + code);

                    if (!value || !value.trim()) {
                        /* A status code the stylesheet has no slot for is drawn in
                           the neutral rather than skipped, so a status added to
                           the workflow later still appears, just unemphasised. */
                        value = computed.getPropertyValue('--earn-status-default');
                    }

                    colors[code] = (value && value.trim()) || '#6f7c8c';
                });

                return colors;
            }

            var STATUS_PALETTE = earnStatusPalette();

            /* Navy rather than green. The palette's first slot is the money tone
               the earnings plot already uses, and two adjacent panels painting
               two different measures in the same colour would read as one series. */
            var VOLUME_COLOR = '#12344d';

            function earnMoney(value) {
                return EARN.currency + Number(value || 0).toFixed(2);
            }

            /* Axis ticks are short on purpose: a y-axis label has to fit beside
               twelve month buckets on a 320px screen, so the figure is abbreviated
               here and written out in full in the tooltip. */
            function earnShort(value) {
                var number = Number(value || 0);
                var absolute = Math.abs(number);

                if (absolute >= 1000000) {
                    return (number / 1000000).toFixed(absolute % 1000000 === 0 ? 0 : 1) + 'M';
                }

                if (absolute >= 1000) {
                    return (number / 1000).toFixed(absolute % 1000 === 0 ? 0 : 1) + 'k';
                }

                return String(Math.round(number * 100) / 100);
            }

            /* The x-axis and y-axis treatment both plots share. Kept in one place
               so the earnings and volume charts can never drift apart in font,
               colour or how they behave on a narrow screen. */
            function earnAxisOptions(categories) {
                return {
                    xaxis: {
                        categories: categories,
                        axisBorder: { show: false },
                        axisTicks: { show: false },
                        labels: {
                            rotate: 0,
                            hideOverlappingLabels: true,
                            trim: true,
                            style: { colors: '#526072', fontSize: '11px' }
                        }
                    },
                    yaxis: {
                        forceNiceScale: true,
                        labels: {
                            maxWidth: 70,
                            style: { colors: '#526072', fontSize: '11px' }
                        }
                    }
                };
            }

            function earnTrendOptions(trend) {
                var axis = earnAxisOptions(trend.categories);
                var options;

                axis.yaxis.labels.formatter = function (value) {
                    return EARN.currency + earnShort(value);
                };

                options = {
                    chart: {
                        type: 'bar',
                        height: 340,
                        fontFamily: 'inherit',
                        toolbar: { show: false },
                        animations: { enabled: false },
                        redrawOnParentResize: true
                    },
                    series: [{ name: EARN.text.trend, data: trend.earnings }],
                    colors: [PALETTE[0]],
                    plotOptions: {
                        bar: {
                            columnWidth: '54%',
                            borderRadius: 3,
                            borderRadiusApplication: 'end'
                        }
                    },
                    dataLabels: { enabled: false },
                    stroke: { show: false, width: 0 },
                    grid: {
                        borderColor: '#e9eef3',
                        strokeDashArray: 0,
                        padding: { top: 0, right: 6, bottom: 0, left: 0 },
                        xaxis: { lines: { show: false } }
                    },
                    xaxis: axis.xaxis,
                    yaxis: axis.yaxis,
                    tooltip: {
                        shared: true,
                        intersect: false,
                        fixed: { enabled: false },
                        y: { formatter: function (value) { return earnMoney(value); } }
                    },
                    legend: { show: false },
                    states: { hover: { filter: { type: 'none' } } },
                    responsive: [
                        {
                            breakpoint: 640,
                            options: {
                                chart: { height: 300 },
                                yaxis: { labels: { maxWidth: 52 } }
                            }
                        },
                        {
                            breakpoint: 380,
                            options: {
                                chart: { height: 260 },
                                xaxis: { labels: { fontSize: '10px' } }
                            }
                        }
                    ]
                };

                /* A day number on its own is not a date an admin can trust at a
                   glance, so the daily view names the day in full in the tooltip
                   ("August 15, 2026") while the axis keeps the bare number. The
                   monthly and yearly views keep the default category title. */
                if (trend.view === 'day') {
                    options.tooltip.title = {
                        formatter: function (label, context) {
                            var index = context && context.dataPointIndex !== undefined
                                ? context.dataPointIndex
                                : -1;
                            var bucket = (trend.series || [])[index];

                            return bucket ? bucket.label : label;
                        }
                    };
                }

                return options;
            }

            /* The same buckets as the trend above, counting quotes rather than
               money. Plotting a count needs no currency formatter on the axis, so
               the ticks are plain integers, and the tooltip writes the unit out so
               "2" is never read as a dollar figure. */
            function earnVolumeOptions(trend) {
                var axis = earnAxisOptions(trend.categories);

                axis.yaxis.labels.formatter = function (value) {
                    return String(Math.round(Number(value || 0)));
                };

                return {
                    chart: {
                        type: 'bar',
                        height: 260,
                        fontFamily: 'inherit',
                        toolbar: { show: false },
                        animations: { enabled: false },
                        redrawOnParentResize: true
                    },
                    series: [{ name: EARN.text.volume, data: trend.completed_quotes }],
                    colors: [VOLUME_COLOR],
                    plotOptions: {
                        bar: {
                            columnWidth: '54%',
                            borderRadius: 3,
                            borderRadiusApplication: 'end'
                        }
                    },
                    dataLabels: { enabled: false },
                    stroke: { show: false, width: 0 },
                    grid: {
                        borderColor: '#e9eef3',
                        strokeDashArray: 0,
                        padding: { top: 0, right: 6, bottom: 0, left: 0 },
                        xaxis: { lines: { show: false } }
                    },
                    xaxis: axis.xaxis,
                    yaxis: axis.yaxis,
                    tooltip: {
                        shared: true,
                        intersect: false,
                        fixed: { enabled: false },
                        y: {
                            formatter: function (value) {
                                return String(Math.round(Number(value || 0))) + ' ' + EARN.text.completedQuotes;
                            }
                        }
                    },
                    legend: { show: false },
                    states: { hover: { filter: { type: 'none' } } },
                    responsive: [
                        {
                            breakpoint: 640,
                            options: {
                                chart: { height: 230 },
                                yaxis: { labels: { maxWidth: 40 } }
                            }
                        }
                    ]
                };
            }

            function earnServiceOptions(distribution) {
                return {
                    chart: {
                        type: 'donut',
                        height: 290,
                        fontFamily: 'inherit',
                        toolbar: { show: false },
                        animations: { enabled: false },
                        redrawOnParentResize: true
                    },
                    series: distribution.earnings,
                    labels: distribution.labels,
                    colors: PALETTE,
                    stroke: { width: 2, colors: ['#fbfcfd'] },
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    states: { hover: { filter: { type: 'none' } } },
                    plotOptions: {
                        pie: {
                            expandOnClick: false,
                            donut: {
                                size: '66%',
                                labels: {
                                    show: true,
                                    name: { show: false },
                                    value: { show: false },
                                    total: {
                                        show: true,
                                        showAlways: true,
                                        label: EARN.text.total,
                                        fontSize: '11px',
                                        color: '#526072',
                                        formatter: function (seriesTotal) { return earnMoney(seriesTotal); }
                                    }
                                }
                            }
                        }
                    },
                    tooltip: {
                        y: { formatter: function (value) { return earnMoney(value); } }
                    },
                    responsive: [
                        {
                            breakpoint: 575,
                            options: {
                                chart: { height: 260 }
                            }
                        }
                    ]
                };
            }

            var trendChart = null;
            var volumeChart = null;
            var statusChart = null;

            /* The pipeline doughnut. Counts, not money: the question this plot
               answers is "where are my quotes", and the money each status is
               worth is printed in the table beside it. A zero-count status is
               dropped from the plot rather than drawn as an invisible sliver —
               it still has a card and a row of its own, so nothing is lost.

               Same geometry and tooltip treatment as the service doughnut so the
               two read as one system. */
            function earnStatusOptions(breakdown) {
                var slices = (breakdown.statuses || []).filter(function (status) {
                    return status.quote_count > 0;
                });

                return {
                    chart: {
                        type: 'donut',
                        height: 280,
                        fontFamily: 'inherit',
                        toolbar: { show: false },
                        animations: { enabled: false },
                        redrawOnParentResize: true
                    },
                    series: slices.map(function (status) { return status.quote_count; }),
                    labels: slices.map(function (status) { return status.label; }),
                    colors: slices.map(function (status) { return STATUS_PALETTE[status.code]; }),
                    stroke: { width: 2, colors: ['#fbfcfd'] },
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    states: { hover: { filter: { type: 'none' } } },
                    plotOptions: {
                        pie: {
                            expandOnClick: false,
                            donut: {
                                size: '66%',
                                labels: {
                                    show: true,
                                    name: { show: false },
                                    value: { show: false },
                                    total: {
                                        show: true,
                                        showAlways: true,
                                        label: EARN.text.totalQuotes,
                                        fontSize: '11px',
                                        color: '#526072',
                                        formatter: function (seriesTotal) {
                                            return String(Math.round(Number(seriesTotal || 0)));
                                        }
                                    }
                                }
                            }
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function (value, opts) {
                                var index = opts ? opts.dataPointIndex : 0;
                                var slice = slices[index];

                                return String(Math.round(Number(value || 0)))
                                    + ' ' + EARN.text.totalQuotes
                                    + (slice ? ' — ' + slice.share + '%' : '');
                            }
                        }
                    },
                    responsive: [
                        {
                            breakpoint: 575,
                            options: { chart: { height: 240 } }
                        }
                    ]
                };
            }

            function earnDrawTrend(trend, animate) {
                var options = earnTrendOptions(trend);

                if (animate && trendChart) {
                    trendChart.updateOptions(options, false, false);
                } else {
                    if (trendChart) {
                        trendChart.destroy();
                    }

                    trendChart = new ApexCharts(document.querySelector('#revenueChart'), options);
                    trendChart.render();
                }

                var volumeOptions = earnVolumeOptions(trend);

                if (animate && volumeChart) {
                    volumeChart.updateOptions(volumeOptions, false, false);
                } else {
                    if (volumeChart) {
                        volumeChart.destroy();
                    }

                    volumeChart = new ApexCharts(document.querySelector('#earnVolumeChart'), volumeOptions);
                    volumeChart.render();
                }
            }

            /* Redraw the pipeline doughnut in place when the period moves, and
               rebuild it when the set of statuses with quotes in it has changed
               shape — an empty selection has no slices to animate to, so it is
               swapped for the empty state rather than scaled to nothing. */
            function earnDrawStatus(breakdown, animate) {
                var target = document.querySelector('#earnStatusChart');

                if (!target) {
                    return;
                }

                var options = earnStatusOptions(breakdown);

                if (animate && statusChart && (options.series.length > 0)) {
                    statusChart.updateOptions(options, false, false);
                    return;
                }

                if (statusChart) {
                    statusChart.destroy();
                    statusChart = null;
                }

                if (options.series.length > 0) {
                    statusChart = new ApexCharts(target, options);
                    statusChart.render();
                }
            }

            /* Cards, table and the empty state all move together from one
               server response. Nothing is recalculated here — the count, the
               money and the share are exactly the ones the controller
               calculated, which is the only reason the doughnut and the table
               beside it cannot disagree. */
            function earnApplyStatus(breakdown) {
                if (!breakdown) {
                    return;
                }

                (breakdown.statuses || []).forEach(function (status) {
                    var card = $('[data-earn-status="' + status.code + '"]');
                    var row = $('[data-earn-status-row="' + status.code + '"]');

                    if (card.length) {
                        card.find('[data-earn-status-count]').text(status.quote_count);
                        card.find('[data-earn-status-amount]').text(status.amount_formatted);
                        card.find('[data-earn-status-share]').text(status.share + '%');
                        card.find('[data-earn-status-bar]').each(function () {
                            this.value = Number(status.share) || 0;
                        });
                    }

                    if (row.length) {
                        row.find('[data-earn-status-row-count]').text(status.quote_count);
                        row.find('[data-earn-status-row-amount]').text(status.amount_formatted);
                        row.find('[data-earn-status-row-share]').text(status.share + '%');
                    }
                });

                $('[data-earn-status-total-count]').text(breakdown.total_quotes);
                $('[data-earn-status-total-amount]').text(breakdown.total_value_formatted);

                /* An empty period keeps the four cards — an admin needs to be
                   told a status is empty, not shown a panel that vanished — and
                   swaps the plot and the table for the empty state. */
                if (breakdown.has_data) {
                    $('#earnStatusBody').removeClass('d-none');
                    $('#earnStatusEmpty').removeClass('d-none').addClass('d-none');
                } else {
                    $('#earnStatusBody').addClass('d-none');
                    $('#earnStatusEmpty').removeClass('d-none');
                }

                earnDrawStatus(breakdown, true);
            }

            function earnFilterParams(overrides) {
                var params = {
                    date_from: $('#earnDateFrom').val(),
                    date_to: $('#earnDateTo').val(),
                    month: $('#earnMonth').val(),
                    year: $('#earnYear').val(),
                    service_id: $('#earnService').val(),
                    chart_view: EARN.trend.view,
                    chart_year: EARN.trend.year,
                    chart_month: EARN.trend.month
                };

                return $.extend(params, overrides || {});
            }

            function earnSyncUrl(overrides) {
                if (!window.history || !window.history.replaceState) {
                    return;
                }

                var url = new URL(window.location.href);
                var params = earnFilterParams(overrides);

                Object.keys(params).forEach(function (key) {
                    if (params[key] === '' || params[key] === null || typeof params[key] === 'undefined') {
                        url.searchParams.delete(key);
                    } else {
                        url.searchParams.set(key, params[key]);
                    }
                });

                window.history.replaceState({}, '', url.toString());
            }

            /* The insight sentences are written in the controller from the same
               filtered query as everything else, so a period step has them
               re-rendered server-side and the response applied to the cards
               already on screen. A figure is never recomputed in the browser. */
            function earnApplyInsights(items) {
                (items || []).forEach(function (item) {
                    var card = $('[data-earn-insight="' + item.id + '"]');

                    if (!card.length) {
                        return;
                    }

                    card.attr('class', 'earn-insight earn-insight--' + item.tone);
                    card.find('[data-earn-insight-value]').text(item.value);
                    card.find('[data-earn-insight-text]').text(item.text);
                });
            }

            /* The two steppers ask the same question in every view — "the period
               moved" — so they share one path. What a step *is* depends on what the
               chart is showing: the daily view draws one month at a time, so its
               steppers walk months (crossing the year boundary in both directions)
               and leave the monthly and yearly views walking years exactly as
               before. The bounds that say whether a step is allowed come back with
               the data. */
            function earnShiftPeriod(offset) {
                if (EARN.trend.view !== 'day') {
                    earnLoadPeriod({ chart_year: Number(EARN.trend.year) + offset });
                    return;
                }

                var year = Number(EARN.trend.year);
                var month = Number(EARN.trend.month) + offset;

                if (month < 1) {
                    month = 12;
                    year -= 1;
                } else if (month > 12) {
                    month = 1;
                    year += 1;
                }

                earnLoadPeriod({ chart_month: month, chart_year: year });
            }

            /* The steppers and the Daily / Monthly / Yearly toggle all ask the same
               question — "the period moved" — so they share one path: refresh the
               trend and volume series, move the current-period figure with them,
               update the insight sentences, and keep the address bar in step so
               the view can be shared or reloaded. */
            function earnLoadPeriod(overrides) {
                var params = earnFilterParams(overrides);

                $('#earnChartLoading, #earnVolumeLoading').removeClass('d-none');
                $('#earnPrevBtn, #earnNextBtn').prop('disabled', true);

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: EARN.urls.chart,
                    method: 'GET',
                    dataType: 'json',
                    data: params
                }).done(function (response) {
                    if (!response || response.status !== 200) {
                        return;
                    }

                    EARN.trend = response.trend;

                    earnDrawTrend(EARN.trend, true);
                    earnSyncUrl(overrides);

                    $('#earnTrendPeriod').text(EARN.trend.period_label);
                    $('#earnTrendTotal').text(EARN.text.periodTotal + ': ' + EARN.trend.period_total_formatted);

                    $('#earnVolumeTotal')
                        .text(EARN.trend.period_quotes + ' ' + EARN.text.completedQuotes);

                    if (EARN.trend.has_data) {
                        $('#revEmptyNote').addClass('d-none');
                    } else {
                        $('#revEmptyNote').removeClass('d-none');
                    }

                    if (EARN.trend.undated.completed_quotes > 0) {
                        $('#earnUndatedNote')
                            .text(EARN.text.undated.replace(':count', EARN.trend.undated.completed_quotes))
                            .removeClass('d-none');
                    } else {
                        $('#earnUndatedNote').addClass('d-none');
                    }

                    if (EARN.trend.pinned) {
                        $('#earnPinnedNote').removeClass('d-none');
                    } else {
                        $('#earnPinnedNote').addClass('d-none');
                    }

                    $('#earnPrevBtn').prop('disabled', !EARN.trend.can_step_back);
                    $('#earnNextBtn').prop('disabled', !EARN.trend.can_step_forward);

                    $('[data-earn-view]').each(function () {
                        $(this).toggleClass('active', $(this).data('earn-view') === EARN.trend.view);
                    });

                    /* Only the current-period figure is period-scoped: the other
                       three cards describe the whole filtered selection, which
                       moving the chart does not change. They are re-read from the
                       same response rather than recomputed in the browser, so a
                       figure on screen is always one the server produced. */
                    if (response.summary) {
                        $('#earnPeriodValue').text(response.summary.period_earnings_formatted);
                        $('#earnPeriodLabel').text(response.summary.period_label);
                    }

                    earnApplyInsights(response.insights);

                    /* The pipeline is scoped by the same selection, so a period
                       step moves it too. Re-read from the response rather than
                       recomputed here, for the same reason as everything above. */
                    if (response.status_breakdown) {
                        EARN.statusBreakdown = response.status_breakdown;
                        earnApplyStatus(EARN.statusBreakdown);
                    }
                }).always(function () {
                    $('#earnChartLoading, #earnVolumeLoading').addClass('d-none');
                    $('#earnPrevBtn').prop('disabled', !EARN.trend.can_step_back);
                    $('#earnNextBtn').prop('disabled', !EARN.trend.can_step_forward);
                });
            }

            @if ($has_completed_quotes)
                earnDrawTrend(EARN.trend, false);
            @endif

            {{-- The status panel is outside the completed-quotes branch: a month
                 with pending quotes and nothing finished still has a pipeline to
                 read, so this is drawn on every load.                    --}}
            earnDrawStatus(EARN.statusBreakdown, false);

            @if ($has_completed_quotes)
                @if ($distribution['has_data'])
                    new ApexCharts(document.querySelector('#earnServiceChart'), earnServiceOptions(@json($distribution)))
                        .render();
                @endif

                var quotesTable = $('#earnQuotesTable').DataTable($.extend({}, dataTableDefaults, {
                    ajax: {
                        url: EARN.urls.quotes,
                        data: function (data) {
                            data.input_search = $('#earnSearch').val();
                        }
                    },
                    order: [[1, 'desc']],
                    language: $.extend({}, dataTableDefaults.language, {
                        emptyTable: EARN.text.trendEmpty,
                        zeroRecords: EARN.text.trendEmpty
                    }),
                    columns: [
                        { data: 'DT_RowIndex', name: 'quote_row', orderable: false, searchable: false },
                        { data: 'quote_no', name: 'quote_id', orderable: true, searchable: false },
                        { data: 'customer', name: 'customer', orderable: false, searchable: false },
                        { data: 'service', name: 'service', orderable: false, searchable: false },
                        { data: 'quote_date', name: 'quote_date', orderable: false, searchable: false },
                        {
                            data: 'amount', name: 'amount', orderable: false, searchable: false,
                            className: 'earn-cell-amount-cell'
                        },
                        { data: 'status', name: 'status', orderable: false, searchable: false }
                    ]
                }));

                $('#earnSearch').on('keyup', function () {
                    quotesTable.draw();
                });

                $('[data-earn-view]').on('click', function () {
                    earnLoadPeriod({ chart_view: $(this).data('earn-view') });
                });

                $('#earnPrevBtn').on('click', function () {
                    earnShiftPeriod(-1);
                });

                $('#earnNextBtn').on('click', function () {
                    earnShiftPeriod(1);
                });
            @endif
        });
    </script>
@endsection
