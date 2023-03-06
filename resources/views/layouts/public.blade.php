<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="no-js no-svg">
@php
    if(session()->has('cart_items') && array_sum(array_values(session()->get('cart_items'))) > 0){
        $cart           =   array_sum(array_values(session()->get('cart_items')));
        $shopping_cart = "<i class='fa fa-shopping-cart'></i> <sup class='badge bg-danger'><small>".$cart."$</small></sup>";
    }else{
        $shopping_cart = "<i class='fa fa-shopping-cart'></i>";
    }
@endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="{{file_exists(storage_path('app/public/site_settings/'.$site->fav_icon)) ?  url('storage/site_settings/'.$site->fav_icon): asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <title>{{$site->site_title ? $site->site_title:"Obitury Online."}}</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch'    href="{{asset('http://fonts.googleapis.com/')}}" />
    <link rel='stylesheet'      id='wp-block-library-css'       href="{{asset('css/style.min6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='font-awesome-css'           href="{{asset('css/font-awesome.min1849.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='flaticon-css'               href="{{asset('css/flaticon6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='owl-css'                    href="{{asset('css/owl6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='swiper-css'                 href="{{asset('css/swiper.min6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='bootstrap-css'              href="{{asset('css/bootstrap6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      type='text/css' media='all'     href="{{asset('css/bootstrap-datetimepicker.min.css')}}"  />
    <link rel='stylesheet'      id='color-css'                  href="{{asset('css/color6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='purehearts-main-style-css'  href="{{asset('css/style6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='purehearts-custom-css'      href="{{asset('css/custom6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      id='purehearts-responsive-css'  href="{{asset('css/responsive6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      href="{{asset('css/woocommerce6a4d.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      href="{{asset('css/mt_main.css')}}" type='text/css' media='all' />
    <link rel='stylesheet'      href="{{asset('css/mainfb9c.css')}}" type='text/css' media='all' />
    <link class="lfr-css-file"  href="{{asset('css/aui.css')}}" rel="stylesheet" type="text/css" />
    <link rel='stylesheet'      href="{{asset('css/dropify.min.css')}}" type="text/css" />
    <link rel='stylesheet'      href="{{asset('toast/toast.style.css')}}" type="text/css" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style id="charitable-highlight-colour-styles">.obituary-raised .amount,.obituary-figures .amount,.donors-count,.time-left,.charitable-form-field a:not(.button),.charitable-form-fields .charitable-fieldset a:not(.button),.charitable-notice,.charitable-notice .errors a { color:#f89d35; }.obituary-progress-bar .bar,.donate-button,.charitable-donation-form .donation-amount.selected,.charitable-donation-amount-form .donation-amount.selected { background-color:#f89d35; }.charitable-donation-form .donation-amount.selected,.charitable-donation-amount-form .donation-amount.selected,.charitable-notice,.charitable-drag-drop-images li:hover a.remove-image,.supports-drag-drop .charitable-drag-drop-dropzone.drag-over { border-color:#f89d35; }</style>
    <style>
        .case-block-two .inner-box .lower-content .info-box li {
            padding-left: 0px !important;
        }
        .mt-1{
            margin-top: 1px;
        }
        .mt-2{
             margin-top: 2px;
         }
        .mt-3{
            margin-top: 3px;
        }
        .mt-4{
            margin-top: 4px;
        }
        .mt-5{
            margin-top: 5px;
        }
        .mt-10{
            margin-top: 10px;
        }
        .mt-15{
            margin-top: 15px;
        }
        .mt-20{
            margin-top: 20px;
        }


        .mb-1{
            margin-bottom: 1px;
        }
        .mb-2{
            margin-bottom: 2px;
        }
        .mb-3{
            margin-bottom: 3px;
        }
        .mb-4{
            margin-bottom: 4px;
        }
        .mb-5{
            margin-bottom: 5px;
        }
        .mb-10{
            margin-bottom: 10px;
        }
        .mb-15{
            margin-bottom: 15px;
        }
        .mb-20{
            margin-bottom: 20px;
        }
        input {
            padding-left: 14px;
        }
        .dropdown-item {
            text-align: center !important;
        }
        .bg-danger small{
            color: #fff;
        }
    </style>
    @stack('css')
</head>

<body class="page-template">
    <div class="boxed_wrapper red-color">

        <!-- main header -->

        <header class="main-header header-style-two">
            <!-- logo-box -->
            <div class="logo-box">
                <div class="shape" style="background-image: url({{asset('images/shape-30.png')}});"></div>
                <figure class="logo"><a href="{{ url('/') }}" title="Arbituaryonline">
                        <img src="{{ asset('images/logo.png')}}" alt="logo" style="height: 86px;" />
                    </a>
                </figure>
            </div>
            <!-- header -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="logo-box responsive">
                            <div class="shape" style="background-image: url({{asset('images/shape-30.png')}});"></div>
                            <figure class="logo"><a href="{{ url('/') }}" title="Arbituaryonline">
                                    <img src="{{ asset('images/logo.png')}}" alt="logo" style="height: 86px;" />
                                </a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">

                                        <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">
                                            <a title="Home" href="{{ route('home') }}" class="hvr-underline-from-left1">{{$site->home_page_menu_title ? $site->home_page_menu_title:"Home"}}</a></li>

                                        <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">
                                            <a title="Donate Today" href="{{ route('donate') }}" class="hvr-underline-from-left1">{{$site->donate_page_menu_title ? $site->donate_page_menu_title:"Donate Today"}}</a></li>

    {{--                                    <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">--}}
    {{--                                        <a title="Be a Volunteer" href="{{ route('home') }}" class="hvr-underline-from-left1">Be a Volunteer</a></li>--}}

                                        <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">
                                            <a title="Post obituary" href="{{ route('obituary.create') }}" class="hvr-underline-from-left1">{{$site->obituary_page_menu_title ? $site->obituary_page_menu_title:"Post obituary"}}</a></li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="nav-right-content clearfix">
                            @if( @Auth()->user()->is_admin != 1)
                            <div class="cart-box">
                                <a href="{{route('cart')}}"  class="cart-items">{!! $shopping_cart !!}</a>
                            </div>
                            <div class="admin clearfix">
                                @guest
                                    <a href="{{ route('login') }}"><i class="admin-bar"></i>{{$site->login_page_menu_title ? $site->login_page_menu_title:'Log In'}}</a> |
                                    <a href="{{ route('register') }}"><i class="admin-bar"></i>{{$site->signup_page_menu_title ? $site->signup_page_menu_title:'Sign Up'}}</a>
                                @else
                                    {{ Auth::user()->name }} |
                                    <a href="{{ route('myobituaries') }}"> {{$site->my_obituaries_title ? $site->my_obituaries_title:"My Obituaries"}} </a> |
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        <i class="admin-bar"></i> {{ __('Logout') }}
                                    </a>
                                @endguest
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                            </nav>
                        </div>
                        <div class="nav-right-content clearfix">
                            @if( @Auth()->user()->is_admin != 1)
                            <div class="cart-box">
                                <a href="{{route('cart')}}"  class="cart-items">{!! $shopping_cart !!} </a>
                            </div>
                            <div class="admin clearfix">
                                @guest
                                    <a href="{{ route('login') }}"><i class="admin-bar"></i>{{$site->login_page_menu_title ? $site->login_page_menu_title:'Log In'}}</a> |
                                    <a href="{{ route('register') }}"><i class="admin-bar"></i>{{$site->signup_page_menu_title ? $site->signup_page_menu_title:'Sign Up'}}</a>
                                @else
                                    {{ Auth::user()->name }} |
                                    <a href="{{ route('myobituaries') }}">  {{$site->my_obituaries_title ? $site->my_obituaries_title:"My Obituaries"}}  </a> |
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        <i class="admin-bar"></i> {{ __('Logout') }}
                                    </a>
                                @endguest
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </header>

        <!-- main-header end -->
        <!-- Mobile Menu  -->

        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fa fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="#" title="Purehearts"><img src="{{asset('images/logo.png')}}" alt="logo"/></a></div>
                <div class="menu-outer"></div>
                <div class="social-links">
                    @if( @Auth()->user()->is_admin != 1)
                    <ul class="clearfix">
                        <li>
                            <a href="{{route('cart')}}"  class="cart-items">{!! $shopping_cart !!} </a>
                        </li>
                        @guest
                            <li><a href="{{ route('login') }}"><i class="admin-bar"></i>{{$site->login_page_menu_title ? $site->login_page_menu_title:'Log In'}}</a> </li>
                            <li><a href="{{ route('register') }}"><i class="admin-bar"></i>{{$site->signup_page_menu_title ? $site->signup_page_menu_title:'Sign Up'}}</a></li>
                        @else
                            <li> {{ Auth::user()->name }} </li>
                            <li><a href="{{ route('myobituaries') }}">  {{$site->my_obituaries_title ? $site->my_obituaries_title:"My Obituaries"}} </a> </li>
                            <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="admin-bar"></i> {{ __('Logout') }}
                                </a></li>
                        @endguest
                    </ul>
                    @endif
                </div>
            </nav>
        </div>

        <!-- End Mobile Menu -->

        @yield('content')

        <section class="elementor-section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element">
                            <div class="elementor-widget-container">

                                <!-- subscribe-section -->
                                <section class="subscribe-section ">
                                    <div class="bg-layer"></div>
                                    <div class="auto-container">
                                        <div class="inner-box clearfix">
                                            <div class="left-column pull-left">
                                                <div class="logo-box">
                                                    <div class="shape" style="background-image: url({{asset('images/shape-1.png')}});"></div>
                                                    <figure class="logo"><a href="{{ url('/') }}"><img decoding="async" src="{{ asset('images/logo.png')}}" alt="Awesome Image"></a></figure>
                                                </div>
                                                <div class="text">
                                                    <h3><i class="icon-email-open-sketched-envelope"></i>Subscribe <br> Our Newsletter</h3>
                                                </div>
                                            </div>
                                            <div class="right-column pull-right clearfix">
                                                <div class="form-inner">
                                                    <div class="subscribe-form">
                                                        <form id="subscription-form" class="mc4wp-form mc4wp-form-255" method="POST" action="{{route('subscribe')}}" >
                                                            @csrf
                                                            <div class="mc4wp-form-fields">
                                                                <div class="form-group">
                                                                    <input type="email" name="email" id="subscription-email" placeholder="Email address" required="">
                                                                    <button type="button" onclick="submitForm('subscription-form')">Get Our Email</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <ul class="social-style-one clearfix">
                                                    <li><a href="{{$site->facebook_url ? $site->facebook_url:"https://www.facebook.com/"}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                    <li><a href="{{$site->twitter_url ? $site->twitter_url:"https://www.twitter.com/"}}"><i class="fa-brands fa-twitter"></i></a></li>
                                                    <li><a href="{{$site->linkedin_url ? $site->linkedin_url:"https://www.linkedin.com/"}}"><i class="fa-brands fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- subscribe-section end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- main-footer -->

        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="copyright pull-left">
                        <p>© 2023 <a href="{{ route('home') }}">{{$site->site_title ? $site->site_title:"Obituary Online."}},</a> {{$site->footer_rights ? $site->footer_rights:"All Rights Reserved."}}</p>
                    </div>
                    <ul class="footer-card pull-right clearfix">
                        <li><span>Ways to Donate:</span></li>
                        <li><a href="#"><img src="{{ asset('images/card-1.png')}}" alt="Awesome Image"></a></li>
                        <li><a href="#"><img src="{{ asset('images/card-2.png')}}" alt="Awesome Image"></a></li>
{{--                        <li><a href="#"><img src="{{ asset('images/card-3.png')}}" alt="Awesome Image"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('images/card-4.png')}}" alt="Awesome Image"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('images/card-5.png')}}" alt="Awesome Image"></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>

        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fa fa-long-arrow-up"></i>
        </button>

    </div>




    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button style="top: 4%;left: 45%;position: relative;" type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center mt-10">
                            Yes, I want to donate
                        </div>
                        <div class="col-12 text-center mt-10">
                            <div class="dropdown">
                                <button class="btn" style="color: #6BC1CC" type="button" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select  <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <span class="dropdown-nchor-list">
                                        <a class="dropdown-item " href="javasscript:;">10</a>
                                        <a class="dropdown-item " href="javasscript:;">20</a>
                                        <a class="dropdown-item " href="javasscript:;">30</a>
                                        <a class="dropdown-item " href="javasscript:;">40</a>
                                    </span>
                                    <hr style="margin: 1px !important;">
                                    <div class="row" style="width: 185px;text-align: center;padding: 8px;">
                                        <div class="col-12"><small>Enter your own amount</small></div>
                                        <div class="col-12"><input type="number" id="dropdown_custom_amount" style="height: 35px"></div>
                                        <div class="col-12"><button class="btn btn-sm button text-center dropdown_custom_btn " style="line-height: 1px">select</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <h2 class="donate-now-title"></h2>
                        </div>
                        <div class="col-12 text-center">
                            <hr style="margin: 0px">
                        </div>
                        <div class="col-12 text-center">
                            You've met the minimum tax deduction amount set by the organisation.
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-12 text-center mt-10">
                            <a href="javascript:;" data-cart-btn="cart" class="btn-ghost clearfix  impact-message button donate-popup-button " id="user-input-holder"> Add To Cart <i class="fa fa-shopping-cart"></i> </a>
                        </div>
                        <div class="col-12 text-center mt-10">
                            <a href="javascript:;" data-cart-btn="donate" class="btn-ghost clearfix  impact-message button donate-popup-button" id="user-input-holder"> DONATE TODAY </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/loadingoverlay.min.js')}}"></script>
    <script src="{{ asset('js/popper.min431f.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/moment-duration-format.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min431f.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/owl431f.js') }}"></script>
    <script src="{{ asset('js/swiper.min48f5.js') }}"></script>
    <script src="{{ asset('js/wow431f.js') }}"></script>
    <script src="{{ asset('js/appear431f.js') }}"></script>
    <script src="{{ asset('js/scrollbar431f.js') }}"></script>
    <script src="{{ asset('js/script6a4d.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    {{--<script src="{{ asset('js/jquery.mask.js')}}"></script>--}}
    <script src="{{ asset('toast/toast.script.js')}}"></script>


    <script>
        $.LoadingOverlay("show");
        $(document).on('click','.donate-popup-button',function () {
             let btn_type   =  $(this).attr('data-cart-btn');
             let uid        =  $(this).attr('uid');
             //alert(uid);
             let amount     =  parseInt($('#dropdownMenuButton').attr('amount'));
             if(amount > 0){
                 $.ajax({
                     type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                     url         : `/add-to-cart/${uid}/amount/${amount}`, // the url where we want to POST
                     data        : {},
                     processData : false,
                     contentType : false,
                     cache       : false,
                     headers     : {
                         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                     },
                     success: function (response) {
                         if(response.status == 'success'){
                             if(response.amount > 0){
                                 $('.cart-items').html(`<i class="fa-brands fa-shopping-cart"></i> <sup class="badge bg-danger"><small>${response.amount}$</small></sup>`)
                             }else{
                                 $('.cart-items').html(`<i class="fa-brands fa-shopping-cart"></i></span>`)
                             }
                             if(btn_type == 'donate'){
                                 window.location = '/cart/donation';
                             }else{
                                 $('.modal').modal('hide')
                                 toaster('Success','Item added to cart.','success');
                             }

                         }else{
                             toaster('Error',response.msg,'error');
                         }
                     },
                     error: function (data) {
                         toaster('Error',data.responseJSON.message,'error');
                     }
                 })
             }else{
                 toaster('Error','Please select amount.','error');
             }

        })
        $(document).on('click','.dropdown-menu .dropdown-item',function(){
            let selText = $(this).text();
            $('#dropdownMenuButton').attr('amount',selText)
            $(this).parents('.dropdown').find('#dropdownMenuButton').html(`<span style="margin-right: 20px;font-size: 20px">${selText} </span>  dollars <i class="fa fa-caret-down"></i>`);
        });
        $(document).on('click','.dropdown_custom_btn',function(){
            let selText = $('#dropdown_custom_amount').val();
            $('.dropdown-nchor-list').append(`<a class="dropdown-item " href="javasscript:;">${selText}</a>`);
            $('#dropdownMenuButton').html(`<span style="margin-right: 20px;font-size: 20px">${selText} </span>  dollars <i class="fa fa-caret-down"></i>`);
            $('#dropdownMenuButton').attr('amount',selText)
            $('#dropdown_custom_amount').val('');
        });
        $(document).on('click','.triggerDonateNow',function(){
            $('.donate-now-title').text($(this).attr('title'));
            $('#dropdownMenuButton').html(` Select  <i class="fa fa-caret-down"></i>`);
            $('.donate-popup-button').attr('uid',$(this).attr('uid'));
            $('#myModal').modal({backdrop: 'static', keyboard: false}, 'show');
        });
        function toaster(title="test",message="this is a test message.",type="success"){
            $.Toast(title, message,type, {
                has_icon:true,
                has_close_btn:true,
                stack: true,
                fullscreen:false,
                timeout:8000,
                sticky:true,
                has_progress:true,
                //position_class:'toast-top-center',
                border_radius: 6,
                //width:100,
                rtl:false,
            });
        }
        function submitForm(form_id,action_url=null){
            var form = $(`#${form_id}`)[0];
            var data = new FormData(form);
            $.ajax({
                type        : $(`#${form_id}`).attr('method'), // define the type of HTTP verb we want to use (POST for our form)
                url         : action_url == null ? $(`#${form_id}`).attr('action'):action_url, // the url where we want to POST
                enctype     : 'multipart/form-data',
                data        : data,
                processData : false,
                contentType : false,
                cache       : false,
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data.status == 'success'){
                        if(form_id == 'subscription-form'){
                            $('#subscription-email').val('');
                        }
                        toaster('Success',data.msg,'success');
                    }
                    else if(data.status == 'redirect'){
                        toaster('Success',data.msg,'success');
                        window.location = data.url;
                    }else{
                        toaster('Info',data.msg,'info');
                    }

                },
                error: function (data) {

                    if(typeof data.responseJSON.errors !== 'undefined'){
                        const keys = Object.keys(data.responseJSON.errors);
                        keys.forEach(x=>{
                            toaster('Error',data.responseJSON.errors[x][0],'error');
                        });
                    }else{
                        toaster('Error',data.responseJSON.message,'error');
                    }
                }
            })
        }
        var cart_items = [];
        function LoadcartItems(response) {
            $('.ttl_amount').text(response.data.ttl_amount+'$');
            if(response.data.ttl_amount > 0){
                $('.cart-items').html(`<i class="fa fa-shopping-cart"></i> <sup class="badge bg-danger"><small>${response.data.ttl_amount}$</small></sup>`)
            }else{
                $('.cart-items').html(`<i class="fa fa-shopping-cart"></i></span>`)
            }
            $('.cart-body').empty();
            if(response.data.donations.length){
                cart_items = response.data.cart;
                response.data.donations.forEach(donation=>{
                    $('.cart-body').append(`<tr class="cartItemListing">
                                                                <td  class="cartItemSelection">
                                                                    <div class="truncate">${donation.deceased_first_name} ${donation.deceased_last_name}</div>
                                                                </td>
                                                                <td style="text-align: center"  class="success ">
                                                                    Donation is eligible for tax deduction
                                                                </td>
                                                                <td  style="text-align: center" class="editableAmount" id="editableAmount-${donation.uid}">${cart_items[donation.uid]} $</td>
                                                                <td class=" edit-holder" style="min-width: 100px;">
                                                                    <a uid="${donation.uid}" amount="${cart_items[donation.uid]}" action="edit" id="edit-id-${donation.uid}" href="javascript:;"  class="cartItemEdit"> <i class="edit-table fa fa-pencil"></i> </a>&nbsp;
                                                                    <a uid="${donation.uid}" amount="${cart_items[donation.uid]}" id="delete-id-${donation.uid}" href="javascript:;" class="cartItemRemove"> <i class="edit-table fa fa-trash"></i> </a>&nbsp;

                                                                </td>
                                                            </tr>`)
                });
            }
        }
        function loadCart(){
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : `/get-cart`, // the url where we want to POST
                data        : {},
                processData : false,
                contentType : false,
                cache       : false,
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'success'){
                        LoadcartItems(response);
                        //toaster('Success','Item added to cart.','success');
                    }
                    else{
                        toaster('Error',response.msg,'error');
                    }
                },
                error: function (data) {
                    toaster('Error',data.responseJSON.message,'error');
                }
            })
        }

        $(document).ready(function () {
            $('.nbrOnly').keypress(function (e) {
                var charCode = (e.which) ? e.which : event.keyCode
                if (String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;
            });
            $('.txtOnly').keydown(function (e) {
                // if (e.shiftKey || e.ctrlKey || e.altKey) {
                //     e.preventDefault();
                // } else
                    {
                    var key = e.keyCode;
                    if (!((key == 8) || (key == 32) || (key >= 16 && key <= 18)|| (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                        e.preventDefault();
                    }
                }
            });
            $.LoadingOverlay("hide");
        });
    </script>
    @stack('js')
</body>
</html>