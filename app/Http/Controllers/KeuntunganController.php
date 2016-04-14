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
use App\Merchant;

class KeuntunganController extends Controller
{
    public function __construct(){
        if(!isAccountant())
            return Redirect::to('/')->send();
   	}

   	public function getView(){

         $merchants = Merchant::where('status','=','Diterima')->orderBy('id','asc')->get();
         $keuntungans = Keuntungan::with('merchant');
         $date=Input::get('date');
         $merchant_id=Input::get('merchant');
         $base_url = "/admin/keuntungan?";
         if($merchant_id==0)
            $merchant_id=null;
         if($merchant_id!=null){
            $keuntungans->where('merchant_id','=',$merchant_id);
            $base_url .= "merchant=" . $merchant_id;
         }
         if($date!=null){
            $keuntungans->whereDate('tanggal','=',$date);
            $base_url .= "date=" . $date;
         }
         $keuntungans=$keuntungans->paginate(20);
         $keuntungans=$keuntungans->setPath($base_url);
         return view('admin.keuntungan.index',compact(['keuntungans','date','merchants','merchant_id']));
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
