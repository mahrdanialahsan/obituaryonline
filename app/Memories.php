<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memories extends Model
{
    //
    protected $table    = 'memories';
    protected $fillable = ['obituary_id','design_id','image','wishes','youtube_link'];
}
