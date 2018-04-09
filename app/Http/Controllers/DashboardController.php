<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Sekolah;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('anti.admin');
    }

    public function index(){
        //dd(str_random(6));
    	$user = User::find(Auth::user()->id);
        

    	if($user->active == 0){
    		return view('users.setting', compact('user'));
    	}
        return view('dashboard');
    }

    
}
