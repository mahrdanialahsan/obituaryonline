@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Today Payments <span style="float: right" class="today_payments" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.payments')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Payments <span style="float: right" class="total_payments" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.payments')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Today Contributors <span style="float: right" class="today_contributors" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.contributors')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Contributors <span style="float: right" class="total_contributors" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.contributors')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Users <span style="float: right" class="total_users" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.users')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">New Users <span style="float: right" class="today_users" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.users')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Today Obituaries <span style="float: right" class="today_obituaries" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.obituaries')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Obituaries <span style="float: right" class="total_obituaries" ></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('admin.obituaries')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Service Charges <span style="float: right" class="total_service_charges" ></span></div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Released Payment <span style="float: right" class="total_released_payments" ></span></div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Pending Released Payment <span style="float: right" class="pending_released_payments" ></span></div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Pending Released  Obituaries<span style="float: right" class="pending_released_obituaries" ></span></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Last Few days Analysis
                </div>
                <div class="card-body"><canvas id="last30Days" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Last Few Months Analysis
                </div>
                <div class="card-body"><canvas id="last12Months" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    Pending Release Payments
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>DOD</th>
                            <th>Wake Period</th>
                            <th>Funeral date</th>
                            <th>Donation</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $row)
                            <tr>
                                <td>{{$row->deceased_first_name}} {{$row->deceased_last_name}}</td>
                                <td>{{\Carbon\Carbon::parse($row->date_of_birth)->format('Y-m-d')}}</td>
                                <td>{{\Carbon\Carbon::parse($row->date_of_death)->format('Y-m-d H:i')}}</td>
                                <td>{{$row->wake_period}}</td>
                                <td>{{\Carbon\Carbon::parse($row->funeral_date)->format('Y-m-d H:i')}}</td>
                                <td>{{number_format($row->total_donation,2)}}$</td>
                                <td>{{number_format($row->total_paid,2)}}$</td>
                                <td>{{$row->status == 0 ? 'Pending':(    $row->status == 1 ? 'Approved': 'Deactivated'  )}}</td>
                                <td>
                                    <a class="btn btn-sm btn-dark" href="{{route('admin.obituary.show',['id' => $row->id ])}}">View</a>
                                    @if($row->total_donation > $row->total_paid)
                                        <a class="btn btn-sm btn-dark" href="{{route('admin.obituary.pay',['id' => $row->id ])}}">Release ({{round($row->total_donation-$row->total_paid,2)}}$)</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/admin/js/Chart.min.js')}}" crossorigin="anonymous"></script>
    <script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
        var lineChart = document.getElementById("last30Days");
        var barChart = document.getElementById("last12Months");
        function getAnalysis(){
            $.ajax({
                type        : 'GET',
                url         : `/admin/analysis`,
                processData : false,
                contentType : false,
                cache       : false,
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'success'){
                        let data = response.data;
                        if(data){
                            $(`.today_payments`).text(data.today_payments+"$");
                            $(`.total_payments`).text(data.total_payments+"$");

                            $(`.today_contributors`).text(data.today_contributors);
                            $(`.total_contributors`).text(data.total_contributors);

                            $(`.today_users`).text(data.today_users);
                            $(`.total_users`).text(data.total_users);

                            $(`.today_obituaries`).text(data.today_obituaries);
                            $(`.total_obituaries`).text(data.total_obituaries);


                            $(`.total_service_charges`).text(data.total_service_charges+"$");
                            $(`.total_released_payments`).text(data.total_released_payments+"$");
                            $(`.pending_released_payments`).text(data.pending_released_payments+"$");
                            $(`.pending_released_obituaries`).text(data.pending_released_obituaries);

                            let lineLable = [];
                            let lineData = [];
                            let lineMax = 100;
                            data.last_30_days.forEach(x=>{
                                lineLable.push(x.day)
                                lineData.push(x.amount)
                                if(parseInt(x.amount) > parseInt(lineMax)){
                                    lineMax = parseFloat(x.amount)+100;
                                }
                            })

                            var myLineChart = new Chart(lineChart, {
                                type: 'line',
                                data: {
                                    labels: lineLable,//["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
                                    datasets: [{
                                        label: "Amount $",
                                        lineTension: 0.3,
                                        backgroundColor: "rgba(2,117,216,0.2)",
                                        borderColor: "rgba(2,117,216,1)",
                                        pointRadius: 5,
                                        pointBackgroundColor: "rgba(2,117,216,1)",
                                        pointBorderColor: "rgba(255,255,255,0.8)",
                                        pointHoverRadius: 5,
                                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                                        pointHitRadius: 50,
                                        pointBorderWidth: 2,
                                        data: lineData,// [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
                                    }],
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            time: {
                                                unit: 'date'
                                            },
                                            gridLines: {
                                                display: false
                                            },
                                            ticks: {
                                                maxTicksLimit: 7
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                min: 0,
                                                max: lineMax,
                                                maxTicksLimit: 5
                                            },
                                            gridLines: {
                                                color: "rgba(0, 0, 0, .125)",
                                            }
                                        }],
                                    },
                                    legend: {
                                        display: false
                                    }
                                }
                            });

                            let BarLable = [];
                            let BarData = [];
                            let barMax  =  100;
                            data.last_12_month.forEach(x=>{
                                BarLable.push(x.month);
                                BarData.push(x.amount);
                                if(parseInt(x.amount) > parseInt(barMax)){
                                    barMax = parseFloat(x.amount)+100;
                                }
                            })
                            var myLineChart = new Chart(barChart, {
                                type: 'bar',
                                data: {
                                    labels: BarLable,
                                    datasets: [{
                                        label: "Donation $",
                                        backgroundColor: "rgba(2,117,216,1)",
                                        borderColor: "rgba(2,117,216,1)",
                                        data: BarData,
                                    }],
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            time: {
                                                unit: 'month'
                                            },
                                            gridLines: {
                                                display: false
                                            },
                                            ticks: {
                                                maxTicksLimit: 6
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                min: 0,
                                                max: barMax,
                                                maxTicksLimit: 5
                                            },
                                            gridLines: {
                                                display: true
                                            }
                                        }],
                                    },
                                    legend: {
                                        display: false
                                    }
                                }
                            });
                        }
                    }
                },
                error: function (data) {
                    toaster('Error',data.responseJSON.message,'error');
                }
            })
        }
        $(document).ready(function () {
            getAnalysis();
        })
    </script>
@endpush