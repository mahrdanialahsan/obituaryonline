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
            $table->string('my_obituaries_title')->nullable();
            $table->string('stripe_key')->default('pk_test_AGasvfU4csIh1Cbhk2TFfLEJ00uLFx1vrg');
            $table->string('stripe_secret')->default('sk_test_VgQx6sXcjkb19a2xCjI3Bz2J00Jy8xVuGN');
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('footer_rights')->nullable();
            $table->string('home_page_menu_title')->nullable();
            $table->string('home_page_title_short_title')->nullable();
            $table->string('home_page_title_long_title')->nullable();
            $table->string('home_page_obituary_slider_title')->nullable();
            $table->string('home_page_title_short_description')->nullable();
            $table->string('pure_heart_title')->nullable();
            $table->string('pure_large_title')->nullable();
            $table->string('pure_small_description')->nullable();
            $table->string('donate_page_menu_title')->nullable();
            $table->string('donate_page_header_title')->nullable();
            $table->string('donate_page_cover_image')->nullable();
            $table->string('obituary_page_menu_title')->nullable();
            $table->string('obituary_page_header_title')->nullable();
            $table->string('obituary_page_obituary_title')->nullable();
            $table->string('obituary_page_cover_image')->nullable();

            $table->string('archive_page_title')->nullable();
            $table->string('archive_page_cover_image')->nullable();

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
