@extends('layouts.public')

@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->login_page_cover_image)) ?  url('storage/site_settings/'.$site->login_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->login_page_cover_title ? $site->login_page_cover_title:'Login In'}}</h1>
                </div>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">My account</li>                --}}
{{--                </ul>--}}
            </div>
        </div>
    </section>
    <!-- End Page Title -->




    <!-- sidebar-page-container -->
    <section class="sign-up-overview-card-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="sign-up-overview-card-container" align="center">


                        <div class="rounded-card--header-solid" id="yui_patched_v3_11_0_1_1676319507111_278">
                            <div class="rounded-card--header-solid__header">
                                <div class="body-txt text-center">Fill in your personal information.</div>
                                <div class="body-txt text-center">We will ask about your organisation or group details in the following pages.</div>
                            </div>
                            <div class="rounded-card--header-solid__body" id="yui_patched_v3_11_0_1_1676319507111_277">

                                <button id="clickFBLogin" class="button button--full button--large button--facebook button--with-icon" style="background-color: #3B5998"> <div class="button--with-icon__wrapper">
                                        <i class="ico ico-facebook-box button--with-icon__icon"></i>LOG IN WITH FACEBOOK </div> </button>

                                <div class="body-txt body-txt--smaller body-txt--no-letter-space pt-8 text-center">Don't worry, we will never share on your page without your permission</div>

                                <hr class="hr-text" data-content="Or sign in with email">

                                <form class="form create-user-form " id="login-frm" name="login-frm"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset class="fieldset " id="yui_patched_v3_11_0_1_1676319507111_276">

                                        <div class="row-fluid" id="yui_patched_v3_11_0_1_1676319507111_275">

                                            <div class="control-group  input-ctrl" id="emailHeaderError" style="margin-top: 10px">
                                                <label class="lbl" for="email">Email</label>
                                                <input id="email" name="email" type="email" class="input" placeholder="e.g. john@giving.sg">
                                                <span class="help-block "></span>
                                            </div>


                                            <div style="margin-top: 10px" class="input-ctrl" id="yui_patched_v3_11_0_1_1676319507111_274">
                                                <label class="lbl lbl--inline-block" for="password">Password</label>
                                                <div class="relative" id="yui_patched_v3_11_0_1_1676319507111_273">
                                                    <input name="password" id="password" type="password" class="input" placeholder="Your password" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <input name="" id="birthdayMonth" type="hidden" class="input" value="0"> <input name="" id="birthdayDay" type="hidden" class="input" value="1"> <input name="_58_birthdayYear" id="birthdayYear" type="hidden" class="input" value="1900">
                                        <div class="body-txt body-txt--smaller body-txt--no-letter-space pt-8 text-center">
                                            <div style="width: 100%;" class="pt-24"> <div class="control-group">
                                                    <div class="controls">
                                                        <button onclick="submitForm('login-frm')"  type="button" class="button button--large button--full" cssclass="btn btn-success btn-large">
                                                            LOG IN</button> </div> </div>
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
