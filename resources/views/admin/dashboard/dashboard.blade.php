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
                                <i class="fa-solid fa-users fa-2x"></i>
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
                                <i class="fa-solid fa-user-tie fa-2x"></i>
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
                                <i class="fa-solid fa-user-clock fa-2x"></i>
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
                                <i class="fa-solid fa-list fa-2x"></i>
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
                                <i class="fa-solid fa-users fa-2x"></i>
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
                                <i class="fa-solid fa-user-tie fa-2x"></i>
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
                                <i class="fa-solid fa-user-clock fa-2x"></i>
                            </div>
                            <div class="card-stat-content">
                                <span>{{ __('label.pending_quotes') }}</span>
                                <h3>{{ No_Format($total_requests) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card custom-card card-color-primary">
                        <div class="card-body">
                            <div class="card-icon-primary">
                                <i class="fa-solid fa-list fa-2x"></i>
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
                        <div class="box-title">
                            <h2 class="title"><i class="fa-solid fa-chart-column fa-lg mr-2"></i>Join Users &amp; Author
                                Statistice</h2>
                        </div>
                        <div class="dash-chart-btns mt-3">
                            <button id="year" class="dash-chart-btn active">This Year</button>
                            <button id="month" class="dash-chart-btn">This Month</button>
                        </div>
                        <div class="chart-body">
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
                                            <img src="{{ $value['banner_img'] ?? "" }}" class="category-image">
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
                                            <img src="{{ asset('assets/imgs/default.png') }}">
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
            },
            series: [],
            xaxis: {
                categories: [],
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
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        colors: '#999'
                    }
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                fontSize: '13px',
                fontWeight: 600,
                markers: {
                    radius: 4
                },
                labels: {
                    colors: '#555'
                }
            }
        };

        let chart = new ApexCharts(document.querySelector("#userRequestsChart"), chartOptions);
        chart.render();

        function loadChartData(type) {
            if (type === 'year') {
                chart.updateOptions({
                    series: [{
                        name: "Users",
                        data: userYear
                    },
                    ],
                    xaxis: {
                        categories: [
                            'Jan', 'Feb', 'Mar', 'Apr',
                            'May', 'Jun', 'Jul', 'Aug',
                            'Sep', 'Oct', 'Nov', 'Dec'
                        ],
                        labels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: 600
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: 600
                            }
                        }
                    }
                });
            } else {
                let daysInMonth = userMonth.length;
                chart.updateOptions({
                    series: [{
                        name: "Users",
                        data: userMonth
                    },
                    ],
                    xaxis: {
                        categories: Array.from({
                            length: daysInMonth
                        }, (_, i) => (i + 1).toString())
                    }
                });
            }
        }

        loadChartData('year');

        document.getElementById('year').addEventListener('click', function () {
            loadChartData('year');
            this.classList.add('active');
            document.getElementById('month').classList.remove('active');
        });
        document.getElementById('month').addEventListener('click', function () {
            loadChartData('month');
            this.classList.add('active');
            document.getElementById('year').classList.remove('active');
        });

    </script>
@endsection