<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Item;
use App\JenisItem;
class ItemsController extends Controller
{
    public function __construct(){
        if(!isAuthenticated())
            return Redirect::to('/')->send();
    }
    public function getView(){
        if(!isAdmin())
            return Redirect::to('/')->send();
        return view('item.index');
    }
    public function checkJenisItem($id){
        return JenisItem::find($id);
    }
    public function validateInput(Request $request){
        $rules = array(
            'nama'      => 'required',
            'jenis'     => 'required',
            'harga'     => 'required|integer'
        );
        return Validator::make(Input::all(), $rules);
    }
    /**
     * Display all Items
     *
     * @return Response
     */
    public function getAllItems($jenis = null){
        if($jenis == null){
            return Item::orderBy('id','asc')->get();
        } else {
            return Item::where('jenis','=',$jenis)->orderBy('id','asc')->get();
        }
    }
    /**
     * Get an Item by ID
     *
     * @param  int  $id
     * @return Response
     */
    public function getItem($id) {
        return Item::find($id);
    }
    /**
     * Add an Item
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function addItem(Request $request) {
        if(!isAdmin())
            return Redirect::to('/')->send();
       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);
        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {
            if(!$this->checkJenisItem(Input::get('jenis')))
                return "Jenis Item not valid";
            $item = new Item;
            $item->nama             = Input::get('nama');
            $item->jenis            = Input::get('jenis');
            $item->harga            = Input::get('harga');
            $item->save();
            return 1;
        }
    }
    /**
     * Edit an Item
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return Response
     */
    public function editItem(Request $request,$id) {
        if(!isAdmin())
            return Redirect::to('/')->send();
       /* Validation with Laravel built-in validator*/
       $validator = $this->validateInput($request);
        if ($validator->fails()) {
            return $validator->messages()->first();
        } else {
            if(!$this->checkJenisItem(Input::get('jenis')))
                return "Jenis Item not valid";
            $item = Item::find($id);
            if(!$item)
                return "Not found";
            $item->nama             = Input::get('nama');
            $item->jenis            = Input::get('jenis');
            $item->harga            = Input::get('harga');
            $item->save();
            return 1;
        }
    }
    /**
     * Remove an Item
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!isAdmin())
            return Redirect::to('/')->send();
        $item = Item::find($id);
        if(!$item)
                return "Not Found";
        /* Check inTransaction */
        /* Belum diimplementasikan */
        
        $item->delete();
        return 1;
    }
    /**
     * Display all JenisItem
     *
     * @return Response
     */
    public function getAllJenisItem(){
        return JenisItem::orderBy('id','asc')->get();
    }
}