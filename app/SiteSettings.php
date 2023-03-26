<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    //
    protected $table        =   'system_settings';
    protected $fillable     =   [
                                    "site_title",
                                    "my_obituaries_title",
                                    "stripe_key",
                                    "stripe_secret",
                                    "service_charges",
                                    "facebook_url",
                                    "twitter_url",
                                    "linkedin_url",
                                    "footer_rights",
                                    "home_page_menu_title",
                                    "home_page_title_short_title",
                                    "home_page_title_long_title",
                                    "home_page_title_short_description",
                                    "home_page_obituary_slider_title",
                                    "donate_page_menu_title",
                                    "donate_page_header_title",
                                    "donate_page_cover_image",
                                    "obituary_page_menu_title",
                                    "obituary_page_header_title",
                                    "obituary_page_obituary_title",
                                    "obituary_page_cover_image",
                                    "obituary_page_form_title",
                                    "signup_page_menu_title",
                                    "signup_page_cover_title",
                                    "signup_page_cover_image",
                                    "login_page_menu_title",
                                    "login_page_cover_title",
                                    "login_page_cover_image",
                                ];
    
}
