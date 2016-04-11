<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function merchant(){
    	return $this->hasOne('App\Merchant', 'id', 'merchant_id');
    }

    public function item(){
    	return $this->hasOne('App\Item', 'id', 'item_id');
    }
}