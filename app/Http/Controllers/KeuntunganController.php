<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Keuntungan;
use App\Transaksi;

class KeuntunganController extends Controller
{
    public function __construct(){
        if(!isAccountant())
            return Redirect::to('/')->send();
   	}

   	public function getView($date = null){
		if($date == null){
			$keuntungans = Keuntungan::with('merchant')->orderBy('tanggal','desc')->paginate(20);
			return view('admin.keuntungan.index',compact('keuntungans'));
		} else {
			$keuntungans = Keuntungan::with('merchant')->whereDate('tanggal','=',$date)->orderBy('tanggal','desc')->paginate(20);
			return view('admin.keuntungan.index',compact(['keuntungans','date']));
		}
   	}

   	public function generateRequestView($date = null){
		return view('admin.keuntungan.generate');
   	}

   	public function generate(){
   		$count=Keuntungan::get()->count();
   		if($count>0){
   			$latest_date = DB::select(DB::raw("select max(`tanggal`)  as max_date from keuntungan"))[0]->max_date;
   			$date = date("Y-m-d",strtotime("+1 day", strtotime($latest_date)));
   			
   			while(strtotime($date) < strtotime(date("Y-m-d"))){

   				$transactions = DB::select(DB::raw("select merchant_id,created_at as tanggal,SUM(harga) as total from transaksi where date(created_at)=:date group by merchant_id,date(created_at)"), array('date' => $date));
   				
   				for($i=0; $i<count($transactions);$i++){
   					$keuntungan = new Keuntungan;
   					$keuntungan->jumlah = $transactions[$i]->total;
   					$keuntungan->merchant_id = $transactions[$i]->merchant_id;
	   				$keuntungan->tanggal = $date;
	   				$keuntungan->timestamps = false;
	   				$keuntungan->save();
   				}

   				$date = date("Y-m-d",strtotime("+1 day", strtotime($date)));
   			}
   		}
   		return 1;
   	}
}
