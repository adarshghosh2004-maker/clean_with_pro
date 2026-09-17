@extends('admin.layout.page-app')
@section('page_title', __('label.dashboard'))
@section('tab_title', __('label.dashboard'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <h1 class="page-title-sm">{{__('label.feature')}}</h1>

            <!-- Statistics Cards Row 1 -->
            <div class="row counter-row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-file-invoice-dollar fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.quote') }}</span>
                                <h3>{{ No_Format($total_users) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-cogs fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.services') }}</span>
                                <h3>{{ No_Format($total_services) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-video fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.videos') }}</span>
                                <h3>{{ No_Format($total_videos) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-image fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.images') }}</span>
                                <h3>{{ No_Format($total_images) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row counter-row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-user-clock fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.pending_quotes') }}</span>
                                <h3>{{ No_Format($pending_requests) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-check-circle fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.confirmed_quotes') }}</span>
                                <h3>{{ No_Format($confirmed_requests) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-clipboard-check fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.completed_quotes') }}</span>
                                <h3>{{ No_Format($completed_requests) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-times-circle fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.cancelled_quotes') }}</span>
                                <h3>{{ No_Format($cancelled_requests) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row counter-row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-comment-dots fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.feedback') }}</span>
                                <h3>{{ No_Format($total_feedbacks) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-question-circle fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.questions') }}</span>
                                <h3>{{ No_Format($total_questions) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-server fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.active_services') }}</span>
                                <h3>{{ No_Format($active_services) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-sack-dollar fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.total_earnings') }}</span>
                                <h3>{{ $total_earnings_formatted }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quote Analytics Chart Row -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="cart-bg">
                        <div class="box-title d-flex justify-content-between align-items-center flex-wrap">
                            <h2 class="title"><i class="fa-solid fa-chart-column fa-lg mr-2"></i>Join Users &amp; Author
                                Statistice</h2>
                            <div class="dash-chart-btns">
                                <button id="year" class="dash-chart-btn active">This Year</button>
                                <button id="month" class="dash-chart-btn">This Month</button>
                            </div>
                        </div>

                        <!-- Year Navigation Bar -->
                        <div id="yearNavContainer" class="month-nav-wrapper d-flex mt-3 p-2 bg-light rounded justify-content-between align-items-center">
                            <button id="prevYearBtn" class="btn btn-sm btn-outline-secondary font-weight-bold" type="button">
                                <i class="fa-solid fa-chevron-left mr-1"></i> <span class="d-none d-sm-inline">Previous Year</span>
                            </button>
                            <div class="text-center">
                                <span id="currentYearLabel" class="h6 mb-0 font-weight-bold text-dark d-block">{{ $current_year }}</span>
                                <small id="yearTotalBadge" class="text-muted font-weight-semibold">Total Quotes: {{ $user_year_total }}</small>
                            </div>
                            <button id="nextYearBtn" class="btn btn-sm btn-outline-secondary font-weight-bold" type="button" disabled>
                                <span class="d-none d-sm-inline">Next Year</span> <i class="fa-solid fa-chevron-right ml-1"></i>
                            </button>
                        </div>

                        <!-- Month Navigation Bar -->
                        <div id="monthNavContainer" class="month-nav-wrapper d-none mt-3 p-2 bg-light rounded justify-content-between align-items-center">
                            <button id="prevMonthBtn" class="btn btn-sm btn-outline-secondary font-weight-bold" type="button">
                                <i class="fa-solid fa-chevron-left mr-1"></i> <span class="d-none d-sm-inline">Previous Month</span>
                            </button>
                            <div class="text-center">
                                <span id="currentMonthLabel" class="h6 mb-0 font-weight-bold text-dark d-block"></span>
                                <small id="monthTotalBadge" class="text-muted font-weight-semibold"></small>
                            </div>
                            <button id="nextMonthBtn" class="btn btn-sm btn-outline-secondary font-weight-bold" type="button" disabled>
                                <span class="d-none d-sm-inline">Next Month</span> <i class="fa-solid fa-chevron-right ml-1"></i>
                            </button>
                        </div>

                        <div class="chart-body position-relative mt-3">
                            <!-- Loading Overlay -->
                            <div id="chartLoadingOverlay" class="chart-loading-overlay d-none">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading stats...</span>
                                </div>
                            </div>
                            <div id="userRequestsChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue / Earnings Chart Row -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="cart-bg h-100">
                        <div class="box-title d-flex justify-content-between align-items-center flex-wrap">
                            <h2 class="title"><i
                                    class="fa-solid fa-chart-column fa-lg mr-2"></i>{{ __('label.revenue_earnings_statistics') }}
                            </h2>
                            <div class="dash-chart-btns">
                                <button id="revYear" class="dash-chart-btn active" type="button">This Year</button>
                                <button id="revMonth" class="dash-chart-btn" type="button">This Month</button>
                            </div>
                        </div>

                        <!-- Year Navigation Bar -->
                        <div id="revYearNavContainer"
                            class="month-nav-wrapper d-flex mt-3 p-2 bg-light rounded justify-content-between align-items-center">
                            <button id="revPrevYearBtn" class="btn btn-sm btn-outline-secondary font-weight-bold"
                                type="button">
                                <i class="fa-solid fa-chevron-left mr-1"></i> <span class="d-none d-sm-inline">Previous Year</span>
                            </button>
                            <div class="text-center">
                                <span id="revCurrentYearLabel"
                                    class="h6 mb-0 font-weight-bold text-dark d-block">{{ $current_year }}</span>
                                <small id="revYearTotalBadge" class="text-muted font-weight-semibold">Total Revenue:
                                    {{ $currency . number_format($revenue_year_total, 2) }}</small>
                            </div>
                            <button id="revNextYearBtn" class="btn btn-sm btn-outline-secondary font-weight-bold"
                                type="button" disabled>
                                <span class="d-none d-sm-inline">Next Year</span> <i class="fa-solid fa-chevron-right ml-1"></i>
                            </button>
                        </div>

                        <!-- Month Navigation Bar -->
                        <div id="revMonthNavContainer"
                            class="month-nav-wrapper d-none mt-3 p-2 bg-light rounded justify-content-between align-items-center">
                            <button id="revPrevMonthBtn" class="btn btn-sm btn-outline-secondary font-weight-bold"
                                type="button">
                                <i class="fa-solid fa-chevron-left mr-1"></i> <span class="d-none d-sm-inline">Previous Month</span>
                            </button>
                            <div class="text-center">
                                <span id="revCurrentMonthLabel"
                                    class="h6 mb-0 font-weight-bold text-dark d-block"></span>
                                <small id="revMonthTotalBadge" class="text-muted font-weight-semibold"></small>
                            </div>
                            <button id="revNextMonthBtn" class="btn btn-sm btn-outline-secondary font-weight-bold"
                                type="button" disabled>
                                <span class="d-none d-sm-inline">Next Month</span> <i class="fa-solid fa-chevron-right ml-1"></i>
                            </button>
                        </div>

                        <div class="chart-body position-relative mt-3">
                            <!-- Loading Overlay -->
                            <div id="revChartLoadingOverlay" class="chart-loading-overlay d-none">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading stats...</span>
                                </div>
                            </div>
                            <div id="revenueChart"></div>
                        </div>
                        <small id="revEmptyNote"
                            class="text-muted font-weight-semibold d-none">{{ __('label.no_completed_service_revenue') }}</small>
                    </div>
                </div>
            </div>

            <!-- Top Services -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="category-box">
                        <div class="box-title mt-0">
                            <h2 class="title"><i
                                    class="fa-solid fa-table-cells-large fa-lg mr-2"></i>Top Services</h2>
                        </div>
                        <div class="pt-3 mt-0">
                            <div class="row">
                                @foreach ($top_services as $key => $value)
                                    <div class="col-12 col-sm-6 col-md-4 col-xl mb-2 content-box">
                                        <div class="position-relative">
                                            <img src="{{ $value['banner_img'] ?? "" }}" class="category-image" alt="image">
                                            <div class="centered">{{ $value['title'] ?? "" }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="cart-bg">
                        <div class="box-title">
                            <h2 class="title"><i
                                    class="fa-solid fa-chart-line fa-lg mr-2"></i>{{ __('label.recent_users') }}</h2>
                        </div>
                        <div class="row artist-row">
                            @foreach ($recent_users as $key => $value)
                                <div class="col-6 col-md-4 col-xl-2">
                                    <div class="artist-grid-card d-flex flex-column align-items-center">
                                        <span class="author-image">
                                            <img src="{{ asset('assets/imgs/default.png') }}" alt="image">
                                        </span>
                                        <h3 class="name"> </h3>
                                        <p class="details mb-0">{{ $value['name'] ?? "" }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('pagescript')
    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        const monthNamesFull = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const monthShortToLong = {
            "Jan": "January", "Feb": "February", "Mar": "March", "Apr": "April",
            "May": "May", "Jun": "June", "Jul": "July", "Aug": "August",
            "Sep": "September", "Oct": "October", "Nov": "November", "Dec": "December"
        };

        let currentView = 'year';
        const currentSystemYear = {{ $current_year ?? date('Y') }};
        const currentSystemMonth = {{ $current_month ?? date('m') }};

        let selectedYear = currentSystemYear;
        let selectedMonth = currentSystemMonth;

        let userYear = @json($user_year);
        let userMonth = @json($user_month);

        let chartOptions = {
            chart: {
                type: 'bar',
                height: 380,
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 600
                }
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '52%',
                    borderRadius: 4
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.25,
                    gradientToColors: ['#283e50', '#f7b733'],
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.82,
                    stops: [0, 100]
                }
            },
            colors: ['#283e50', '#f7971e'],
            grid: {
                borderColor: '#f0f0f0',
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: 10,
                    bottom: 0,
                    left: 10
                }
            },
            tooltip: {
                theme: 'light',
                style: {
                    fontSize: '13px'
                },
                x: {
                    formatter: function(val, opts) {
                        if (currentView === 'month') {
                            let dayNum = parseInt(val);
                            if (dayNum) {
                                return `${monthNamesFull[selectedMonth - 1]} ${dayNum}, ${selectedYear}`;
                            }
                        } else if (currentView === 'year') {
                            let monthIdx = opts ? opts.dataPointIndex : -1;
                            if (monthIdx !== undefined && monthIdx >= 0 && monthIdx < 12) {
                                return `${monthNamesFull[monthIdx]} ${selectedYear}`;
                            }
                            if (monthShortToLong[val]) {
                                return `${monthShortToLong[val]} ${selectedYear}`;
                            }
                            return `${val} ${selectedYear}`;
                        }
                        return val;
                    }
                },
                y: {
                    formatter: function(val) {
                        return val + (val === 1 ? ' Quote' : ' Quotes');
                    }
                }
            },
            series: [{
                name: "Quotes",
                data: userYear
            }],
            xaxis: {
                categories: [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'Jun', 'Jul', 'Aug',
                    'Sep', 'Oct', 'Nov', 'Dec'
                ],
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        colors: '#999'
                    }
                }
            },
            yaxis: {
                min: 0,
                forceNiceScale: true,
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        colors: '#999'
                    },
                    formatter: function(val) {
                        return Math.floor(val) === val ? val : '';
                    }
                }
            },
            responsive: [{
                breakpoint: 576,
                options: {
                    chart: { height: 320 },
                    plotOptions: {
                        bar: { columnWidth: '70%' }
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: { fontSize: '10px' }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: { fontSize: '11px' }
                        }
                    }
                }
            }],
            legend: {
                show: false
            }
        };

        let chart = new ApexCharts(document.querySelector("#userRequestsChart"), chartOptions);
        chart.render();

        function showLoading(show) {
            const overlay = document.getElementById('chartLoadingOverlay');
            if (show) {
                overlay.classList.remove('d-none');
                overlay.classList.add('d-flex');
                document.getElementById('prevMonthBtn').disabled = true;
                document.getElementById('nextMonthBtn').disabled = true;
                document.getElementById('prevYearBtn').disabled = true;
                document.getElementById('nextYearBtn').disabled = true;
            } else {
                overlay.classList.add('d-none');
                overlay.classList.remove('d-flex');
                if (currentView === 'month') {
                    updateMonthNavButtons();
                } else {
                    updateYearNavButtons();
                }
            }
        }

        function updateYearNavButtons() {
            document.getElementById('prevYearBtn').disabled = false;
            document.getElementById('nextYearBtn').disabled = (selectedYear >= currentSystemYear);
        }

        function updateMonthNavButtons() {
            document.getElementById('prevMonthBtn').disabled = false;
            
            let isCurrentOrFuture = false;
            if (selectedYear > currentSystemYear) {
                isCurrentOrFuture = true;
            } else if (selectedYear === currentSystemYear && selectedMonth >= currentSystemMonth) {
                isCurrentOrFuture = true;
            }

            document.getElementById('nextMonthBtn').disabled = isCurrentOrFuture;
        }

        function fetchAndRenderChartData() {
            showLoading(true);

            const url = "{{ route('admin.dashboard.chart.data') }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    view: currentView,
                    year: selectedYear,
                    month: selectedMonth
                },
                success: function(res) {
                    showLoading(false);
                    if (res.status === 200) {
                        if (currentView === 'month') {
                            document.getElementById('currentMonthLabel').innerText = res.month_name;
                            document.getElementById('monthTotalBadge').innerText = `Total Quotes: ${res.total_quotes}`;
                            
                            chart.updateOptions({
                                series: [{
                                    name: "Quotes",
                                    data: res.series_data
                                }],
                                xaxis: {
                                    categories: res.categories
                                }
                            });
                        } else {
                            document.getElementById('currentYearLabel').innerText = res.year;
                            document.getElementById('yearTotalBadge').innerText = `Total Quotes: ${res.total_quotes}`;

                            chart.updateOptions({
                                series: [{
                                    name: "Quotes",
                                    data: res.series_data
                                }],
                                xaxis: {
                                    categories: res.categories
                                }
                            });
                        }
                    }
                },
                error: function(err) {
                    showLoading(false);
                    console.error("Failed to fetch chart data", err);
                }
            });
        }

        function switchView(view) {
            currentView = view;
            const yearNav = document.getElementById('yearNavContainer');
            const monthNav = document.getElementById('monthNavContainer');
            const yearBtn = document.getElementById('year');
            const monthBtn = document.getElementById('month');

            if (view === 'month') {
                yearBtn.classList.remove('active');
                monthBtn.classList.add('active');

                yearNav.classList.add('d-none');
                yearNav.classList.remove('d-flex');

                monthNav.classList.remove('d-none');
                monthNav.classList.add('d-flex');

                selectedYear = currentSystemYear;
                selectedMonth = currentSystemMonth;

                fetchAndRenderChartData();
            } else {
                monthBtn.classList.remove('active');
                yearBtn.classList.add('active');

                monthNav.classList.add('d-none');
                monthNav.classList.remove('d-flex');

                yearNav.classList.remove('d-none');
                yearNav.classList.add('d-flex');

                selectedYear = currentSystemYear;
                fetchAndRenderChartData();
            }
        }

        document.getElementById('year').addEventListener('click', function () {
            if (currentView !== 'year') {
                switchView('year');
            }
        });

        document.getElementById('month').addEventListener('click', function () {
            if (currentView !== 'month') {
                switchView('month');
            }
        });

        document.getElementById('prevYearBtn').addEventListener('click', function () {
            if (currentView !== 'year') return;
            selectedYear--;
            fetchAndRenderChartData();
        });

        document.getElementById('nextYearBtn').addEventListener('click', function () {
            if (currentView !== 'year') return;
            if (selectedYear >= currentSystemYear) return;
            selectedYear++;
            fetchAndRenderChartData();
        });

        document.getElementById('prevMonthBtn').addEventListener('click', function () {
            if (currentView !== 'month') return;
            
            selectedMonth--;
            if (selectedMonth < 1) {
                selectedMonth = 12;
                selectedYear--;
            }
            fetchAndRenderChartData();
        });

        document.getElementById('nextMonthBtn').addEventListener('click', function () {
            if (currentView !== 'month') return;

            if (selectedYear > currentSystemYear || (selectedYear === currentSystemYear && selectedMonth >= currentSystemMonth)) {
                return;
            }

            selectedMonth++;
            if (selectedMonth > 12) {
                selectedMonth = 1;
                selectedYear++;
            }
            fetchAndRenderChartData();
        });

        /* ============================================================
         * Revenue / Earnings chart (independent from the quote chart)
         * ============================================================ */
        const revCurrency = @json($currency);
        const revCurrentSystemYear = {{ $current_year ?? date('Y') }};
        const revCurrentSystemMonth = {{ $current_month ?? date('m') }};

        let revView = 'year';
        let revSelectedYear = revCurrentSystemYear;
        let revSelectedMonth = revCurrentSystemMonth;

        let revYearData = @json($revenue_year);
        let revMonthData = @json($revenue_month);

        function revFormatMoney(val) {
            const num = Number(val) || 0;
            const parts = Math.abs(num).toFixed(2).split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            return (num < 0 ? '-' : '') + revCurrency + parts.join('.');
        }

        function revFormatCompact(val) {
            const num = Number(val) || 0;
            const abs = Math.abs(num);
            let formatted;
            if (abs >= 1000000) {
                formatted = (abs / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
            } else if (abs >= 1000) {
                formatted = (abs / 1000).toFixed(1).replace(/\.0$/, '') + 'k';
            } else {
                formatted = num.toFixed(0);
            }
            return (num < 0 ? '-' : '') + revCurrency + formatted;
        }

        let revChartOptions = {
            chart: {
                type: 'bar',
                height: 380,
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 600
                }
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '52%',
                    borderRadius: 4
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.25,
                    gradientToColors: ['#283e50', '#f7b733'],
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.82,
                    stops: [0, 100]
                }
            },
            colors: ['#283e50', '#f7971e'],
            grid: {
                borderColor: '#f0f0f0',
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: 10,
                    bottom: 0,
                    left: 10
                }
            },
            tooltip: {
                theme: 'light',
                style: {
                    fontSize: '13px'
                },
                x: {
                    formatter: function(val, opts) {
                        if (revView === 'month') {
                            let dayNum = parseInt(val);
                            if (dayNum) {
                                return `${monthNamesFull[revSelectedMonth - 1]} ${dayNum}, ${revSelectedYear}`;
                            }
                        } else if (revView === 'year') {
                            let monthIdx = opts ? opts.dataPointIndex : -1;
                            if (monthIdx !== undefined && monthIdx >= 0 && monthIdx < 12) {
                                return `${monthNamesFull[monthIdx]} ${revSelectedYear}`;
                            }
                            if (monthShortToLong[val]) {
                                return `${monthShortToLong[val]} ${revSelectedYear}`;
                            }
                            return `${val} ${revSelectedYear}`;
                        }
                        return val;
                    }
                },
                y: {
                    formatter: function(val) {
                        return revFormatMoney(val);
                    }
                }
            },
            series: [{
                name: "Revenue",
                data: revYearData
            }],
            xaxis: {
                categories: [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'Jun', 'Jul', 'Aug',
                    'Sep', 'Oct', 'Nov', 'Dec'
                ],
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        colors: '#999'
                    }
                }
            },
            yaxis: {
                min: 0,
                forceNiceScale: true,
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        colors: '#999'
                    },
                    formatter: function(val) {
                        return revFormatMoney(val);
                    }
                }
            },
            responsive: [{
                breakpoint: 576,
                options: {
                    chart: { height: 320 },
                    plotOptions: {
                        bar: { columnWidth: '70%' }
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: { fontSize: '10px' }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: { fontSize: '11px' },
                            formatter: function(val) {
                                return revFormatCompact(val);
                            }
                        }
                    }
                }
            }],
            legend: {
                show: false
            }
        };

        let revenueChart = new ApexCharts(document.querySelector("#revenueChart"), revChartOptions);
        revenueChart.render();

        function showRevLoading(show) {
            const overlay = document.getElementById('revChartLoadingOverlay');
            if (show) {
                overlay.classList.remove('d-none');
                overlay.classList.add('d-flex');
                document.getElementById('revPrevMonthBtn').disabled = true;
                document.getElementById('revNextMonthBtn').disabled = true;
                document.getElementById('revPrevYearBtn').disabled = true;
                document.getElementById('revNextYearBtn').disabled = true;
            } else {
                overlay.classList.add('d-none');
                overlay.classList.remove('d-flex');
                if (revView === 'month') {
                    updateRevMonthNavButtons();
                } else {
                    updateRevYearNavButtons();
                }
            }
        }

        function updateRevYearNavButtons() {
            document.getElementById('revPrevYearBtn').disabled = false;
            document.getElementById('revNextYearBtn').disabled = (revSelectedYear >= revCurrentSystemYear);
        }

        function updateRevMonthNavButtons() {
            document.getElementById('revPrevMonthBtn').disabled = false;

            let isCurrentOrFuture = false;
            if (revSelectedYear > revCurrentSystemYear) {
                isCurrentOrFuture = true;
            } else if (revSelectedYear === revCurrentSystemYear && revSelectedMonth >= revCurrentSystemMonth) {
                isCurrentOrFuture = true;
            }

            document.getElementById('revNextMonthBtn').disabled = isCurrentOrFuture;
        }

        function toggleRevEmptyNote(total) {
            const note = document.getElementById('revEmptyNote');
            if (total <= 0) {
                note.classList.remove('d-none');
            } else {
                note.classList.add('d-none');
            }
        }

        function fetchAndRenderRevenueData() {
            showRevLoading(true);

            const url = "{{ route('admin.dashboard.revenue.data') }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    view: revView,
                    year: revSelectedYear,
                    month: revSelectedMonth
                },
                success: function(res) {
                    showRevLoading(false);
                    if (res.status === 200) {
                        toggleRevEmptyNote(res.total_revenue);

                        if (revView === 'month') {
                            document.getElementById('revCurrentMonthLabel').innerText = res.month_name;
                            document.getElementById('revMonthTotalBadge').innerText = `Total Revenue: ${res.total_revenue_formatted}`;

                            revenueChart.updateOptions({
                                series: [{
                                    name: "Revenue",
                                    data: res.series_data
                                }],
                                xaxis: {
                                    categories: res.categories
                                }
                            });
                        } else {
                            document.getElementById('revCurrentYearLabel').innerText = res.year;
                            document.getElementById('revYearTotalBadge').innerText = `Total Revenue: ${res.total_revenue_formatted}`;

                            revenueChart.updateOptions({
                                series: [{
                                    name: "Revenue",
                                    data: res.series_data
                                }],
                                xaxis: {
                                    categories: res.categories
                                }
                            });
                        }
                    }
                },
                error: function(err) {
                    showRevLoading(false);
                    console.error("Failed to fetch revenue chart data", err);
                }
            });
        }

        function switchRevView(view) {
            revView = view;
            const yearNav = document.getElementById('revYearNavContainer');
            const monthNav = document.getElementById('revMonthNavContainer');
            const yearBtn = document.getElementById('revYear');
            const monthBtn = document.getElementById('revMonth');

            if (view === 'month') {
                yearBtn.classList.remove('active');
                monthBtn.classList.add('active');

                yearNav.classList.add('d-none');
                yearNav.classList.remove('d-flex');

                monthNav.classList.remove('d-none');
                monthNav.classList.add('d-flex');

                revSelectedYear = revCurrentSystemYear;
                revSelectedMonth = revCurrentSystemMonth;

                fetchAndRenderRevenueData();
            } else {
                monthBtn.classList.remove('active');
                yearBtn.classList.add('active');

                monthNav.classList.add('d-none');
                monthNav.classList.remove('d-flex');

                yearNav.classList.remove('d-none');
                yearNav.classList.add('d-flex');

                revSelectedYear = revCurrentSystemYear;

                fetchAndRenderRevenueData();
            }
        }

        document.getElementById('revYear').addEventListener('click', function () {
            if (revView !== 'year') {
                switchRevView('year');
            }
        });

        document.getElementById('revMonth').addEventListener('click', function () {
            if (revView !== 'month') {
                switchRevView('month');
            }
        });

        document.getElementById('revPrevYearBtn').addEventListener('click', function () {
            if (revView !== 'year') return;
            revSelectedYear--;
            fetchAndRenderRevenueData();
        });

        document.getElementById('revNextYearBtn').addEventListener('click', function () {
            if (revView !== 'year') return;
            if (revSelectedYear >= revCurrentSystemYear) return;
            revSelectedYear++;
            fetchAndRenderRevenueData();
        });

        document.getElementById('revPrevMonthBtn').addEventListener('click', function () {
            if (revView !== 'month') return;

            revSelectedMonth--;
            if (revSelectedMonth < 1) {
                revSelectedMonth = 12;
                revSelectedYear--;
            }
            fetchAndRenderRevenueData();
        });

        document.getElementById('revNextMonthBtn').addEventListener('click', function () {
            if (revView !== 'month') return;

            if (revSelectedYear > revCurrentSystemYear || (revSelectedYear === revCurrentSystemYear && revSelectedMonth >= revCurrentSystemMonth)) {
                return;
            }

            revSelectedMonth++;
            if (revSelectedMonth > 12) {
                revSelectedMonth = 1;
                revSelectedYear++;
            }
            fetchAndRenderRevenueData();
        });

        // Reflect the initial (server-rendered) totals in the empty-state note.
        toggleRevEmptyNote({{ $revenue_year_total }});
    </script>
@endsection