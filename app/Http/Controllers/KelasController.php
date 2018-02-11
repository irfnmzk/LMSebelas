<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Anggota_kelas;
use Auth;

class KelasController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

	public function index()
	{
		$kelas_id = Anggota_kelas::select('kelas_id')
			->where('user_id', '=', Auth::user()->id)
			->get();

		$kelas = Kelas::findMany($kelas_id);

		return view('kelas.index', compact('kelas'));
	}

	public function storeKelas(Request $request)
	{
		$data = $request->all();
		
		$data['creator_id'] = Auth::user()->id;
		$data['code'] = strtoupper(str_random(6)); //semua uppercase untuk kemudahan

		$kelas = Kelas::create($data);

		$anggota = new Anggota_kelas([
			'kelas_id' => $kelas->id,
			'user_id' => Auth::user()->id,
			]);
		$anggota->save();

		return redirect()->route('show.kelas', $kelas->id);
	}

	public function joinKelas(Request $request)
	{
		$data = $request->all();

		$kelas = Kelas::where('code','=', $data['code'])->first();

		if(!$kelas){
			return redirect()->back();
		}
		
		$anggota = new Anggota_kelas([
			'kelas_id' => $kelas->id,
			'user_id' => Auth::user()->id,
			]);
		$anggota->save();

		return redirect()->route('show.kelas', $kelas->id);
	}

	public function showKelas($id)
	 {
		$kelas = Kelas::findOrFail($id)
			->with('anggota_kelas.user','materi.modul')
			->first();
		 //dd($kelas);
		 
	 	return view('kelas.show', compact('kelas'));
	 } 
}
