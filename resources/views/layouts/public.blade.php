<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="no-js no-svg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/style.min6a4d.css')}}">
{{--    <link rel="stylesheet" type="text/css"  href="{{ asset('css/font-awesome.min1849.css')}}">--}}

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/flaticon6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/owl6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/swiper.min6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/bootstrap6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/color6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/style6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/custom6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/responsive6a4d.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/mt_main.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('toast/toast.style.min.css')}}">
    <style id="charitable-highlight-colour-styles">
        @font-face {
            font-family: 'FontAwesome';
            src: url('../font/fontawesome-webfont.eot');
        }
        .campaign-raised .amount,
        .campaign-figures .amount,
        .donors-count,
        .time-left,
        .charitable-form-field a:not(.button),
        .charitable-form-fields .charitable-fieldset a:not(.button),
        .charitable-notice,
        .charitable-notice .errors a { color:#f89d35; }
        .campaign-progress-bar .bar,
        .donate-button,
        .charitable-donation-form .donation-amount.selected,
        .charitable-donation-amount-form .donation-amount.selected { background-color:#f89d35; }
        .charitable-donation-form .donation-amount.selected,
        .charitable-donation-amount-form .donation-amount.selected,
        .charitable-notice,
        .charitable-drag-drop-images li:hover a.remove-image,
        .supports-drag-drop .charitable-drag-drop-dropzone.drag-over { border-color:#f89d35; }
        .case-block-two .inner-box .lower-content .info-box li {
            padding-left: 1px;
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
            <div class="shape" style="background-image: url(images/shape-30.png);"></div>
            <figure class="logo"><a href="{{ url('/') }}" title="Arbituaryonline">
                    <img src="images/logo.png" alt="logo" style="height: 86px;" /></a></figure>
        </div>
        <!-- header -->
        <div class="header-lower">
            <div class="outer-container">
                <div class="outer-box">
                    <div class="logo-box responsive">
                        <div class="shape" style="background-image: url(images/shape-30.png);"></div>
                        <figure class="logo"><a href="{{ url('/') }}" title="Arbituaryonline">
                                <img src="images/logo.png" alt="logo" style="height: 86px;" /></a></figure>
                    </div>

                    <div class="text">
                        <a href="{{ url('/') }}">
                            <figure class="icon-box"><img src="images/heart-4.png" alt="Awesome Image"></figure>
                            <span>Become a Volunteer</span>
                        </a>
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
                                        <a title="Home" href="{{ route('home') }}" class="hvr-underline-from-left1">Home</a></li>

                                    <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">
                                        <a title="Donate Today" href="{{ route('home') }}" class="hvr-underline-from-left1">Donate Today</a></li>

                                    <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">
                                        <a title="Be a Volunteer" href="{{ route('home') }}" class="hvr-underline-from-left1">Be a Volunteer</a></li>

                                    <li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837">
                                        <a title="Fundraise Now" href="{{ route('campaign.create') }}" class="hvr-underline-from-left1">Fundraise Now</a></li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="nav-right-content clearfix">
{{--                        <div class="search-box-outer">--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>--}}
{{--                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">--}}
{{--                                    <div class="form-container">--}}
{{--                                        <form  method="get" action="{{ url('/') }}">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="search" name="s" value="" placeholder="Search...." required="">--}}
{{--                                                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="cart-box">--}}
{{--                            <a href="{{ url('/') }}"><i class="icon-shopping-bag"></i></a>--}}
{{--                        </div>--}}

                        <div class="admin clearfix">
                        @guest
                            <a href="{{ route('login') }}"><i class="admin-bar"></i>Log In</a> |
                            <a href="{{ route('register') }}"><i class="admin-bar"></i>Sign Up</a>
                        @else
                                {{ Auth::user()->name }} |
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="admin-bar"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        @endguest
                        </div>

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
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <div class="nav-right-content clearfix">
{{--                        <div class="search-box-outer">--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>--}}
{{--                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">--}}
{{--                                    <div class="form-container">--}}
{{--                                        <form  method="get" action="{{ url('/') }}">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="search" name="s" value="" placeholder="Search...." required="">--}}
{{--                                                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="cart-box">--}}
{{--                            <a href="{{ url('/') }}"><i class="icon-shopping-bag"></i></a>--}}
{{--                        </div>--}}
                        <div class="admin clearfix">
                            @guest
                                <a href="{{ route('login') }}"><i class="admin-bar"></i>Log In</a> |
                                <a href="{{ route('register') }}"><i class="admin-bar"></i>Sign Up</a>
                            @else
                                {{ Auth::user()->name }} |
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="admin-bar"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fa fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{ url('/') }}" title="Arbituaryonline"><img src="images/logo.png" alt="logo"/></a></div>
            <div class="menu-outer"></div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="https://www.facebook.com/" style="background-color:rgba(0, 0, 0, 0); color: rgb(255, 255, 255)" target="_blank"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="https://www.linkedin.com/" style="background-color:rgba(0, 0, 0, 0); color: rgb(255, 255, 255)" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                    <li><a href="https://www.twitter.com/" style="background-color:rgba(0, 0, 0, 0); color: rgb(255, 255, 255)" target="_blank"><span class="fa fa-twitter"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

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
                                                <div class="shape" style="background-image: url(images/shape-1.png);"></div>
                                                <figure class="logo"><a href="{{ url('/') }}"><img decoding="async" src="images/logo.png" alt="Awesome Image"></a></figure>
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
                                                <li><a href="https://www.facebook.com/"><i class="fa fa fa-facebook-f"></i></a></li>
                                                <li><a href="https://www.twitter.com/"><i class="fa fa fa-twitter"></i></a></li>
                                                <li><a href="https://www.linkedin.com/"><i class="fa fa fa-linkedin"></i></a></li>
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
                    <p>© 2023 <a href="{{ url('/') }}">Arbituary Online,</a> All Rights Reserved.</p>
                </div>
                <ul class="footer-card pull-right clearfix">
                    <li><span>Ways to Donate:</span></li>
                    <li><a href="#"><img src="images/card-1.png" alt="Awesome Image"></a></li>
                    <li><a href="#"><img src="images/card-2.png" alt="Awesome Image"></a></li>
                    <li><a href="#"><img src="images/card-3.png" alt="Awesome Image"></a></li>
                    <li><a href="#"><img src="images/card-4.png" alt="Awesome Image"></a></li>
                    <li><a href="#"><img src="images/card-5.png" alt="Awesome Image"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- main-footer end -->

    <!-- scroll to top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fa fa-long-arrow-up"></i>
    </button>

</div>




<script type='text/javascript' src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min431f.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/popper.min431f.js') }}"></script>
<script src="{{ asset('js/owl431f.js') }}"></script>
<script src="{{ asset('js/swiper.min48f5.js') }}"></script>
<script src="{{ asset('js/wow431f.js') }}"></script>
<script src="{{ asset('js/appear431f.js') }}"></script>
<script src="{{ asset('js/scrollbar431f.js') }}"></script>
<script src="{{ asset('js/script6a4d.js') }}"></script>
<script src="{{ asset('js/dropify.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js')}}"></script>
<script src="{{ asset('toast/toast.script.js')}}"></script>

@stack('js')
<script>
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
    function submitForm(form_id){
        var form = $(`#${form_id}`)[0];
        var data = new FormData(form);
        $.ajax({
            type        : $(`#${form_id}`).attr('method'), // define the type of HTTP verb we want to use (POST for our form)
            url         : $(`#${form_id}`).attr('action'), // the url where we want to POST
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
</script>

<!-- js -->
</body>
</html>
