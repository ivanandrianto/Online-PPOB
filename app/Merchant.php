<?php
 
namespace App;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Merchant extends Authenticatable
{

    protected $table = "merchant";
	protected $guard = "merchant";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password',
    ];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}