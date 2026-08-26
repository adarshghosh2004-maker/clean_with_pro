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
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-12 col-xl-8 mb-4">
                    <div class="cart-bg h-100">
                        <div class="box-title d-flex justify-content-between align-items-center flex-wrap">
                            <h2 class="title"><i class="fa-solid fa-chart-column fa-lg mr-2"></i>Join Users &amp; Author
                                Statistice</h2>
                            <div class="dash-chart-btns">
                                <button id="year" class="dash-chart-btn active">This Year</button>
                                <button id="month" class="dash-chart-btn">This Month</button>
                            </div>
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

                <div class="col-12 col-xl-4 mb-4">
                    <div class="category-box h-100">
                        <div class="box-title mt-0">
                            <h2 class="title"><i class="fa-solid fa-table-cells-large fa-lg mr-2"></i>Top Services</h2>
                        </div>
                        <div class="pt-3 mt-0">
                            <div class="row pr-3">
                                @foreach ($top_services as $key => $value)
                                    <div class="col-12 mb-2 pr-0 content-box">
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
    <style>
        .month-nav-wrapper {
            background-color: var(--light-color, #f8f9fa) !important;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 10px;
        }
        .chart-loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.7);
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
    </style>

    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        const monthNamesFull = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

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
                    formatter: function(val) {
                        if (currentView === 'month') {
                            let dayNum = parseInt(val);
                            if (dayNum) {
                                return `${monthNamesFull[selectedMonth - 1]} ${dayNum}, ${selectedYear}`;
                            }
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
                    plotOptions: {
                        bar: { columnWidth: '70%' }
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: { fontSize: '10px' }
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
            } else {
                overlay.classList.add('d-none');
                overlay.classList.remove('d-flex');
                updateMonthNavButtons();
            }
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
            const monthNav = document.getElementById('monthNavContainer');
            const yearBtn = document.getElementById('year');
            const monthBtn = document.getElementById('month');

            if (view === 'month') {
                yearBtn.classList.remove('active');
                monthBtn.classList.add('active');
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
    </script>
@endsection