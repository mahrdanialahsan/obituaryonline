@extends('layouts.public')

@section('content')
    <div data-elementor-type="wp-page" data-elementor-id="24" class="elementor elementor-24">
        <div class="elementor-section-wrap">
            <section class="elementor-section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element">
                                <div class="elementor-widget-container">

                                    <!-- banner-section -->
                                    <section class="banner-section style-two centred">
                                        <div class="banner-carousel">
                                            <div class="swiper-container banner-content">
                                                <div class="swiper-wrapper">
                                                    @if(collect($sliders)->count()>0)
                                                        @foreach($sliders as $slider)
                                                                <div class="swiper-slide">
                                                                    <div class="image-layer" style="background-image: url({{file_exists(storage_path('app/public/slider/'.$slider->fav_icon)) ?  url('storage/slider/'.$slider->image): asset('images/banner-4.jpg')}});"></div>
                                                                    <div class="auto-container">
                                                                        <div class="content-box">
                                                                            <figure class="icon-layer"><img decoding="async" src="{{asset('images/heart-5.png')}}" alt="Awesome Image"></figure>
                                                                            <div class="shape" style="background-image: url({{asset('images/shape-32.png')}});"></div>
                                                                            <span>{{$slider->small_title}} </span>
                                                                            <h2>{!! $slider->big_title !!}</h2>
                                                                            <p>{!! $slider->description !!}</p>
                                                                            @if($slider->allow_donate_button == 1)
                                                                                <div class="btn-box">
                                                                                    <a href="#" class="banner-btn">Donate Now</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @endforeach
                                                    @else
                                                        <div class="swiper-slide">
                                                            <div class="image-layer" style="background-image: url(images/banner-4.jpg);"></div><div class="auto-container">
                                                                <div class="content-box">
                                                                    <figure class="icon-layer"><img decoding="async" src="{{asset('images/heart-5.png')}}" alt="Awesome Image"></figure>
                                                                    <div class="shape" style="background-image: url({{asset('images/shape-32.png')}});"></div>
                                                                    <span>Give a Littele &amp; Help a Lot</span>
                                                                    <h2>Adopt a Child</h2>
                                                                    <p>Charity is a continuous process toward success and happiness <br />Let’s help them now.</p>
                                                                    <div class="btn-box">
                                                                        <a href="#" class="banner-btn">Donate Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif


