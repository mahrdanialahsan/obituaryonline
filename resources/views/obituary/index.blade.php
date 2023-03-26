@extends('layouts.public')
@push('css')
    <style>

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color:  #232323;
        }
    </style>
@endpush
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->obituary_page_cover_image)) ?  url('storage/site_settings/'.$site->obituary_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>My Obituaries</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color:  #232323;">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#Draft" role="tab" aria-controls="pills-Draft" aria-selected="true">Draft <span class="badge bg-secondary">{{collect($obituaries['draft'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Pending" role="tab" aria-controls="pills-Pending" aria-selected="true">Pending <span class="badge bg-secondary">{{collect($obituaries['pending'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Approved" role="tab" aria-controls="pills-Approved" aria-selected="false">Approved <span class="badge bg-secondary">{{collect($obituaries['approved'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Rejected" role="tab" aria-controls="pills-Rejected" aria-selected="false">Rejected <span class="badge bg-secondary">{{collect($obituaries['rejected'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Payment" role="tab" aria-controls="pills-Payment" aria-selected="false">Payments <span class="badge bg-secondary">{{collect($obituaries['all'])->count()}}</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">

                            <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="Draft" role="tabpanel" aria-labelledby="Draft-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($obituaries['draft'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No draft obituary found.
                                        </div>
                                    @else
                                        @foreach($obituaries['draft'] as $obituary)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$obituary->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('obituary.details',['id'=>$obituary->uid])}}">{{$obituary->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                       <strong>Age:</strong>{{getAge($obituary->date_of_birth,$obituary->date_of_death)}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($obituary->date_of_death))}}
                                                    </div>
                                                </div>
                                                <div class="card__cta">
                                                    <a href="{{route('obituary.show',['id'=>$obituary->uid])}}" class=" btn-ghost clearfix triggerDonateNow11 impact-message button button--small button--full " id="user-input-holder"> Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($obituaries['pending'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No pending obituary found.
                                        </div>
                                    @else
                                        @foreach($obituaries['pending'] as $obituary)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$obituary->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('obituary.details',['id'=>$obituary->uid])}}">{{$obituary->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">

                                                        <strong>Age:</strong>{{getAge($obituary->date_of_birth,$obituary->date_of_death)}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($obituary->date_of_death))}}
                                                    </div>
                                                </div>
                                                <div class="card__cta">
                                                    <a href="{{route('obituary.show',['id'=>$obituary->uid])}}" class=" btn-ghost clearfix triggerDonateNow1 impact-message button button--small button--full " id="user-input-holder"> Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Approved" role="tabpanel" aria-labelledby="Approved-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($obituaries['approved'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No approved obituary found.
                                        </div>
                                    @else
                                        @foreach($obituaries['approved'] as $obituary)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$obituary->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('obituary.details',['id'=>$obituary->uid])}}">{{$obituary->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">

                                                        <strong>Age:</strong>{{getAge($obituary->date_of_birth,$obituary->date_of_death)}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($obituary->date_of_death))}}
                                                    </div>
                                                </div>
    {{--                                            <div class="card__cta">--}}
    {{--                                                <a href="{{route('obituary.show',['id'=>$obituary->uid])}}" class=" btn-ghost clearfix triggerDonateNow1 impact-message button button--small button--full " id="user-input-holder"> Edit</a>--}}
    {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Rejected" role="tabpanel" aria-labelledby="Rejected-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($obituaries['rejected'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No rejected obituary found.
                                        </div>
                                    @else
                                        @foreach($obituaries['rejected'] as $obituary)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$obituary->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('obituary.details',['id'=>$obituary->uid])}}">{{$obituary->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">

                                                        <strong>Age:</strong>{{getAge($obituary->date_of_birth,$obituary->date_of_death)}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($obituary->date_of_death))}}
                                                    </div>
                                                </div>
    {{--                                            <div class="card__cta">--}}
    {{--                                                <a href="{{route('obituary.show',['id'=>$obituary->uid])}}" class=" btn-ghost clearfix triggerDonateNow1 impact-message button button--small button--full " id="user-input-holder"> Edit</a>--}}
    {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                                <div class="tab-pane fade" id="Payment" role="tabpanel" aria-labelledby="Payment-tab">
                                    <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                        @if(collect($obituaries['all'])->count()==0)
                                            <div class="alert alert-warning" style="width: 100%;">
                                                No  obituary found.
                                            </div>
                                        @else

                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Total Amount</th>
                                                        <th>Total Received</th>
                                                        <th>Details</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($obituaries['all'] as $obituary)
                                                        <tr>
                                                            <td><a href="{{route('obituary.details',['id'=>$obituary->uid])}}">{{$obituary->deceased_first_name}} {{$obituary->deceased_last_name}}</a></td>
                                                            <td style="text-align: right">{{$obituary->total_donation}}$</td>
                                                            <td style="text-align: right">{{$obituary->total_paid}}$</td>
                                                            <td><a href="{{route('obituary.payments',['id'=>$obituary->uid])}}"> View</a> </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Total</th>
                                                            <th style="text-align: right">{{collect($obituaries['all'])->sum('total_donation')}}$</th>
                                                            <th style="text-align: right">{{collect($obituaries['all'])->sum('total_paid')}}$</th>
                                                            <th>-</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
