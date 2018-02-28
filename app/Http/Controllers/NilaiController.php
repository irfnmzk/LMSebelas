<?php

namespace App\Http\Controllers;

use App\Nilai_tugas as Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function tugas($id, Request $request){
        $data = $request->all();
        $data['ket'] = '-';

        $nilai = Nilai::where('jawaban_tugas_id', '=', $request->jawaban_tugas_id)->first();
        
        if($nilai){
            $nilai->update($data);
        }

        Nilai::create($data);

        return response()->json(['status'=>'success']);
    }
}
