<?php

namespace App\Http\Controllers\backend;
use Auth;
use App\Models\backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class Logout extends Controller
{
    public function index()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('cms.login'); // redirect the user to the login screen
    }
}
