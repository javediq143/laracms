<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\backend\Admin;
use App\Models\backend\Submenu;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        /*$user = Auth::user();

        $submen = $user->submenus();
        //echo '<pre>';
        dd($submen);*/

        return view('backend.dashboard');
    }
}
