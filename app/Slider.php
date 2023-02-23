<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected  $table = 'sliders';
    protected $fillable = [
        'small_title',
        'big_title',
        'description',
        'allow_donate_button',
        'displayorder',
        'image',
        'status',
    ];
}