{{--                                                    <div class="swiper-slide">--}}
{{--                                                        <div class="image-layer" style="background-image: url(images/banner-6.jpg);"></div>--}}
{{--                                                        <div class="auto-container">--}}
{{--                                                            <div class="content-box">--}}
{{--                                                                <figure class="icon-layer"><img decoding="async" src="images/heart-5.png" alt="Awesome Image"></figure>--}}
{{--                                                                <div class="shape" style="background-image: url(images/shape-32.png);"></div>--}}
{{--                                                                <span>A small Charity has an impact</span>--}}
{{--                                                                <h2>Good Souls</h2>--}}
{{--                                                                <p>Only when the society comes together and contributes ,we <br />will be able to make an impact</p>--}}
{{--                                                                <div class="btn-box">--}}
{{--                                                                    <a href="#" class="banner-btn">Donate Now</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}


                                                </div>
                                                <div class="swiper-nav-button">
                                                    <!-- Add Arrows -->
                                                    <div class="swiper-button-next"><i class="fa fa-arrow-right"></i></div>
                                                    <div class="swiper-button-prev"><i class="fa fa-arrow-left"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- banner-section end -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="elementor-section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element">
                                <div class="elementor-widget-container">

                                    <!-- case-style-two -->
                                    <section class="case-style-two sec-pad">
                                        <div class="pattern-layer"><br><br>
                                            <div class="pattern-1" style="background-image: url({{asset('images/shape-33.png')}});"></div>
                                            <div class="pattern-2" style="background-image: url({{asset('images/shape-34.png')}});"></div>
                                        </div>
                                        <figure class="icon-layer"><img decoding="async" src="{{asset('images/heart-6.png')}}" alt=""></figure>
                                        <div class="auto-container">
                                            <div class="title-inner">
                                                <div class="row align-items-center clearfix">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                                                        <div class="sec-title style-two">
                                                            <span class="top-text">{{$site->home_page_title_short_title ? $site->home_page_title_short_title:"Our Global Causes"}}</span>
                                                            <h2>{{$site->home_page_title_long_title ? $site->home_page_title_long_title:"Spread Joy with a Donation"}}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                                                        <div class="text">
                                                            <p>{{$site->home_page_title_short_description ? $site->home_page_title_short_description:"Ever undertakes laborious physical exercise except obtain some advantage from it but who has any right to find."}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                                                @foreach($campaigns as $campaign)
                                                <div class="case-block-two">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img width="570" height="420" src="{{url('storage/deceased_picture/'.$campaign->deceased_picture)}}"/></figure>
                                                            @if($campaign->public_donation == 1 || $campaign->created_by == auth()->id())
                                                            <div class="percentage-box">
                                                                <div class="bar">
                                                                    <div class="bar-inner count-bar counted" data-percent="50%"> <div class="count-box"><span class="count-text" data-speed="2500" data-stop="50">0</span>%</div></div>
                                                                </div>
                                                                <div class="count-text"><span class="amount">&#036;25,000.00</span> donated of <span class="goal-amount">&#036;50,000.00</span> goal</div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="text">
                                                                <div class="category">{{$site->home_page_campaign_slider_title ? $site->home_page_campaign_slider_title:"Our Causes"}} </div>
                                                                <h3><a href="{{route('campaign.details',['id'=>$campaign->uid])}}">{{$campaign->deceased_first_name}} {{$campaign->deceased_last_name}}</a></h3>
                                                                <p>{!! substr($campaign->message, 0, 131) !!}{{strlen($campaign->message)>130 ? '...':''}}</p>
                                                            </div>
                                                            <ul class="info-box clearfix">
                                                                <li>
                                                                    <i class="fa fa-calendar"></i>
                                                                    <h5>Date:<small> {{date('M d, Y',strtotime($campaign->created_at))}} </small></h5>
                                                                </li>
                                                                <li>
                                                                    @php
                                                                        $dateOfBirth = $campaign->date_of_birth;
                                                                        $dob = new DateTime($dateOfBirth);
                                                                        $now = new DateTime();
                                                                        $diff = $now->diff($dob);
                                                                    @endphp
                                                                    <i class="fa fa-users"></i>
                                                                    <h5>Age: <small>{{ $diff->y > 0 ? $diff->y." Years ":($diff->m > 0 ? $diff->m." Months ":($diff->d > 0 ? $diff->d." Days":'1 Day'))}}</small></h5>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </section>
                                    <!-- case-style-two end -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


{{--            <section class="elementor-section">--}}
{{--                <div class="elementor-container elementor-column-gap-default">--}}
{{--                    <div class="elementor-column">--}}
{{--                        <div class="elementor-widget-wrap elementor-element-populated">--}}
{{--                            <div class="elementor-element elementor-element-a43694e elementor-widget elementor-widget-purehearts_our_participate" data-id="a43694e" data-element_type="widget" data-widget_type="purehearts_our_participate.default">--}}
{{--                                <div class="elementor-widget-container">--}}

{{--                                    <!-- welcome-section -->--}}
{{--                                    <section class="welcome-section sec-pad">--}}
{{--                                        <div class="auto-container">--}}
{{--                                            <div class="sec-title style-two centred">--}}
{{--                                                <span class="top-text">Welcome to Pure Hearts</span>--}}
{{--                                                <h2>Participate in Changing the World</h2>--}}
{{--                                                <p>The master-builder of human happiness no one rejects, dislikes <br />or avoids  pleasure itself pleasure.</p>                </div>--}}
{{--                                            <div class="row clearfix">--}}
{{--                                                <div class="col-lg-4 col-md-6 col-sm-12 welcome-block">--}}
{{--                                                    <div class="welcome-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <figure class="image-box"><img decoding="async" src="images/welcome-1.jpg" alt="Awesome Image"></figure>--}}
{{--                                                            <div class="content-box">--}}
{{--                                                                <div class="shape" style="background-image: url(images/shape-32.png);"></div>--}}
{{--                                                                <div class="text">--}}
{{--                                                                    <span>Join With Us</span>--}}
{{--                                                                    <h2>Donate</h2>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="btn-box">--}}
{{--                                                                <a href="#" class="links"><i class="icon-right-arrow"></i></a>--}}
{{--                                                                <a href="#" class="links-btn"><i class="icon-right-arrow"></i>Read More</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="col-lg-4 col-md-6 col-sm-12 welcome-block">--}}
{{--                                                    <div class="welcome-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <figure class="image-box"><img decoding="async" src="images/welcome-2.jpg" alt="Awesome Image"></figure>--}}
{{--                                                            <div class="content-box">--}}
{{--                                                                <div class="shape" style="background-image: url(images/shape-32.png);"></div>--}}
{{--                                                                <div class="text">--}}
{{--                                                                    <span>Join With Us</span>--}}
{{--                                                                    <h2>Volunteer</h2>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="btn-box">--}}
{{--                                                                <a href="#" class="links"><i class="icon-right-arrow"></i></a>--}}
{{--                                                                <a href="#" class="links-btn"><i class="icon-right-arrow"></i>Read More</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="col-lg-4 col-md-6 col-sm-12 welcome-block">--}}
{{--                                                    <div class="welcome-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <figure class="image-box"><img decoding="async" src="images/welcome-4.jpg" alt="Awesome Image"></figure>--}}
{{--                                                            <div class="content-box">--}}
{{--                                                                <div class="shape" style="background-image: url(images/shape-32.png);"></div><div class="text">--}}
{{--                                                                    <span>Join With Us</span>--}}
{{--                                                                    <h2>Fundraise</h2>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="btn-box">--}}
{{--                                                                <a href="#" class="links"><i class="icon-right-arrow"></i></a>--}}
{{--                                                                <a href="#" class="links-btn"><i class="icon-right-arrow"></i>Read More</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </section>--}}
{{--                                    <!-- welcome-section end -->--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}


{{--            <section class="elementor-section elementor-top-section elementor-element elementor-element-1cb8d88 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1cb8d88" data-element_type="section">--}}
{{--                <div class="elementor-container elementor-column-gap-default">--}}
{{--                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0d8bb58" data-id="0d8bb58" data-element_type="column">--}}
{{--                        <div class="elementor-widget-wrap elementor-element-populated">--}}
{{--                            <div class="elementor-element elementor-element-1b4ffc1 elementor-widget elementor-widget-purehearts_our_funfacts" data-id="1b4ffc1" data-element_type="widget" data-widget_type="purehearts_our_funfacts.default">--}}
{{--                                <div class="elementor-widget-container">--}}

{{--                                    <!-- funfact-section -->--}}
{{--                                    <section class="funfact-section  centred" style="background-image: url(images/10.jpg);">--}}
{{--                                        <div class="auto-container">--}}
{{--                                            <div class="sec-title style-two light centred">--}}
{{--                                                <span class="top-text">About Pure Hearts</span>--}}
{{--                                                <h2>Pure Hearts Facts &amp; Figures</h2>--}}
{{--                                                <p>The master-builder of human happiness no one rejects, dislikes <br />or avoids  pleasure itself pleasure.</p>                </div>--}}
{{--                                            <div class="row clearfix">--}}
{{--                                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">--}}
{{--                                                    <div class="funfact-block-one wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <div class="icon-box"><i class="icon-charity"></i></div>--}}
{{--                                                            <div class="count-outer count-box">--}}
{{--                                                                <span class="count-text" data-speed="1500" data-stop="278">0</span><span></span>--}}
{{--                                                            </div>--}}
{{--                                                            <h4>Volunteers</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">--}}
{{--                                                    <div class="funfact-block-one wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <div class="icon-box"><i class="icon-donation-1"></i></div>--}}
{{--                                                            <div class="count-outer count-box">--}}
{{--                                                                <span class="count-text" data-speed="1500" data-stop="6.5">0</span><span>k</span>--}}
{{--                                                            </div>--}}
{{--                                                            <h4>Beneficiaries</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">--}}
{{--                                                    <div class="funfact-block-one wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <div class="icon-box"><i class="icon-donation"></i></div>--}}
{{--                                                            <div class="count-outer count-box">--}}
{{--                                                                <span class="count-text" data-speed="1500" data-stop="10">0</span><span>M</span>--}}
{{--                                                            </div>--}}
{{--                                                            <h4>Worth Donations</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">--}}
{{--                                                    <div class="funfact-block-one wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">--}}
{{--                                                        <div class="inner-box">--}}
{{--                                                            <div class="icon-box"><i class="icon-home"></i></div>--}}
{{--                                                            <div class="count-outer count-box">--}}
{{--                                                                <span class="count-text" data-speed="1500" data-stop="350">0</span><span>+</span>--}}
{{--                                                            </div>--}}
{{--                                                            <h4>NGOs Impacted</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </section>--}}
{{--                                    <!-- funfact-section end -->--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}

        </div>
    </div>

@endsection
@push('js')

@endpush
