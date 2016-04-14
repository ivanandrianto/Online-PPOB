<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
    	if(isSoftwareEngineer()){
            return view('admin.dashboard-se');
    	} else if(isAccountant()) {
            return view('admin.dashboard-accountant');
        } else if(isSurveyor()) {
            return view('admin.dashboard-surveyor');
        }
    }
}