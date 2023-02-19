<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'document';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table',
        'table_id',
        'description',
        'file',
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
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'deleted_at'        => 'datetime',
        'created_at'        => 'datetime',
    ];

    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */

    protected $dates = [
        'deleted_at',
        'created_at',
    ];


}

