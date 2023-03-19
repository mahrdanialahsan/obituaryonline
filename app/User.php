<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'facebook_id',
        'deleted_at',
        'is_admin',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'bod' => 'date',
        'email_verified_at' => 'datetime',
        'deleted_at'        => 'datetime',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */

    protected $dates = [
        'bod',
        'email_verified_at',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * @return string
     *
     *
     */
    public function getFullnameAttribute(){
        return $this->first_name . ' '. $this->last_name;
    }

    public function childs()
    {
        return $this->hasMany(Child::class, 'user_id','id');
    }
}
