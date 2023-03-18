<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondolenceDesign extends Model
{
    //
    protected $table = 'condolence_design';
    protected $fillable = ['title','description','image'];
}
