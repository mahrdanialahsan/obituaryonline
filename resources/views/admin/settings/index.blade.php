@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Subscriptions</h1>
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
                            <input value="{{$site->site_title}}" class="form-control" id="site_title" name="site_title" type="text" placeholder="Obituary Online" required />
                            <label for="site_title">Site Title</label>
                        </div>
                    </div>
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input  value="{{$site->my_campaigns_title}}"  class="form-control" id="my_campaigns_title" name="my_campaigns_title" type="text" placeholder="My Campaigns Title" required />
                            <label for="my_campaigns_title">My Campaigns Title on Top Bar left Side</label>
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
                    <h3> Footer</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->facebook_url}}"  class="form-control" id="facebook_url" name="facebook_url" type="url" placeholder="Facebook URL" required />
                            <label for="facebook_url"> Facebook URL.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->twitter_url}}"  class="form-control" id="twitter_url" name="twitter_url" type="url" placeholder="Twitter  URL." required />
                            <label for="twitter_url"> Twitter URL.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->linkedin_url}}"  class="form-control" id="linkedin_url" name="linkedin_url" type="url" placeholder="LinkedIn  URL." required />
                            <label for="linkedin_url"> linkedin URL.</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating  mb-3">
                            <input  value="{{$site->footer_rights}}"  class="form-control" id="footer_rights" name="footer_rights" type="text" placeholder="All Rights Reserved." required />
                            <label for="footer_rights"> All Rights Reserved.</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3>Home Page</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_menu_title}}"  class="form-control" id="home_page_menu_title" name="home_page_menu_title" type="text" placeholder="Home" required />
                            <label for="home_page_menu_title">Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_title_short_title}}"  class="form-control" id="home_page_title_short_title" name="home_page_title_short_title" type="text" placeholder="Our Global Causes" required />
                            <label for="home_page_title_short_title">Short Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_title_long_title}}"  class="form-control" id="home_page_title_long_title" name="home_page_title_long_title" type="text" placeholder="Spread Joy with a Donation" required />
                            <label for="home_page_title_long_title">Long Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->home_page_campaign_slider_title}}"  class="form-control" id="home_page_campaign_slider_title" name="home_page_campaign_slider_title" type="text" placeholder="Our Causes" required />
                            <label for="home_page_campaign_slider_title">Campaign Slider Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" id="home_page_title_short_description" name="home_page_title_short_description" type="text" required placeholder="Ever undertakes laborious physical exercise except obtain some advantage from it but who has any right to find." > {{$site->site_title}} </textarea>
                            <label for="home_page_title_short_description">Title Short Description</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3> Signup Page</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->signup_page_menu_title}}"  class="form-control" id="signup_page_menu_title" name="signup_page_menu_title" type="text" placeholder="Login" required />
                            <label for="signup_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->signup_page_cover_title}}"  class="form-control" id="signup_page_cover_title" name="signup_page_cover_title" type="text" placeholder="Log in" required />
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
                            <input  value="{{$site->login_page_menu_title}}"  class="form-control" id="login_page_menu_title" name="login_page_menu_title" type="text" placeholder="Login" required />
                            <label for="login_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->login_page_cover_title}}"  class="form-control" id="login_page_cover_title" name="login_page_cover_title" type="text" placeholder="Log in" required />
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
                            <input  value="{{$site->donate_page_menu_title}}"  class="form-control" id="donate_page_menu_title" name="donate_page_menu_title" type="text" placeholder="Donate Today" required />
                            <label for="donate_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->donate_page_header_title}}"  class="form-control" id="donate_page_header_title" name="donate_page_header_title" type="text" placeholder="Donate Today" required />
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
                    <h3> Fundraise Now</h3>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->fundraise_page_menu_title}}"  class="form-control"  id="fundraise_page_menu_title" name="fundraise_page_menu_title"  type="text" placeholder="Fundraise Now" required />
                            <label for="fundraise_page_menu_title"> Menu Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->fundraise_page_header_title}}"  class="form-control"  id="fundraise_page_header_title" name="fundraise_page_header_title" type="text" placeholder="Fundraising Campaign" required />
                            <label for="fundraise_page_header_title"> Header Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="fundraise_page_cover_image"> Header Cover Image</label>
                            <input  value="{{$site->fundraise_page_cover_image}}"  class="form-control dropify" data-default-file="{{file_exists(storage_path('app/public/site_settings/'.$site->fundraise_page_cover_image)) ?  url('storage/site_settings/'.$site->fundraise_page_cover_image): asset('images/12.jpg')}}"  id="fundraise_page_cover_image" name="fundraise_page_cover_image" type="file"  />

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->fundraise_page_campaign_title}}"  class="form-control"  id="fundraise_page_campaign_title" name="fundraise_page_campaign_title" type="text" placeholder="Start a fundraising campaign" required />
                            <label for="fundraise_page_campaign_title"> Campaign Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input  value="{{$site->fundraise_page_form_title}}"  class="form-control"  id="fundraise_page_form_title" name="fundraise_page_form_title" type="text" placeholder="Deceased Information" required />
                            <label for="fundraise_page_form_title"> Campaign Form Title</label>
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