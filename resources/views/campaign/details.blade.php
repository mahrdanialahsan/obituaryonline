@extends('layouts.public')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('images/12.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>Memory</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">My account</li>                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <BR>
    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="blog-details-content">
                        <div class="thm-unit-test">
                            <div class="content-one">
                                <figure class="image-box">
                                    <img src="{{url('storage/deceased_picture/'.$campaign->deceased_picture)}}" class="image" >
                                    <span class="post-date">{{date('F d, Y',strtotime($campaign->created_at))}}</span>
                                </figure>
                            </div>




                            <div class="" id="donate-trig" style="margin-left: 0px;">
                                <h3 class="h3 mt-40">How Your Donation Makes a Difference</h3>

                                <div class="company-profile__donation-cards">
                                    <div class="border-all dtn-amt-item m-bot30 border-round clearfix ">
                                        <div class="horizontal-card">
                                            <div class="horizontal-card__head">
                                                <h2 class="vertical-horizontal-center"> $80 </h2>
                                            </div>
                                            <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;"> <div class="text-left dtn-desc m-left0 text-left"> <span class="small">
<p class="body-txt break-word" id="otherAmtMessage"> Your donation could help provide a meal for 3 children in our Canossaville Student Care programme for a month. </p> </span> </div> </div>
                                            <div class=" horizontal-card__aside horizontal-card__aside--light-blue company-profile__donate-card dtn-btns" style="margin-left: 0px;">
                                                <button data-value="80" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> DONATE $80</button>
                                                <button data-value="80" class="button button--ghost button--small button--full ignore-label-update impact-message user-input-holder custom-amt-input-modal btn-ghost "> <span id="user-input-holder">ADD TO CART</span> </button>
                                            </div> </div> </div> </div>


                                <div class="company-profile__donation-cards">
                                    <div class="border-all dtn-amt-item m-bot30 border-round clearfix ">
                                        <div class="horizontal-card">
                                            <div class="horizontal-card__head">
                                                <h2 class="vertical-horizontal-center"> $90 </h2>
                                            </div>
                                            <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;"> <div class="text-left dtn-desc m-left0 text-left"> <span class="small">
<p class="body-txt break-word" id="otherAmtMessage"> Your donation could help provide a meal for 3 children in our Canossaville Student Care programme for a month. </p> </span> </div> </div>
                                            <div class=" horizontal-card__aside horizontal-card__aside--light-blue company-profile__donate-card dtn-btns" style="margin-left: 0px;">
                                                <button data-value="80" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> DONATE $80</button>
                                                <button data-value="80" class="button button--ghost button--small button--full ignore-label-update impact-message user-input-holder custom-amt-input-modal btn-ghost "> <span id="user-input-holder">ADD TO CART</span> </button>
                                            </div> </div> </div> </div>



                                <div class="company-profile__donation-cards">
                                    <div class="border-all dtn-amt-item m-bot30 border-round clearfix other-impact-message">
                                        <div class="horizontal-card">
                                            <div class="horizontal-card__head">
                                                <div class="input-ctrl">
                                                    <label for="other-amt">
                                                        <h3 class="h3">Other amount</h3> </label>
                                                    <div id="custom-amt-input-modal">
                                                        <input id="other-amt2" type="number" class="input input--currency button-input other-amount" placeholder="0" onkeypress="return (event.charCode >= 48 &amp;&amp; event.charCode <= 57)|| event.which === 8"> <span class="input-ctrl__currency">$</span>
                                                    </div> </div> </div>
                                            <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;"> <div class="text-left dtn-desc m-left0 text-left">
<span class="small">
<p class="body-txt break-word" id="otherAmtMessage"> Every Dollar Counts! Thank you for your donation to support our programmes and services. </p> </span> </div> </div>
                                            <div class=" horizontal-card__aside horizontal-card__aside--light-blue company-profile__donate-card dtn-btns" style="margin-left: 0px;">
                                                <button data-value="OTHER" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full user-input-holder " id="user-input-holder">DONATE TODAY</button>
                                                <button data-value="OTHER" class="button button--ghost button--small button--full ignore-label-update impact-message user-input-holder custom-amt-input-modal btn-ghost ">
                                                    <span id="user-input-holder">ADD TO CART</span> </button>
                                            </div> </div> </div> </div> </div>


                            <br>


                            <div class="text">
                                <h3 class="h3">About Campaign</h3><br>
                                <div class="campaign-description">{{$campaign->message}}</div>

                            </div>

                            <div class="clearfix"><br></div>


                        </div>
                        <!--End thm-unit-test-->
                    </div>
                    <!--End blog-content-->

                </div>




                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <aside class="blog-sidebar">
                        <h5>In laving memory of</h5>
                        <h2 class="h2 volunteer-event__title break-word">{{$campaign->deceased_name}}</h2>
                        <p class="mt-10">Passed away on {{date('d F Y',strtotime($campaign->date_of_death))}}</p>
                        <br>
                        <div class="social-list social-list--just-left mt-16">
                            <a href="javascript:;" class="button button--icon button--ghost centered shareit addthis_button_compact">
                                <i class="ico ico-share button--icon__icon" style="margin-top:2px;"></i>
                                <span class="button--icon__name">SHARE</span> </a>


                            <label class="btn-checkbox-btn btn-checkbox-btn--save" tabindex="1000">
<span id="favouritebookmark" class="button button--icon button--ghost " data-toast-msg-on="You have saved the page" data-toast-msg-off="You have removed the page" data-state="false" data-role="toast-toggle">
<i class="ico ico-save button--icon__icon" style="margin-top:2px;"></i>
<span class="button--icon__name">SAVE</span></span></label>

                            <a id="copy-url" class="button button--icon button--ghost js-copy" data-clipboard-text="" data-toast-msg="Link is copied to clipboard"><i class="ico ico-link button--icon__icon" style="margin-top:2px;"></i>
                                <span class="button--icon__name">LINK</span></a>
                        </div>


                        <div class="volunteer-event__venue">
                            <div class="campaign-stats mt-16">
                                <div class="font-black">
                                    <div class="h2">$2,030</div>
                                    <div class="body-txt body-txt--small body-txt--no-letter-space bold">raised from 17 donors</div>
                                    <div class="progress-bar mt-8 mb-8">
                                        <div class="progress-bar__fill" style="width: 20%;"></div>
                                    </div>
                                    <span class="body-txt body-txt--small body-txt--no-letter-space bold">20% of $220,000</span>
                                    <span style="position: absolute;right: 1px;" class="body-txt body-txt--small body-txt--no-letter-space float-right bold">20 more days</span>
                                </div>
                            </div>
                        </div>



                        <div class="post-widget" style="text-align:center; margin-top:5rem;">
                            @php
                                $dateOfBirth = $campaign->date_of_birth;
                                $dob = new DateTime($dateOfBirth);
                                $now = new DateTime();
                                $diff = $now->diff($dob);
                            @endphp
                            <div class="widget-title"><h3>Age: <small>{{ $diff->y > 0 ? $diff->y." years ":''}} {{$diff->m > 0 ? $diff->m." months ":''}} {{$diff->d > 0 ? $diff->d." days":''}}</small></h3></div>
                            <div class="post-inner">
                                <p>Passed away peacefully on {{date('d F Y',strtotime($campaign->date_of_death))}}. </p>
                                <p>Dearly missed and fondly remembered by loved ones.</p>
                            </div>
                            <div class="widget-title"><h3></h3></div>
                               {!! $campaign->surviving_family !!}
{{--                            <div class="post-inner">--}}
{{--                                <span class="post-date" style="color:#000000; font-size:1.5rem;">Husband:</span>--}}
{{--                                <p>Late Robert Ang Bok Sin</p>--}}
{{--                            </div>--}}

{{--                            <div class="widget-title"><h3></h3></div>--}}
{{--                            <div class="post-inner">--}}
{{--                                <span class="post-date" style="color:#000000; font-size:1.5rem;">Sons & Daughters-in-law</span>--}}
{{--                                <p>Dennis Ang</p>--}}
{{--                                <p>Mervyn Ang & Lee Soo Tian</p>--}}
{{--                                <p>Alan Ang & Linda Chong</p>--}}
{{--                            </div>--}}


                        </div>


                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection