<?php

namespace App\Http\Controllers\backend;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Login extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('backend.login');
    }

    public function doLogin(Request $request)
    {
       $rules = [
            'usrname' => 'required',
            'password' => 'required'
        ];

        $msgs = [
            'usrname.required' => 'Please enter your user name',
            'password.required' => 'Please enter your password'
        ];

        $this->validate($request, $rules, $msgs);
        
        // form validation passed, check creds in db
        $userdata = array(
            'username' => trim($request->usrname),
            'password' => trim($request->password)
        );

        //attempt to login
        if(Auth::guard('admin')->attempt($userdata))
        {
            return redirect()->route('cms.dashboard');  
        }
        else
        {
            return redirect()->route('cms.login')->with('error', 'Invalid credentials')->withInput(Input::except('password')); 
        }
    }

    function authenticated() {
        //$user->last_login_at = Carbon::now()->toDateTimeString();
        //$user->save();

        Auth::user()->update([
            'last_login_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
