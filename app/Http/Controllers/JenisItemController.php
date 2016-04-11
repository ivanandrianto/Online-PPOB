<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\JenisItem;
use App\Item;

class JenisItemController extends Controller
{
    public function __construct(){
        if(!isSoftwareEngineer())
            return Redirect::to('/')->send();
   	}

   	public function getView(){
        return view('jenisitem.index');
    }

   	public function validateInput(Request $request){
		$rules = array(
            'jenis'				=> 'required',
            'hasSelections'		=> 'required',
            'title'				=> 'required',
            'message'			=> 'required'
        );
        return Validator::make(Input::all(), $rules);
	}

	/**
     * Get all JenisItem
     *
     * @return Response
     */
    public function getAllJenisItem(){
        return JenisItem::orderBy('id','asc')->get();
    }

    /**
     * Get a JenisItem by ID
     *
     * @param  int  $id
     * @return Response
     */
	public function getJenisItem($id) {
        return JenisItem::find($id);
    }

    /**
     * Add a JenisItem
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
	public function addJenisItem(Request $request) {
       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);

        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {
            $jenisitem = new JenisItem;
            $jenisitem->jenis       		= Input::get('jenis');
            $jenisitem->hasSelections       = Input::get('hasSelections');
            $jenisitem->title               = Input::get('title');
            $jenisitem->message             = Input::get('message');
            $jenisitem->save();
            return 1;
        }
    }

    /**
     * Edit an JenisItem
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return Response
     */
	public function editJenisItem(Request $request,$id) {
       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);

        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {
            $jenisitem = JenisItem::find($id);
            if(!$jenisitem)
                return "Not found";
            $jenisitem->jenis               = Input::get('jenis');
            $jenisitem->hasSelections       = Input::get('hasSelections');
            $jenisitem->title               = Input::get('title');
            $jenisitem->message             = Input::get('message');
            $jenisitem->save();
            return 1;
        }
    }

    /**
     * Remove a JenisItem
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisitem = JenisItem::find($id);
        if(!$jenisitem)
            return "Not Found";

        /* Check inTransaction */
        $count = Item::where('jenis','=',$jenisitem->id)->count();
        if($count > 0)
            return "Cannot delete";
        
		$jenisitem->delete();
		return 1;
    }
}
