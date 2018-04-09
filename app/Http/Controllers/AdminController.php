<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect('admin/kelas');
    }
    
    public function allKelas(){
        return view('admin.kelas');
    }
}
