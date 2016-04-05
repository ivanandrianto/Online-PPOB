<?php

namespace App\Http\Controllers\MerchantAuth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Merchant;
use App\Permohonan;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/merchant';
    protected $guard = 'merchant';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    
    public function showLoginForm()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('merchant.auth.login');
    }
    public function showRegistrationForm()
    {
        return view('merchant.auth.register');
    }

    public function login()
    {
        
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/merchant/login')
                ->withErrors($validator) 
                ->withInput(Input::except('password'));
        } else {
                
            $merchantdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );
            if (Auth::guard('merchant')->attempt($merchantdata)) {
                return Redirect::to('/merchant');
            } else {
                return Redirect::to('/merchant/login');
            }

        }
    }


    public function register()
    {

        $rules = array(
            'nama'      => 'required',
            'alamat'    => 'required',
            'telepon'   => 'required',
            'email'     => 'required|email',
            'password'  => 'required|alphaNum|min:3',
            'password2' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/merchant/register')
                ->withErrors($validator) 
                ->withInput(Input::except('password'));
        } else {
            
            if (!preg_match('/^[0-9]+$/', Input::get('telepon')))
                return "No. Telp tidak valid. Hanya boleh mengandung angka";

            if(Input::get('password')!=Input::get('password2'))
                return "Password not match";

            if(strlen(Input::get('password')) < 8)
                return "Password must be at least 8 characters";

            $email_exist_count = Merchant::where('email','=',Input::get('email'))->count();
            if($email_exist_count>0)
                return "Email Exist";
            
            $merchant = new Merchant;
            $merchant->nama             = Input::get('nama');
            $merchant->alamat           = Input::get('alamat');
            $merchant->telepon          = Input::get('telepon');
            $merchant->email            = Input::get('email');
            $merchant->password         = Input::get('password');
            $merchant->status           = "Diproses";
            $merchant->save();

            $insertedId = $merchant->id;

            //save to permohonan
            $permohonan = new Permohonan;
            $permohonan->merchant_id      = $insertedId;
            $permohonan->status           = "Diproses";
            $permohonan->save();

            return Redirect::to('/merchant/login');
        }
    }

    public function logout()
    {
        Auth::guard('merchant')->logout();
        return Redirect::to('merchant/login');
    }
}
