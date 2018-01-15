<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$user = \App\User::find(Auth::user()->id);
    	if($user->active == 0){
    		return view('users.setting');
    	}
        return view('dashboard');
    }
}
