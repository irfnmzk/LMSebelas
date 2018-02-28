<?php

namespace App\Http\Controllers;

use App\Diskusi;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function store($id, Request $request){
        $data = $request->all();
        $data['creator_id'] = \Auth::user()->id;
        $data['kelas_id'] = $id;

        Diskusi::create($data);

        return redirect()->route('show.kelas', $id);
    }
}
