<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaigns extends Model
{
    //
    //
    protected $table = 'campaigns';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'uid',
        'deceased_first_name',
        'deceased_last_name',
        'nric',
        'date_of_birth',
        'date_of_death',
        'wake_location',
        'wake_period',
        'funeral_date',
        'funeral_location',
        'surviving_family',
        'deceased_picture',
        'death_certificate',
        'poa_wills',
        'public_donation',
        'message',
        'status',
        'approved_by',
        'approved_at',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'approved_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'date_of_birth'     => 'date',
        'date_of_death'     => 'datetime',
        'funeral_date'      => 'datetime',
        'deleted_at'        => 'datetime',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'approved_at'       => 'datetime',
    ];

    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */

    protected $dates = [
        'date_of_birth',
        'date_of_death',
        'funeral_date',
        'deleted_at',
        'created_at',
        'updated_at',
        'approved_at'
    ];



}
