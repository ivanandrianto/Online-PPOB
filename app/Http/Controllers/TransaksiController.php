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
use App\Merchant;

class TransaksiController extends Controller
{
	public function __construct(){
        if(!isAuthenticated())
            return Redirect::to('/')->send();
   	}

    public function getView(){
    	if(isMerchantApproved()){
    		$jenis_item = JenisItem::orderBy('id','asc')->get();
	    	return view('merchant.transaksi.index',compact('jenis_item'));
    	} else if (isSoftwareEngineer()){
    		return view('admin.transaksi.index',compact('jenis_item'));
    	} else {
    		return Redirect::to('/');
    	}
    }

    public function selectJenis($id){
    	if(isMerchantApproved()){
	   		$jenis_item = JenisItem::find($id);
	   		if($jenis_item){
	   			if($jenis_item->hasSelections==false){
	   				$item = Item::where('jenis','=',$id);
	   				if($item->count()>0){
	   					$item = $item->get()->first();
	   				} else {
	   					return "No item";
	   				}
	   				return view('merchant.transaksi.do',compact('jenis_item','item'));		
	   			} else {
	   				$items = Item::where('jenis','=',$id)->get();
	   				return view('merchant.transaksi.select',compact('jenis_item','items'));		
	   			}
	   		}
    	}
    }

    public function selectItem($id){
    	if(isMerchantApproved()){
	   		$item = Item::find($id);
	   		if(!$item)
	   			return "Not found";
	   		$jenis_item = JenisItem::find($item->jenis);
			if(!$jenis_item)
	   			return "Not found";
	   		return view('merchant.transaksi.do',compact('jenis_item','item'));
    	}
    }

    public function performTransaction(Request $request){
    	if(isMerchantApproved()){
    		$merchant_id = getMerchantID();
	    	if($merchant_id!=0){
	    		$item = Item::find(Input::get('item_id'));
		   		if(!$item)
		   			return "Not found";
		   		$item_price=$item->harga;
		   		if(strlen($item_price)<1)
		   			$item_price=Input::get('price');
		   		if(strlen($item_price)<1)
		   			return "Price not valid";

		   		$transaksi = new Transaksi;
		   		$transaksi->merchant_id = $merchant_id;
		   		$transaksi->item_id = Input::get('item_id');
		   		$transaksi->harga = $item_price;
		   		$transaksi->keterangan = Input::get('nomor');
		   		$transaksi->save();
		   		return 1;
	    	}
    	}
    }

    public function getAllTransactions(){
    	if(isAccountant()){
            $merchants = Merchant::where('status','=','Diterima')->orderBy('id','asc')->get();
            $transaksis = Transaksi::with('merchant')->with('item');
            $date=Input::get('date');
            $merchant_id=Input::get('merchant');
            $base_url = "/admin/transaksi?";
            if($merchant_id==0)
                $merchant_id=null;
            if($merchant_id!=null){
                $transaksis->where('merchant_id','=',$merchant_id);
                $base_url .= "merchant=" . $merchant_id;
            }
            if($date!=null){
                $transaksis->whereDate('created_at','=',$date);
                $base_url .= "date=" . $date;
            }
    		$transaksis=$transaksis->paginate(20);
            $transaksis=$transaksis->setPath($base_url);
    		return view('admin.transaksi.history',compact(['transaksis','date','merchants','merchant_id']));
    	}
    }

    public function getMyTransactions($date = null){
    	if(isMerchantApproved()){
    		$id = getMerchantID();
    		if($date == null){
    			$transaksis = Transaksi::with(['merchant','item'])->where('merchant_id','=',$id)->orderBy('created_at','desc')->paginate(20);
    			return view('merchant.transaksi.history',compact('transaksis'));
    		} else {
    			$transaksis = Transaksi::with(['merchant','item'])->where('merchant_id','=',$id)->whereDate('created_at','=',$date)->orderBy('created_at','desc')->paginate(20);
    			return view('merchant.transaksi.history',compact('transaksis','date'));
    		}

    	}
    }
}
