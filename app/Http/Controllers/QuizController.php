<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Anggota_kelas;
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

    public function start_quiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $now = Carbon::now();
        $user = Auth::user()->id;
        $anggota_kelas = Anggota_kelas::where([['kelas_id', '=', $quiz->materi->kelas_id],['user_id', '=', $user],])->first();

        $tanggal_mulai = Carbon::parse($quiz->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($quiz->tanggal_selesai);

        $sip = $now->between($tanggal_mulai, $tanggal_selesai);
        $cek = Hasil_quiz::where([['quiz_id', '=', $quiz->id],['creator_id', '=', $anggota_kelas->id],])->first();

        if($cek != null && $cek->status == "Selesai dikerjakan"){
            $waktu_mulai = Carbon::parse($cek->waktu_mulai);
            $waktu_selesai = Carbon::parse($cek->waktu_selesai);
            $total_waktu = intval($cek->total_waktu / 60).":".intval($cek->total_waktu%60);
            
            return view('quiz.quiz_result', compact('cek', 'waktu_mulai', 'waktu_selesai', 'total_waktu'));
        }
        else{
            return view('quiz.quiz_attempt', compact('quiz', 'sip', 'tanggal_mulai', 'tanggal_selesai'));
        }
    }

    public function quiz_control($quiz_id){
        $soal = Soal::where('quiz_id', '=' , $quiz_id)->paginate(10);
        return view('quiz.control', compact('soal', 'quiz_id'));
    }

    public function saveanswerquiz(Request $request)
    {
        //dd(json_decode($request->getContent(), true));
        // $id = $request->input('id');
        $id_hasil = $request->input('id_answer');
        $id_question =$request->input('id_question');
        $answer = $request->input('answer');
        $user = Auth::user()->id;
        
        $right = 0;

        if($id_hasil != null){
            $jawab = Jawaban_user::where([['hasil_id', '=', $id_hasil],['creator_id', '=', $user],['soal_id', '=', $id_question], ])->first();
            if($jawab){
            Jawaban_user::destroy($jawab->id);
        }
        }

        $benar = Jawaban::find($answer);
        if($benar->benar == 1){
            $right = 1;
        }

        $jawaban_user = new Jawaban_user([
            'creator_id' => Auth::user()->id,
            'soal_id' => $id_question,
            'hasil_id' => $id_hasil,
            'jawaban_id' =>$answer,
            'benar' => $right,
            ]);
        
        $jawaban_user->save();
        //dd($jawaban_user->id);

            $query = Jawaban_user::find($jawaban_user->id);
            $results = array(
            'id' => $query->id,
            'msg' => $query->jawaban_id,
            'status' => "success",
        );

        return \Response::json($results);
    } 

    public function checkquiz(Request $request)
    {
        $id_quiz = $request->input('id_quiz');
        $user = Auth::user()->id;

        $cek = Hasil_quiz::where([['quiz_id', '=', $id_quiz],['user_id', '=', $user], ])->first();
        if($cek == null){
            $hasil = new Hasil_quiz([
                'user_id' => $user,
                'quiz_id' => $id_quiz,
                'waktu_mulai' => Carbon::now(),
                'ip_address' =>request()->ip(),
                'user_agent' => $request->header('User-Agent'),
                ]);
            $hasil->save();
            $hid = $hasil->id;
        }
        else{
            $hid = $cek->id;
        }
            $query = Jawaban_user::where('hasil_id', '=', $hid)->get();
            $result = array();
            foreach($query as $item){
               $result[] = array('id_question' => $item->soal_id, 'answer' => $item->jawaban_id);
            }
            $results = array('id' => $hid, 'detail' => $result);
            //dd($results);

        return \Response::json($results);
    }

    public function stopquiz(Request $request)
    {
        $id_quiz = $request->input('id_quiz');
        $id_hasil = $request->input('idd');
        $user = Auth::user()->id;
        $now = Carbon::now();

        $jumlah_soal = Soal::where('quiz_id', '=', $id_quiz)->count();
        $jumlah_benar = Jawaban_user::where('hasil_id', '=', $id_hasil)->sum('benar');
        $nilai = $jumlah_benar / $jumlah_soal * 100;

        $hasil = Hasil_quiz::find($id_hasil);
        $waktu_mulai = Carbon::parse($hasil->waktu_mulai);

        $hasil->jumlah_benar = $jumlah_benar;
        $hasil->nilai = $nilai;
        $hasil->waktu_selesai = $now;
        $hasil->total_waktu = $now->diffInSeconds($waktu_mulai);
        $hasil->status = "Selesai dikerjakan";
        $hasil->save();

        return \Response::json($hasil);
    }
}
