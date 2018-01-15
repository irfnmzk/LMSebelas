<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

	public function showSetting()
	{
		return view('users.setting');
	}

	public function storeSetting(Request $request)
	{
		$user = \App\User::find(Auth::user()->id);
		$data = $request->all();
		$data['active'] = 1;
		$user->update($data);

		return redirect('dashboard');
	}    
}
