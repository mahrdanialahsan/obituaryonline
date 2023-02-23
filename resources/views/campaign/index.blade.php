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
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->fundraise_page_cover_image)) ?  url('storage/site_settings/'.$site->fundraise_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>My Campaigns</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">Campaign</li> </ul>
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
                                    <a class="nav-link active" data-toggle="pill" href="#Draft" role="tab" aria-controls="pills-Draft" aria-selected="true">Draft <span class="badge bg-secondary">{{collect($campaigns['draft'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Pending" role="tab" aria-controls="pills-Pending" aria-selected="true">Pending <span class="badge bg-secondary">{{collect($campaigns['pending'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Approved" role="tab" aria-controls="pills-Approved" aria-selected="false">Approved <span class="badge bg-secondary">{{collect($campaigns['approved'])->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#Rejected" role="tab" aria-controls="pills-Rejected" aria-selected="false">Rejected <span class="badge bg-secondary">{{collect($campaigns['rejected'])->count()}}</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">

                            <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="Draft" role="tabpanel" aria-labelledby="Draft-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($campaigns['draft'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No draft campaign found.
                                        </div>
                                    @else
                                        @foreach($campaigns['draft'] as $campaign)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$campaign->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('campaign.details',['id'=>$campaign->uid])}}">{{$campaign->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        @php
                                                            $dateOfBirth = $campaign->date_of_birth;
                                                            $dob = new DateTime($dateOfBirth);
                                                            $now = new DateTime();
                                                            $diff = $now->diff($dob);
                                                        @endphp
                                                        <strong>Age:</strong>{{ $diff->y > 0 ? $diff->y." years ":''}} {{$diff->m > 0 ? $diff->m." months ":''}} {{$diff->d > 0 ? $diff->d." days":''}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($campaign->date_of_death))}}
                                                    </div>
                                                </div>
                                                <div class="card__cta">
                                                    <a href="{{route('campaign.show',['id'=>$campaign->uid])}}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($campaigns['pending'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No pending campaign found.
                                        </div>
                                    @else
                                        @foreach($campaigns['pending'] as $campaign)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$campaign->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('campaign.details',['id'=>$campaign->uid])}}">{{$campaign->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        @php
                                                            $dateOfBirth = $campaign->date_of_birth;
                                                            $dob = new DateTime($dateOfBirth);
                                                            $now = new DateTime();
                                                            $diff = $now->diff($dob);
                                                        @endphp
                                                        <strong>Age:</strong>{{ $diff->y > 0 ? $diff->y." years ":''}} {{$diff->m > 0 ? $diff->m." months ":''}} {{$diff->d > 0 ? $diff->d." days":''}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($campaign->date_of_death))}}
                                                    </div>
                                                </div>
                                                <div class="card__cta">
                                                    <a href="{{route('campaign.show',['id'=>$campaign->uid])}}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Approved" role="tabpanel" aria-labelledby="Approved-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($campaigns['approved'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No approved campaign found.
                                        </div>
                                    @else
                                        @foreach($campaigns['approved'] as $campaign)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$campaign->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('campaign.details',['id'=>$campaign->uid])}}">{{$campaign->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        @php
                                                            $dateOfBirth = $campaign->date_of_birth;
                                                            $dob = new DateTime($dateOfBirth);
                                                            $now = new DateTime();
                                                            $diff = $now->diff($dob);
                                                        @endphp
                                                        <strong>Age:</strong>{{ $diff->y > 0 ? $diff->y." years ":''}} {{$diff->m > 0 ? $diff->m." months ":''}} {{$diff->d > 0 ? $diff->d." days":''}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($campaign->date_of_death))}}
                                                    </div>
                                                </div>
    {{--                                            <div class="card__cta">--}}
    {{--                                                <a href="{{route('campaign.show',['id'=>$campaign->uid])}}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> Edit</a>--}}
    {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Rejected" role="tabpanel" aria-labelledby="Rejected-tab">
                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @if(collect($campaigns['rejected'])->count()==0)
                                        <div class="alert alert-warning" style="width: 100%;">
                                            No rejected campaign found.
                                        </div>
                                    @else
                                        @foreach($campaigns['rejected'] as $campaign)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$campaign->deceased_picture)}})"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word"><a href="{{route('campaign.details',['id'=>$campaign->uid])}}">{{$campaign->deceased_name}}</a></h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        @php
                                                            $dateOfBirth = $campaign->date_of_birth;
                                                            $dob = new DateTime($dateOfBirth);
                                                            $now = new DateTime();
                                                            $diff = $now->diff($dob);
                                                        @endphp
                                                        <strong>Age:</strong>{{ $diff->y > 0 ? $diff->y." years ":''}} {{$diff->m > 0 ? $diff->m." months ":''}} {{$diff->d > 0 ? $diff->d." days":''}}
                                                    </div>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Passed away peacefully on {{date('d F Y',strtotime($campaign->date_of_death))}}
                                                    </div>
                                                </div>
    {{--                                            <div class="card__cta">--}}
    {{--                                                <a href="{{route('campaign.show',['id'=>$campaign->uid])}}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> Edit</a>--}}
    {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    @endforeach
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
