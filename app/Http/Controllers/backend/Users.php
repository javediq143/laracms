<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\backend\Admin;
use Config;
use illuminate\Support\Facades\Validator;

class Users extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        /*define('USER_NAME_MIN_LEN', 3);
        define('USER_NAME_MAX_LEN', 70);
        define('USER_ID_MIN_LEN', 6);
        define('USER_ID_MAX_LEN', 30);
        define('USER_EMAIL_MAX_LEN', 180);
        define('USER_PWD_MIN_LEN', 8);
        define('USER_PWD_MAX_LEN', 15);*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms_users = Admin::withTrashed()->get();
        return view('backend.users.index',compact('cms_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:'.Config::get('cms_const.USER_NAME_MIN_LEN').'|max:'.Config::get('cms_const.USER_NAME_MAX_LEN').'|regex:/(^[A-Za-z ]+$)+/',
            'usrmail' => 'required|email|unique:cms_users,email|max:'.Config::get('cms_const.USER_EMAIL_MAX_LEN'),
            'usrname' => 'required|min:'.Config::get('cms_const.USER_ID_MIN_LEN').'|max:'.Config::get('cms_const.USER_ID_MAX_LEN').'|regex:/(^[A-Za-z0-9._]+$)+/|unique:cms_users,username',
            'usrpwd' => 'required|min:'.Config::get('cms_const.USER_PWD_MIN_LEN').'|max:'.Config::get('cms_const.USER_PWD_MAX_LEN').'|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{7,}$/'
        ];

        $msgs = [
            'name.required' => 'Please enter name',
            'name.min' => 'Name should not be less then '.Config::get('cms_const.USER_NAME_MIN_LEN').' characters',
            'name.max' => 'Name should not be more then '.Config::get('cms_const.USER_NAME_MAX_LEN').' characters',
            'name.regex' => 'Only alphabets are allowed in name',

            'usrmail.required' => 'Please enter email',
            'usrmail.email' => 'Invalid email',
            'usrmail.unique' => 'Email already exist',
            'usrmail.max' => 'Email should not be more then '.Config::get('cms_const.USER_EMAIL_MAX_LEN').' characters',

            'usrname.required' => 'Please enter the user name',
            'usrname.min' => 'User name should not be less then '.Config::get('cms_const.USER_ID_MIN_LEN').' characters',
            'usrname.max' => 'User name should not be more then '.Config::get('cms_const.USER_ID_MAX_LEN').' characters',
            'usrname.regex' => 'Only Alphabets, Numbers, Dot and Underscore allowed in user name',
            'usrname.unique' => 'User name already exist',

            'usrpwd.required' => 'Please enter the password',
            'usrpwd.min' => 'Password should not be less then '.Config::get('cms_const.USER_PWD_MIN_LEN').' characters',
            'usrpwd.max' => 'Password should not be more then '.Config::get('cms_const.USER_PWD_MAX_LEN').' characters',
            'usrpwd.regex' => 'Invalid password format',
        ];

        $this->validate($request, $rules, $msgs);

        Admin::create([
            'name' => $request->name,
            'username' => $request->usrname,
            'password' => bcrypt($request->usrpwd),
            'email' => $request->usrmail,
        ]);

        return redirect()->route('cms.user-management.index')->with('success','New user account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id)
        {
            return redirect()->route('cms.user-management.index');
            die;
        }

        $arrRecord = Admin::find($id);
        if(is_null($arrRecord))
        {
            return redirect()->route('cms.user-management.index')->withErrors(['error'=>'Record you are trying to edit does not exist']);
            die;
        }

        return view('backend.users.edit', compact('arrRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:'.Config::get('cms_const.USER_NAME_MIN_LEN').'|max:'.Config::get('cms_const.USER_NAME_MAX_LEN').'|regex:/(^[A-Za-z ]+$)+/',
            'usrmail' => 'required|email|max:'.Config::get('cms_const.USER_EMAIL_MAX_LEN'),
            'usrpwd' => 'nullable|min:'.Config::get('cms_const.USER_PWD_MIN_LEN').'|max:'.Config::get('cms_const.USER_PWD_MAX_LEN').'|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{7,}$/'
        ];        

        $msgs = [
            'name.required' => 'Please enter name',
            'name.min' => 'Name should not be less then '.Config::get('cms_const.USER_NAME_MIN_LEN').' characters',
            'name.max' => 'Name should not be more then '.Config::get('cms_const.USER_NAME_MAX_LEN').' characters',
            'name.regex' => 'Only alphabets are allowed in name',

            'usrmail.required' => 'Please enter email',
            'usrmail.email' => 'Invalid email',
            'usrmail.max' => 'Email should not be more then '.Config::get('cms_const.USER_EMAIL_MAX_LEN').' characters',

            'usrpwd.min' => 'Password should not be less then '.Config::get('cms_const.USER_PWD_MIN_LEN').' characters',
            'usrpwd.max' => 'Password should not be more then '.Config::get('cms_const.USER_PWD_MAX_LEN').' characters',
            'usrpwd.regex' => 'Invalid password format',
        ];

        $this->validate($request, $rules, $msgs);

        $arrRecord = Admin::find($id);
        if(is_null($arrRecord))
        {
            return redirect()->route('cms.user-management.index')->withErrors(['error'=>'Record you are trying to edit does not exist']);
            die;
        }

        $arrRecord->name =  $request->input('name');
        $arrRecord->email = $request->input('usrmail');
        if($request->input('usrpwd'))
        {
            $arrRecord->password = bcrypt($request->input('usrpwd'));
        }
        $arrRecord->save();

        return redirect()->route('cms.user-management.index')->with('success','User account details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $arrRecord = Admin::find($id);
        if(is_null($arrRecord))
        {
            return response()->json(['error'=>'Record you are trying to delete does not exist']);
        }
        else
        {
            Product::find($id)->delete();
            return response()->json(['success'=>'Record successfully deleted']);
        }        
    }*/

    public function destroy($id)
    {
        try
        {
            $user = Admin::findOrFail($id);
            //$user->delete();
            return response()->json(['success'=>'Record successfully deleted', 'status'=>'Suspended']);
        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Record you are trying to delete does not exist']);
        }       
    }
}
