@extends('layouts.header')
@section('dashboard')
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Đơn hàng</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$analytics['tong_don']}} đơn hàng</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm" style="font-weight: bold;">
                                <span class="text-success mr-2"> </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Doanh thu</h5>
                                    <span class="h2 font-weight-bold mb-0">{{number_format($analytics['doanh_thu'])}} VND</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm" style="font-weight: bold;">
                                <span class="text-success mr-2"> </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Lợi nhuận</h5>
                                    <span class="h2 font-weight-bold mb-0">{{number_format($analytics['loi_nhuan']->profit)}} VND
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm" style="font-weight: bold;">
                                <span class="text-success mr-2"></span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">VNPost</h5>
                                    <span class="h2 font-weight-bold mb-0">0
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm" style="font-weight: bold;">
                                <span class="text-success mr-2"></span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('content')
    <style>
        .highcharts-background {
            display: none;
        }
        #table-scroll {
            height:500px;
            overflow:auto;
        }::-webkit-scrollbar {
             width: 0px;
         }
    </style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-6 col-lg-6" style="padding-top: 10px">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div id="chartcount" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6" style="padding-top: 10px">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div id="chartprofit" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>




        <link rel="stylesheet" type="text/css" href="{{ asset('js/highcharts_date_range_grouping.css') }}">
        <script src="{{ asset('js/highcharts.js') }}"></script>
        <script src="{{ asset('js/highcharts_date_range_grouping.min.js') }}"></script>
        <script>

            Highcharts.chart('chartcount', {
                chart: {
                    type: 'column'
                },
                dateRangeGrouping: {
                    dayFormat: {
                        month: 'numeric',
                        day: 'numeric',
                        year: 'numeric'
                    },
                    weekFormat: {
                        month: 'numeric',
                        day: 'numeric',
                        year: 'numeric'
                    },
                    monthFormat: {
                        month: 'numeric',
                        year: 'numeric'
                    }
                },
                title: {
                    text: 'Số đơn'
                },
                xAxis: {
                    categories: {!! $chartcount['date'] !!}
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                colors: ['#5e72e4', '#2dce89', '#f5365c', '#fb6340', '#60fb00', '#fb1717', ],
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        colorByPoint: false,
                    }
                },
                series: [
                        @foreach($trangthai as $t)
                    {
                        name: '{{$t->ten_trangthai}}',
                        data: {{$chartcount['tt'.$t->id]}}
                    },@endforeach
                ]
            });
            Highcharts.chart('chartprofit', {
                chart: {
                    type: 'column'
                },
                dateRangeGrouping: {
                    dayFormat: {
                        month: 'numeric',
                        day: 'numeric',
                        year: 'numeric'
                    },
                    weekFormat: {
                        month: 'numeric',
                        day: 'numeric',
                        year: 'numeric'
                    },
                    monthFormat: {
                        month: 'numeric',
                        year: 'numeric'
                    }
                },
                title: {
                    text: 'Lợi nhuận'
                },
                xAxis: {
                    categories: {!! $chartprofit['date'] !!}
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                colors: ['#5e72e4', '#2dce89', '#f5365c', '#fb6340', '#60fb00', '#fb1717', ],
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        colorByPoint: false,
                    }
                },
                series: [
                        @foreach($trangthai as $t)
                    {
                        name: '{{$t->ten_trangthai}}',
                        data: {{$chartprofit['tt'.$t->id]}}
                    },@endforeach
                ]
            });
        </script>



@endsection