<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Quiz;
use App\Soal;
use App\Jawaban;
use App\Jawaban_user;
use App\Hasil_quiz;
use Input;
use Auth;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $quiz = Quiz::create($requestData);

        return redirect()->route('show.kelas', $quiz->materi->kelas_id);
    }
}
