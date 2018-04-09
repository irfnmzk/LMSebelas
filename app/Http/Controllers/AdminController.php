<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect('admin/kelas');
    }
    
    public function allKelas(){
        $kelas = Kelas::withCount('Anggota_kelas')->get();
        
        return view('admin.kelas', compact('kelas'));
    }
}
