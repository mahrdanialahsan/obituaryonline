<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('my_campaigns_title')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('footer_rights')->nullable();
            $table->string('home_page_menu_title')->nullable();
            $table->string('home_page_title_short_title')->nullable();
            $table->string('home_page_title_long_title')->nullable();
            $table->string('home_page_campaign_slider_title')->nullable();
            $table->string('home_page_title_short_description')->nullable();
            $table->string('donate_page_menu_title')->nullable();
            $table->string('donate_page_header_title')->nullable();
            $table->string('donate_page_cover_image')->nullable();
            $table->string('fundraise_page_menu_title')->nullable();
            $table->string('fundraise_page_header_title')->nullable();
            $table->string('fundraise_page_campaign_title')->nullable();
            $table->string('fundraise_page_cover_image')->nullable();
            $table->string('fundraise_page_form_title')->nullable();

            $table->string('signup_page_menu_title')->nullable();
            $table->string('signup_page_cover_title')->nullable();
            $table->string('signup_page_cover_image')->nullable();

            $table->string('login_page_menu_title')->nullable();
            $table->string('login_page_cover_title')->nullable();
            $table->string('login_page_cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_settings')->nullable();
    }
}
