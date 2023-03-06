@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Site Settings</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Site Settings</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form id="site-form" method="post" action="{{route('admin.settings.save.site')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <h3>Site Setting</h3>
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{$site->site_title}}" class="form-control" id="site_title" name="site_title" type="text" placeholder="Obituary Online" required11 />
                            <label for="site_title">Site Title</label>
                        </div>
                    </div>
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input  value="{{$site->my_obituaries_title}}"  class="form-control" id="my_obituaries_title" name="my_obituaries_title" type="text" placeholder="My Obituaries Title" required11 />
                            <label for="my_obituaries_title">My Obituaries Title on Top Bar left Side</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-floating1">
                            <label for="site_logo"> Site Logo</label>
                            <input  value="{{$site->site_logo}}"  class="form-control dropify" data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->site_logo)) ?  url('storage/site_settings/'.$site->site_logo): asset('images/logo.png')}}"  id="site_logo" name="site_logo" type="file"  />

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating1">
                            <label for="fav_icon"> Fav Icon</label>
                            <input  value="{{$site->fav_icon}}"  class="form-control dropify" data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->fav_icon)) ?  url('storage/site_settings/'.$site->fav_icon): asset('images/favicon.ico')}}"  id="fav_icon" name="fav_icon" type="file"  />

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Stripe Keys</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->stripe_key}}"  class="form-control" id="stripe_key" name="stripe_key" type="text" placeholder="pk_test_AGasvfU4csIh1Cbhk2TFfLEJ00uLFx1vrg" required11 />
                            <label for="stripe_key"> STRIPE_KEY.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->stripe_secret}}"  class="form-control" id="twitter_url" name="twitter_url" type="text" placeholder="sk_test_VgQx6sXcjkb19a2xCjI3Bz2J00Jy8xVuGN" required11 />
                            <label for="twitter_url"> STRIPE_SECRET.</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Footer</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->facebook_url}}"  class="form-control" id="facebook_url" name="facebook_url" type="url" placeholder="Facebook URL" required11 />
                            <label for="facebook_url"> Facebook URL.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->twitter_url}}"  class="form-control" id="twitter_url" name="twitter_url" type="url" placeholder="Twitter  URL." required11 />
                            <label for="twitter_url"> Twitter URL.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->linkedin_url}}"  class="form-control" id="linkedin_url" name="linkedin_url" type="url" placeholder="LinkedIn  URL." required11 />
                            <label for="linkedin_url"> linkedin URL.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->footer_rights}}"  class="form-control" id="footer_rights" name="footer_rights" type="text" placeholder="All Rights Reserved." required11 />
                            <label for="footer_rights"> All Rights Reserved.</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3>Home Page</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_menu_title}}"  class="form-control" id="home_page_menu_title" name="home_page_menu_title" type="text" placeholder="Home" required11 />
                            <label for="home_page_menu_title">Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_title_short_title}}"  class="form-control" id="home_page_title_short_title" name="home_page_title_short_title" type="text" placeholder="Today’s obituary" required11 />
                            <label for="home_page_title_short_title">Short Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_title_long_title}}"  class="form-control" id="home_page_title_long_title" name="home_page_title_long_title" type="text" placeholder="Spread Joy with a Donation" required11 />
                            <label for="home_page_title_long_title">Long Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_obituary_slider_title}}"  class="form-control" id="home_page_obituary_slider_title" name="home_page_obituary_slider_title" type="text" placeholder="Our Causes" required11 />
                            <label for="home_page_obituary_slider_title">Obituary Slider Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" id="home_page_title_short_description" name="home_page_title_short_description" type="text" required11 placeholder="Ever undertakes laborious physical exercise except obtain some advantage from it but who has any right to find." > {{$site->home_page_title_short_description}} </textarea>
                            <label for="home_page_title_short_description">Title Short Description</label>
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->pure_heart_title}}"  class="form-control" id="pure_heart_title" name="pure_heart_title" type="text" placeholder="Our Causes" required11 />
                            <label for="pure_heart_title">Pure Heart Title</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->pure_large_title}}"  class="form-control" id="pure_large_title" name="pure_large_title" type="text" placeholder="Our Causes" required11 />
                            <label for="pure_large_title">Pure Heart Large Title</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->pure_small_description}}"  class="form-control" id="pure_small_description" name="pure_small_description" type="text" placeholder="Our Causes" required11 />
                            <label for="pure_small_description">Pure Heart small Description</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Signup Page</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->signup_page_menu_title}}"  class="form-control" id="signup_page_menu_title" name="signup_page_menu_title" type="text" placeholder="Login" required11 />
                            <label for="signup_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->signup_page_cover_title}}"  class="form-control" id="signup_page_cover_title" name="signup_page_cover_title" type="text" placeholder="Log in" required11 />
                            <label for="signup_page_cover_title"> Cover Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="signup_page_cover_image"> Cover Image</label>
                            <input  value="{{$site->signup_page_cover_image}}"  class="form-control dropify"   id="signup_page_cover_image" name="signup_page_cover_image"  type="file"  data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->signup_page_cover_image)) ?  url('storage/site_settings/'.$site->signup_page_cover_image): asset('images/12.jpg')}}"  />

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Login Page</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->login_page_menu_title}}"  class="form-control" id="login_page_menu_title" name="login_page_menu_title" type="text" placeholder="Login" required11 />
                            <label for="login_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->login_page_cover_title}}"  class="form-control" id="login_page_cover_title" name="login_page_cover_title" type="text" placeholder="Log in" required11 />
                            <label for="login_page_cover_title"> Cover Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="login_page_cover_image"> Cover Image</label>
                            <input  value="{{$site->login_page_cover_image}}"  class="form-control dropify"   id="login_page_cover_image" name="login_page_cover_image"  type="file"  data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->login_page_cover_image)) ?  url('storage/site_settings/'.$site->login_page_cover_image): asset('images/12.jpg')}}"  />

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Donate Today</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->donate_page_menu_title}}"  class="form-control" id="donate_page_menu_title" name="donate_page_menu_title" type="text" placeholder="Donate Today" required11 />
                            <label for="donate_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->donate_page_header_title}}"  class="form-control" id="donate_page_header_title" name="donate_page_header_title" type="text" placeholder="Donate Today" required11 />
                            <label for="donate_page_header_title"> Header Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="donate_page_cover_image"> Header Cover Image</label>
                            <input  value="{{$site->donate_page_cover_image}}"  class="form-control dropify"   id="donate_page_cover_image" name="donate_page_cover_image"  type="file"  data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->donate_page_cover_image)) ?  url('storage/site_settings/'.$site->donate_page_cover_image): asset('images/12.jpg')}}"  />

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Post obituary</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->obituary_page_menu_title}}"  class="form-control"  id="obituary_page_menu_title" name="obituary_page_menu_title"  type="text" placeholder="Post obituary" required11 />
                            <label for="obituary_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->obituary_page_header_title}}"  class="form-control"  id="obituary_page_header_title" name="obituary_page_header_title" type="text" placeholder="Fundraising Obituary" required11 />
                            <label for="obituary_page_header_title"> Header Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="obituary_page_cover_image"> Header Cover Image</label>
                            <input  value="{{$site->obituary_page_cover_image}}"  class="form-control dropify" data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->obituary_page_cover_image)) ?  url('storage/site_settings/'.$site->obituary_page_cover_image): asset('images/12.jpg')}}"  id="obituary_page_cover_image" name="obituary_page_cover_image" type="file"  />

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->obituary_page_obituary_title}}"  class="form-control"  id="obituary_page_obituary_title" name="obituary_page_obituary_title" type="text" placeholder="Start a fundraising obituary" required11 />
                            <label for="obituary_page_obituary_title"> Obituary Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->obituary_page_form_title}}"  class="form-control"  id="obituary_page_form_title" name="obituary_page_form_title" type="text" placeholder="Deceased Information" required11 />
                            <label for="obituary_page_form_title"> Obituary Form Title</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0"> 
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Update Site Settings</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endpush