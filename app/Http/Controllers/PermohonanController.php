<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Permohonan;
use App\Merchant;

class PermohonanController extends Controller
{
	public function __construct(){
		/* Hanya surveyor */
        if(!isSurveyor())
        	return Redirect::to('/')->send();
   	}

    public function getView(){
        return view('admin.permohonan.index');
    }

    /**
     * Display all Permohonan
     *
     * @return Response
     */
    public function getAllPermohonan($status = null){
    	/*if($status == null){
			 return Permohonan::with('merchant')->orderBy('created_at','desc')->get();
    	} else {
    		return Permohonan::with('merchant')->where('status','=',$status)->orderBy('created_at','desc')->get();
    	}*/

      if($status == null){
        return Merchant::select('id', 'nama', 'created_at', 'status')->orderBy('created_at','desc')->get();
      } else {
        return Merchant::select('id', 'nama', 'created_at', 'status')->where('status','=',$status)->orderBy('created_at','desc')->get();
      }
    }

    /**
     * Get a Permohonan by ID
     *
     * @param  int  $id
     * @return Response
     */
	public function getPermohonan($id) {
		/* Hanya surveyor */
        //return Permohonan::with('merchant')->get()->find($id);
        return Merchant::find($id)->pluck(['id','nama','created_at']);
    }

    /**
     * Edit a Permohonan
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function approveRejectPermohonan(Request $request, $type, $id) {
    	/* Hanya surveyor */

       	if(($type!=0) && ($type!=1))
       		return "";

       	/*$permohonan = Permohonan::find($id);
       	if(!$permohonan)
       		return "not found";

       	$merchant_id=$permohonan->merchant_id;
       	$merchant = Merchant::find($merchant_id);
       	if(!$merchant)
       		return "merchant not found";

       	$status="";
       	if($type==0){//ditolak
       		$status="Ditolak";
       	} else if($type==1){//diterima
       		$status="Diterima";
       	}
       	$permohonan->status=$status;
       	$merchant->status=$status;
       	$permohonan->save();
       	$merchant->save();*/

        $merchant = Merchant::find($id);
        if(!$merchant)
          return "not found";

        $status="";
        if($type==0){//ditolak
          $status="Ditolak";
        } else if($type==1){//diterima
          $status="Diterima";
        }
        $merchant->status=$status;
        $merchant->save();
        return 1;
    }
}
