@extends('layouts.public')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->donate_page_cover_image)) ?  url('storage/site_settings/'.$site->donate_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->donate_page_header_title ? $site->donate_page_header_title:"Campaign"}}</h1>
                </div>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">{{$site->donate_page_header_title ? $site->donate_page_header_title:"Campaign"}}</li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- sidebar-page-container -->
    <section class="portlet" id="portlet_search_WAR_givingsgportlet">
        <div class="portlet-content"> <div class=" portlet-content-container" style="">
                <div class="portlet-body">
                    <main class=" pad search-result">
                        <input type="hidden" value="volunteer" id="searchType" />
                        <input type="hidden" value="" id="searchText" />
                        <input type="hidden" value="" id="lastUrl" />
                        <input type="hidden" value="" id="lastKeyword" />
                        <input type="hidden" value="DISTANCE" id="locationActiveTabs" />


                        <div class="pad-navbar search-result__body ctn-1200">

                            <div class="search-result__aside"> <!-- show btn -->
                                <div class="search-result__aside-head">
                                    <div class="flag-obj flag-obj--full">
                                        <div class="flag-obj__item">
                                            <span class="body-txt font-mid-grey">Filter By</span>
                                        </div>
                                        <div class="flag-obj__item text-right">
                                            <a class="text-link disabled body-txt--smaller bold js-clear-filters js-clear-filters-btn">CLEAR ALL</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="res-ctn search-result__mobile-menu" id="js-res-ctn--filter">
                                    <div class="res-ctn__bd lock-body">
                                        <div class="title-ctn is-expanded mt-12 causes_div mb-40" data-role="accr">
                                            <div class="title-ctn__head" data-role="accr__head"> Cause <i class="ico ico-chevron-up title-ctn__icon"></i> </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible" data-role="accr__body"> <ul class="checkbox-list causesFilter" data-role="list-show-more">
                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                       value="animal"
                                                                                                       id="26746"
                                                                                                       class="callSearch causesType"> <span
                                                                    class="checkbox-list__lbl-spn ">Animal Welfare</span>
                                                        </label></li>
                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                        value="arts"
                                                                                                        id="26747"
                                                                                                        class="callSearch causesType"> <span
                                                                    class="checkbox-list__lbl-spn ">Arts &amp; Heritage</span>
                                                        </label></li>
                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                        value="children"
                                                                                                        id="26748"
                                                                                                        class="callSearch causesType"> <span
                                                                    class="checkbox-list__lbl-spn ">Children &amp; Youth</span>
                                                        </label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="search-result__main">
                                <div class="search-result__main-head" id="search-result-holder">
                                    <p class="font-black bold caps search-result__result">
                                        <strong class="big">{{collect($campaigns)->count()}} </strong><span id="result_text">RESULTS FOUND</span>
                                    </p>
                                </div>

                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">
                                    @foreach($campaigns as $campaign)
                                        <div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{url('storage/deceased_picture/'.$campaign->deceased_picture)}})"></div>
                                                </div>
{{--                                                <div class="stats card__head-overlay font-white font-white">--}}
{{--                                                    <span class="stats__num">198</span>--}}
{{--                                                    <span class="stats__des">openings</span>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="card__body">
{{--                                                <h2 class="card__title truncate break-word">Voices of Singapore Rehearsals &amp;...</h2>--}}
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word">{{$campaign->deceased_name}}</h2>
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
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                        Dearly missed and fondly remembered by loved ones
                                                    </div>
                                                </div>
{{--                                                <div class="media-obj mt-16">--}}
{{--                                                    <div class="media-obj__asset">--}}
{{--                                                        <i class="ico ico--small ico-calendar"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">--}}
{{--                                                        Sun, 01 Jan 2023--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media-obj mt-16">--}}
{{--                                                    <div class="media-obj__asset">--}}
{{--                                                        <i class="ico ico--small ico-time"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">--}}
{{--                                                        12:00 AM to 12:00 AM--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media-obj mt-16">--}}
{{--                                                    <div class="media-obj__asset">--}}
{{--                                                        <i class="ico ico--small ico-location"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">--}}
{{--                                                        Islandwide--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media-obj mt-16">--}}
{{--                                                    <div class="media-obj__asset">--}}
{{--                                                        <i class="ico ico--small ico-people"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">--}}
{{--                                                        Suitable for: Open to All--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="card__cta">
                                                    <a href="{{route('donate.show',['id'=>$campaign->uid])}}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> DONATE</a>
                                                </div>
                                                <div class="card__cta">
                                                    <a href="{{route('campaign.details',['id'=>$campaign->uid])}}" class="button button--no-bg button--full" >LEARN MORE</a>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="card__link" href="#"></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>

@endsection
