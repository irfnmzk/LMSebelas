<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Tugas;
use App\Jawaban_tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['creator_id'] = Auth::user()->id;

        $tugas = Tugas::create($data);

        return redirect()->route('show.kelas', $tugas->materi->kelas_id);
    }

    public function show($id){
        $tugas = Tugas::findOrFail($id);

        return view('tugas.do', compact('tugas'));
    }

    public function storeSiswa(Request $request){
        $data = $request->all();

        $data['creator_id'] = Auth::user()->id;

        if($request->file('link')){
            $file       = $request->file('link');
            $fileName   = $file->store('file');
            $data['link'] = $fileName; 
        }

        Jawaban_tugas::create($data);
        
        return response()->json(array('status'=>'success'));
    }

    public function result($id)
    {
        $tugas = Tugas::findOrFail($id);

        $kelas = $tugas->materi->kelas;

        return view('tugas.result', compact('tugas','kelas'));
    }

    public function download($id){
        $jawaban = Jawaban_tugas::findOrFail($id);

        $item = $jawaban->link;

        $path = storage_path($item);
        
        return Storage::download($item);
    }

    public function edit($id, Request $request)
    {
        $tugas = Tugas::findOrFail($id);

        $tugas->update($request->all());

        return redirect()->route('show.kelas', $tugas->materi->kelas->id);
    }
}
