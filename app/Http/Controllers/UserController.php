<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Sekolah;
use App\Anggota_kelas;
use App\Kelas;
use Input;

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

    public function editProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('users.edit', compact('user'));
    }

    public function showProfile()
    {
        $user = User::find(Auth::user()->id);
        $kelas_id = Anggota_kelas::select('kelas_id')->where('user_id', '=', $user->id)->get();
        $kelas = Kelas::findMany($kelas_id);
        return view('users.profile', compact('user', 'kelas'));
    }

	public function storeSetting(Request $request)
	{
		$user = \App\User::find(Auth::user()->id);
		$data = $request->all();
		$data['active'] = 1;
		$user->update($data);

		return redirect('dashboard');
	} 

    public function updateProfile(Request $request)
    {
        $user = \App\User::find(Auth::user()->id);
        $data = $request->all();
        
        $user->update($data);

        return redirect('user/profile');
    } 

	public function find(Request $request)
    {
        $term = $request->data;
    
            $results = array();
            
            $queries = Sekolah::where('nama', 'LIKE', '%'.$term.'%')->orderBy('nama', 'asc')->get();
            
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->nama, 'name' => $query->nama ];
            }
        return \Response::json($results);
    }   
}
