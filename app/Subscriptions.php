<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    //
    protected $table = 'subscriptions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'created_at',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'created_at'        => 'datetime',
    ];

    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */

    protected $dates = [
        'created_at',
    ];


}

