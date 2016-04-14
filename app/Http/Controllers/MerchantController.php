<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Merchant;
use Auth;

class MerchantController extends Controller
{
	public function validateInput(Request $request){
		$rules = array(
            'nama'		=> 'required',
            'alamat'	=> 'required',
            'telepon'	=> 'required',
            'email'		=> 'required|email'
        );
        return Validator::make(Input::all(), $rules);
	}

    public function validateStatus($status){
        if(strcmp($status,'Diproses')==0){
            return true;
        } else if(strcmp($status,'Diterima')==0){
            return true;
        } else if(strcmp($status,'Ditolak')==0){
            return true;
        } else {
            return false;
        }
    }

    public function getView(){
        if(isMerchant()){
            return Redirect::to('merchant/dashbaord');
        } else {
            return view('merchant.welcome');
        }
    }

    public function showDashboard(){
        if(!isMerchant())
            return Redirect::to('/');
        if(strcmp(getMerchantStatus(),'Diterima')==0){ //Diterima
            return view('merchant.dashboard');
        } else if(strcmp(getMerchantStatus(),'Diproses')==0){ //Diproses
            return view('merchant.dashboard_processed');
        } else { //Ditolak
            return view('merchant.dashboard_rejected');
        }
    }

	/*
	 * Status tidak diperlukan untuk pendaftaran
	 * Password tidak diperlukan untuk edit oleh Software Engineer
	 */

	public function validatePassword($password){
		if ($password.length()>=8){
			return 1;
		} else {
			return "Password must be at least 8 characters";
		}
	}

    public function __construct(){
        //$this->middleware('admin');
   	}

    /**
     * Display all Merchants
     *
     * @return Response
     */
    public function getAllMerchant(){
    	if(!isAdmin())
            return "";
    	return Merchant::orderBy('id','asc')->get();
    }

    /**
     * Get a Merchant by ID
     *
     * @param  int  $id
     * @return Response
     */
	public function getMerchant($id) {
		if(!isAdmin())
            return "";
        return Merchant::find($id);
    }

    /**
     * Add a Merchant
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
	public function addMerchant(Request $request) {
       /* No authentication. Public can access */

       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);

        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {
        	/* Check password */
        	$passwordValidator = validatePassword($password);
        	if($passwordValidator!=1){
        		return $passwordValidator;
        	}

        	/* Validate phone number */
            if (!preg_match('/^[0-9]+$/', Input::get('telepon'))){
                return "No. Telp tidak valid. Hanya boleh mengandung angka";
            }

            $merchant = new Merchant;
            $merchant->nama         		= Input::get('nama');
            $merchant->alamat       		= Input::get('alamat');
            $merchant->telepon      		= Input::get('telepon');
            $merchant->email      			= Input::get('email');
            $merchant->password  			= Input::get('password');
            $merchant->status  				= "Diproses";
            $merchant->save();
            return 1;
        }
    }

    /**
     * Edit a Merchant by Software Engineer
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function editMerchant(Request $request, $id) {
        if(!isAdmin())
            return "Not allowed";

       /* Authentication. Only software engineer can access */

       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);

        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {

        	/* Validate phone number */
            if (!preg_match('/^[0-9]+$/', Input::get('telepon'))){
                return "No. Telp tidak valid. Hanya boleh mengandung angka";
            }

            if(!$this->validateStatus(Input::get('status')))
                return "Status tidak valid";

            $merchant = Merchant::find($id);
            if(!$merchant)
                return "Not found";

            $merchant->nama         		= Input::get('nama');
            $merchant->alamat       		= Input::get('alamat');
            $merchant->telepon      		= Input::get('telepon');
            $merchant->email      			= Input::get('email');
            $merchant->status  				= Input::get('status');
            $merchant->save();
            return 1;
        }
    }

    /**
     * Remove a Merchant by Software Engineer
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!isAdmin())
            return "Not allowed";

    	//$this->middleware('admin');
        $merchant = Merchant::find($id);
        if(!$merchant)
                return "Not Found";

        /* Check inTransaction dan inPermohonan */
        /* Belum diimplementasikan */
        
		$merchant->delete();
		return 1;
    }

    public function editMyMerchantView(Request $request) {
        if(!isMerchantApproved())
            return Redirect::to('/');

        return view('merchant.merchant.edit');

    }


    /**
     * Edit a Merchant by Merhant
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function getMyMerchant() {
        if(!isMerchantApproved())
            return "Not allowed";

        $id_merchant_auth = Auth::guard('merchant')->user()->id;
        return Merchant::find($id_merchant_auth);

    }


    /**
     * Edit a Merchant by Merhant
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function editMyMerchant(Request $request) {
        if(!isMerchantApproved())
            return "Not allowed";

       /* Authentication. Only the merchant owner can access */

       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);

        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {

            /* Validate phone number */
            if (!preg_match('/^[0-9]+$/', Input::get('telepon'))){
                return "No. Telp tidak valid. Hanya boleh mengandung angka";
            }

            $id_merchant_auth = Auth::guard('merchant')->user()->id;
            $merchant = Merchant::find($id_merchant_auth);
            if(!$merchant)
                return "Not found";

            $merchant->nama                 = Input::get('nama');
            $merchant->alamat               = Input::get('alamat');
            $merchant->telepon              = Input::get('telepon');
            $merchant->email                = Input::get('email');
            $merchant->save();
            return 1;
        }
    }
}