<?php

namespace App\Http\Controllers;

use \App\Diskusi;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function store($id,Request $request)
    {
        $data = $request->all();
        $data['kelas_id'] = $id;
        $data['creator_id'] = \Auth::user()->id;
        //dd($data);
        Diskusi::create($data);

        return redirect()->route('show.kelas', $id);
    }
}
