<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Transaksi;
use App\JenisItem;
use App\Item;

class TransaksiController extends Controller
{
	public function __construct(){
        if(!isAuthenticated())
            return Redirect::to('/')->send();
   	}

    public function getView(){
    	if(isMerchant()){
    		$jenis_item = JenisItem::orderBy('id','asc')->get();
	    	return view('transaksi.index',compact('jenis_item'));
    	}
    }
}
