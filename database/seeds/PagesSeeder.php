<?php

use Illuminate\Database\Seeder;
use App\Pages;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Pages::truncate();
        Pages::insert(['title'=>'Learn','slug'=>'learn','type'=>'learn','description'=>'This is about us page']);
        Pages::insert(['title'=>'About Us','slug'=>'about-us','type'=>'about','description'=>'This is about us page']);
        Pages::insert(['title'=>'Contact Us','slug'=>'contact-us','type'=>'contact','description'=>'This is Contact Page']);
        Pages::insert(['title'=>'Test Blog','slug'=>'test-blog','type'=>'blog','description'=>'This is Test blog Page']);

    }
}
