<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuntungan extends Model
{
    protected $table = 'keuntungan';

    public function merchant(){
    	return $this->hasOne('App\Merchant', 'id', 'merchant_id');
    }
}