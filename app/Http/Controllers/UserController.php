<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Sekolah;
use App\Anggota_kelas;
use App\Kelas;

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

	public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Sekolah::where('nama', 'LIKE', '%'.$term.'%')->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->nama, 'text' => $tag->nama];
        }

        return \Response::json($formatted_tags);
    }   
}
