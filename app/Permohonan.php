<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    public function merchant(){
    	return $this->hasOne('App\Merchant', 'id', 'merchant_id');
    }
}