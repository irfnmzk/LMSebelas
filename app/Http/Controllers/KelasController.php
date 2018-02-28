<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Anggota_kelas;
use App\Materi;
use App\Modul;
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

	public function editKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi.edit', compact('materi'));
    }

    public function updateKelas($id, Request $request)
    {
        $data = $request->all();

        $kelas = Kelas::findOrFail($id);

		if($request->file('cover')){
            $file       = $request->file('cover');
            $fileName   = $file->getClientOriginalName();
            $request->file('cover')->move("img/", $fileName);
            $data['cover'] = $fileName; 
        }
        
        $kelas->update($data);

        return redirect('classroom/'.$id);
    }

    public function updateMateri($id, Request $request)
    {
        $data = $request->all();

        $materi = Materi::findOrFail($id);

		if($data['nilai_tugas'] + $data['nilai_quiz'] != 100){
			return redirect()->back();
		}
        
        $materi->update($data);

        return redirect('classroom/'.$materi->kelas_id);
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
		$kelas = Kelas::findOrFail($id);
	 	return view('kelas.show', compact('kelas'));
	 } 

	 public function storeMateri(Request $request)
	{
		$data = $request->all();

		if($data['nilai_tugas'] + $data['nilai_quiz'] != 100){
			return redirect()->back();
		}
		
		$data['creator_id'] = Auth::user()->id;

		$materi = Materi::create($data);

		return redirect()->route('show.kelas', $materi->kelas_id);
	}

	public function storeModul(Request $request)
	{
		$data = $request->all();

		if($request->file('link')){
            $file       = $request->file('link');
            $fileName   = $file->getClientOriginalName();
            $request->file('link')->move("pdf/", $fileName);
            $data['link'] = $fileName; 
        }

		$modul = Modul::create($data);

	}

	public function destroyModul($id)
    {
    	$modul = Modul::findOrFail($id);
        Modul::destroy($id);

        return redirect()->route('show.kelas', $modul->materi->kelas_id);
    }

    public function destroyMateri($id)
    {
    	$materi = Materi::findOrFail($id);
        Materi::destroy($id);

        return redirect()->route('show.kelas', $materi->kelas_id);
    }
}
