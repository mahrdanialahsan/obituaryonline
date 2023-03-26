@extends('layouts.public')
@push('css')
    <style>
        .card-header {
            background-color:  #232323;
            color: #fff !important;
        }
        .card-header h4 {
            color: #fff !important;
        }
        .card-body {
             padding: 0px !important;

        }
        .table {
             margin-bottom: 0rem !important;
        }
    </style>
@endpush
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->obituary_page_cover_image)) ?  url('storage/site_settings/'.$site->obituary_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{ucfirst($obituary->deceased_first_name)}} {{$obituary->deceased_last_name}} payments details</h1>
                </div>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">Obituary</li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12"><h4>Contributor Payment Details</h4></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Contributor Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $row)
                                    <tr>
                                        <td style="text-align: center">{{$row->deceased_first_name}} {{$row->user_name}}</td>
                                        <td style="text-align: center">{{$row->amount}}$</td>
                                        <td style="text-align: center">{{date('Y-m-d H:i', strtotime($row->created_at))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12"><h4>Released Payment Details</h4></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($releasedpayments as $row)
                                    <tr>
                                        <td style="text-align: center">{{$row->amount}}$</td>
                                        <td style="text-align: center">{{date('Y-m-d H:i', strtotime($row->created_at))}}</td>
                                        <td style="text-align: center"><a download href="{{url('storage/deceased_picture/'.$obituary->deceased_picture)}}">Download</a> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
