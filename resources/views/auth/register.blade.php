@extends('layouts.public')

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->signup_page_cover_image)) ?  url('storage/site_settings/'.$site->signup_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->signup_page_cover_title ? $site->signup_page_cover_title:'Sign up as new organisation or group'}}</h1>
                </div>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">My account</li>                --}}
{{--                </ul>--}}
            </div>
        </div>
    </section>
    <!-- End Page Title --
    <! -- sidebar-page-container -->
    <section class="sign-up-overview-card-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="sign-up-overview-card-container" align="center">


                        <div class="rounded-card--header-solid" id="">
                            <div class="rounded-card--header-solid__header">
                                <div class="body-txt text-center">Fill in your personal information.</div>
                                <div class="body-txt text-center">We will ask about your organisation or group details in the following pages.</div>
                            </div>
                            <div class="rounded-card--header-solid__body" id="">

                                <a href="{{ route('facebook-login') }}" id="clickFBLogin" class="button button--full button--large button--facebook button--with-icon" style="background-color: #3B5998">
                                    <div class="button--with-icon__wrapper">
                                        <i class="ico ico-facebook-box button--with-icon__icon"></i>LOG IN WITH FACEBOOK </div>
                                </a>

                                <div class="body-txt body-txt--smaller body-txt--no-letter-space pt-8 text-center">Don't worry, we will never share on your page without your permission</div>

                                <hr class="hr-text" data-content="Or sign up with email">

                                <form class="form create-user-form " id="register-frm" name="register-frm"  method="POST" action="{{ route('register') }}">
                                     @csrf
                                     <fieldset class="fieldset " id="">
                                        <div class="row-fluid" id="">
                                            <input name="_58_cmd" type="hidden" value="add">
                                            <div class="control-group input-ctrl" id="">
                                                <label class="lbl" for="name">Name</label>
                                                <input id="name" name="name" type="text" class="input" placeholder="e.g. John Tan">
                                            </div>

                                            <div class="control-group  input-ctrl" id="emailHeaderError" style="margin-top: 10px">
                                                <label class="lbl" for="email">Email</label>
                                                <input id="email" name="email" type="email" class="input" placeholder="e.g. john@giving.sg">
                                                <span class="help-block "></span>
                                            </div>
                                            <div style="margin-top: 10px" class="input-ctrl" id="">
                                                <label class="lbl lbl--inline-block" for="password">Password</label>
                                                <div class="relative" id="">
                                                    <input name="password" id="password" type="password" class="input" placeholder="Your password" autocomplete="off">
                                                </div>
                                            </div>
                                            <div style="margin-top: 10px" class="input-ctrl" id="">
                                                <label class="lbl lbl--inline-block" for="phone">Phone</label>
                                                <div class="relative" id="">
                                                    <input name="phone" id="phone" type="text" class="input" placeholder="e.g. 12345678901" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body-txt body-txt--smaller body-txt--no-letter-space pt-8 text-center">


                                            <div style="width: 100%;" class="pt-32">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button onclick="submitForm('register-frm')"  type="button" class="button button--large button--full" cssclass="btn btn-success btn-large">
                                                            SIGN UP</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="body-txt body-txt--smaller body-txt--no-letter-space pt-8 text-center"> By signing up, you agree to our
                                                <a href="#" target="_blank" class="text-link text-link--underline">Terms and Conditions</a> and
                                                <a href="#" target="_blank" class="text-link text-link--underline">Privacy Policy</a>.
                                            </div>
                                            <div class="error-msg pt-8" id="loginFacebookField" style="display: none;">Your Facebook account does not allow access to Giving.sg</div>
                                            <div class="body-txt pt-16 text-center"> Already have an account?
                                                <a href="{{ route('login') }}" onclick="" class="text-link">Login here</a>
                                            </div>
                                        </div></fieldset>

                                </form>
                            </div>
                        </div>


                        <div class="clearfix"></div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
