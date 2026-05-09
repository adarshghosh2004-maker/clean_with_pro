@extends('admin.layout.page-app')
@section('page_title', __('label.dashboard'))
@section('tab_title', __('label.dashboard'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <div class="container-fluid">
                <style>
                    .stat-card {
                        background: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 20px;
                        margin-bottom: 20px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
                        display: flex;
                        align-items: center;
                        transition: all 0.3s ease;
                    }

                    .stat-card:hover {
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
                        transform: translateY(-2px);
                    }

                    .stat-icon {
                        width: 60px;
                        height: 60px;
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 20px;
                        font-size: 28px;
                        color: white;
                    }

                    .stat-icon.blue {
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    }

                    .stat-icon.green {
                        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                    }

                    .stat-icon.orange {
                        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
                    }

                    .stat-icon.purple {
                        background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
                    }

                    .stat-icon.red {
                        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
                    }

                    .stat-icon.teal {
                        background: linear-gradient(135deg, #ff9a56 0%, #ff6a88 100%);
                    }

                    .stat-content {
                        flex: 1;
                    }

                    .stat-label {
                        font-size: 12px;
                        color: #999;
                        font-weight: 500;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                        margin-bottom: 8px;
                    }

                    .stat-value {
                        font-size: 32px;
                        font-weight: 700;
                        color: #333;
                        margin: 0;
                    }

                    .chart-card {
                        background: #fff;
                        border: none;
                        border-radius: 8px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
                        margin-bottom: 20px;
                    }

                    .chart-header {
                        padding: 20px;
                        border-bottom: 1px solid #f0f0f0;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }

                    .chart-title {
                        font-size: 16px;
                        font-weight: 600;
                        color: #333;
                        margin: 0;
                        display: flex;
                        align-items: center;
                    }

                    .chart-title i {
                        margin-right: 10px;
                        font-size: 18px;
                        color: #667eea;
                    }

                    .chart-body {
                        padding: 20px;
                    }

                    .view-all {
                        color: #667eea;
                        text-decoration: none;
                        font-size: 12px;
                        font-weight: 600;
                    }

                    .view-all:hover {
                        text-decoration: underline;
                    }
                </style>

                <!-- Statistics Cards Row 1 -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon blue">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Users</div>
                                <h3 class="stat-value">{{ $total_users }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon green">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Services</div>
                                <h3 class="stat-value">{{ $total_services }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon orange">
                                <i class="fas fa-video"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Videos</div>
                                <h3 class="stat-value">{{ $total_videos }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon purple">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Packages</div>
                                <h3 class="stat-value">{{ $total_packages }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards Row 2 -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon red">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Feedbacks</div>
                                <h3 class="stat-value">{{ $total_feedbacks }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon teal">
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Questions</div>
                                <h3 class="stat-value">{{ $total_questions }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon blue">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Total Requests</div>
                                <h3 class="stat-value">{{ $total_requests }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon green">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Active Services</div>
                                <h3 class="stat-value">{{ $active_services }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5 class="chart-title">
                                    <i class="fas fa-line-chart"></i>
                                    User Requests Over Time
                                </h5>
                            </div>
                            <div class="chart-body">
                                <div id="userRequestsChart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5 class="chart-title">
                                    <i class="fas fa-bars"></i>
                                    Top Services by Requests
                                </h5>
                            </div>
                            <div class="chart-body">
                                <div id="topServicesChart"></div>
                            </div>
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
        // User Requests Chart
        var userRequestsOptions = {
            series: [{
                name: 'Requests',
                data: @json($user_request_counts)
            }],
            chart: {
                type: 'area',
                height: 350,
                sparkline: {
                    enabled: false
                }
            },
            colors: ['#667eea'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                }
            },
            xaxis: {
                categories: @json($user_request_dates),
                labels: {
                    style: {
                        colors: '#999',
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#999',
                        fontSize: '12px'
                    }
                }
            },
            grid: {
                borderColor: '#f0f0f0',
                strokeDashArray: 4
            },
            stroke: {
                curve: 'smooth',
                width: 2
            }
        };
        var userRequestsChart = new ApexCharts(document.querySelector("#userRequestsChart"), userRequestsOptions);
        userRequestsChart.render();

        // Top Services Chart
        var topServicesOptions = {
            series: [{
                data: @json($top_services_counts),
                color: '#667eea'
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            colors: ['#667eea'],
            plotOptions: {
                bar: {
                    horizontal: true,
                    distributed: false,
                    borderRadius: 4
                }
            },
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                offsetX: 10,
                style: {
                    colors: ['#667eea'],
                    fontSize: '12px',
                    fontWeight: 600
                }
            },
            xaxis: {
                categories: @json($top_services_labels),
                labels: {
                    style: {
                        colors: '#999',
                        fontSize: '12px'
                    }
                }
            },
            grid: {
                borderColor: '#f0f0f0',
                strokeDashArray: 4
            }
        };
        var topServicesChart = new ApexCharts(document.querySelector("#topServicesChart"), topServicesOptions);
        topServicesChart.render();
    </script>
@endsection