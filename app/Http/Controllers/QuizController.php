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
use App\Result_all_quiz;
use Input;
use Auth;
use Excel;
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

    public function storeQuestion(Request $request)
    {
        $fileName = "";
        //dd($request);
        if($request->file('picture')){
            $file       = $request->file('picture');
            $fileName   = $file->getClientOriginalName();
            $request->file('picture')->move("img/", $fileName);
        }
        

        $soal = new Soal([
            'quiz_id'     => $request->input('quiz_id'),
            'pertanyaan'   => $request->input('pertanyaan'),
            'picture' => $fileName,
            ]);
        $soal->save();

        $id = $soal->id;
        $now = Carbon::now()->toDateTimeString();
        //dd($request->input('benar'));
        foreach($request->input('pilihan') as $key => $val){
             if($request->input('benar') == $key){
                 $benar=1;
             }else{
                 $benar=0;
             }
             //dd($benar);
            $data[]=array(
             'soal_id'=>$id,
             'isi'=>$val,
             'benar'=>$benar,
             'created_at'=> $now,
             'updated_at'=> $now,
             );
         }
         //dd($data);
         Jawaban::insert($data);    

        return redirect()->route('quiz.control',$request->input('quiz_id'));
    }

    public function start_quiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $now = Carbon::now();
        $user = Auth::user()->id;

        $quiz->load(array('soal' => function($q) {
        $user = Auth::user()->id;
        $q->orderByRaw("RAND(".$user.")");
        }));

        $anggota_kelas = Anggota_kelas::where([['kelas_id', '=', $quiz->materi->kelas_id],['user_id', '=', $user],])->first();

        $tanggal_mulai = Carbon::parse($quiz->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($quiz->tanggal_selesai);

        $sip = $now->between($tanggal_mulai, $tanggal_selesai);
        $disabled = "";
        $classdisabled = "";
        if($quiz->soal->count() == 0){
            $disabled = "disabled";
            $classdisabled = "btn-disabled";
        }
        $cek = Hasil_quiz::where([['quiz_id', '=', $quiz->id],['creator_id', '=', $anggota_kelas->id],])->first();
        
        if($cek != null && $cek->status == "Selesai dikerjakan"){
            $waktu_mulai = Carbon::parse($cek->waktu_mulai);
            $waktu_selesai = Carbon::parse($cek->waktu_selesai);
            $total_waktu = intval($cek->total_waktu / 60).":".intval($cek->total_waktu%60);
            
            return view('quiz.quiz_result', compact('cek','waktu_mulai', 'waktu_selesai', 'total_waktu', 'quiz'));
        }
        else{
            return view('quiz.quiz_attempt', compact('quiz', 'sip', 'tanggal_mulai', 'tanggal_selesai', 'disabled', 'classdisabled'));
        }
    }

    public function quiz_control($quiz_id){
        $quiz = Quiz::find($quiz_id);
        return view('quiz.control', compact('quiz'));
    }

    public function destroy_question($id){
        $soal = Soal::findOrFail($id);
        $qid = $soal->quiz_id;

        Soal::destroy($id);
        Jawaban::where('soal_id', '=', $id)->delete();
        return redirect()->route('quiz.control',$qid);
    }

    public function destroy($id){

        $quiz = Quiz::findOrFail($id);
        Quiz::destroy($id);

        return "<script>parent.location.reload();</script>";
    }

    public function result_all($quiz_id){
        $hasil = Result_all_quiz::where('quiz_id', '=', $quiz_id)->get();
        $quiz = Quiz::find($quiz_id);
        return view('quiz.quiz_result_all', compact('hasil', 'quiz'));
    }

    public function quiz_result_excel($quiz_id){    
        $quiz = Quiz::find($quiz_id);
        $hasil = Result_all_quiz::select('id','name','jumlah_benar', 'nilai', 'total_waktu')->where('quiz_id', '=', $quiz_id)->get();
        Excel::create('result_quiz-'.$quiz_id."-".$quiz->judul, function($excel) use($hasil) {
            $excel->sheet('Sheet 1', function($sheet) use($hasil) {
                $sheet->fromArray($hasil);
            });
        })->export('xlsx');
    }

    public function update_question($id, Request $request)
    {
        $fileName = "";
        $data = $request->all();

        if($request->file('picture')){
            $file       = $request->file('picture');
            $fileName   = $file->getClientOriginalName();
            $request->file('picture')->move("img/", $fileName);
        }
        $data['picture'] = $fileName;
        
        $soal = Soal::findOrFail($id);
        $qid = $soal->quiz_id;
        $soal->pertanyaan = $data['pertanyaan'];
        $soal->picture = $data['picture'];
        $soal->pertanyaan = $data['pertanyaan'];
        $soal->save();

        for($i=0; $i<5; $i++){
            $right = 0;
            if($data['benar'] == $i){
                $right = 1;
            }
            Jawaban::findOrFail($data['pilihan_id-'.$i])->update(['isi' => $data['pilihan_edit-'.$i], 'benar' => $right]);
        }

        return redirect()->route('quiz.control',$qid);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $quiz = Quiz::findOrFail($id);
        $quiz->update($data);

        return redirect()->route('quiz.control',$id);
    }


    public function findQuestion(Request $request)
    {
        $id = $request->id;

            $query = Soal::findOrFail($id);
            $jawaban[] = $query->jawaban;

            $results = array( 'id' => $query->id, 'pertanyaan' => $query->pertanyaan, 'quiz_id'=> $query->quiz_id, 
            'picture'=>$query->picture, 'jawaban'=>$jawaban);

        return \Response::json($results);
    }

    public function saveanswerquiz(Request $request)
    {
        //dd(json_decode($request->getContent(), true));
        // $id = $request->input('id');
        $id_hasil = $request->input('id_answer');
        $id_question =$request->input('id_question');
        $answer = $request->input('answer');
        $user = Auth::user()->id;

        $res = Hasil_quiz::find($id_hasil);
        
        $right = 0;

        if($id_hasil != null){
            $jawab = Jawaban_user::where([['hasil_id', '=', $id_hasil],['soal_id', '=', $id_question], ])->first();
            if($jawab){
            Jawaban_user::destroy($jawab->id);
        }
        }
        if($answer != null){
            $benar = Jawaban::find($answer);
                if($benar->benar == 1){
                    $right = 1;
                }

            $jawaban_user = new Jawaban_user([
            'creator_id' => $res->creator_id,
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
        }
        else{
            $results = array(
                'status' => "no_insert",
                );
        }

        return \Response::json($results);
    } 

    public function checkquiz(Request $request)
    {
        $id_quiz = $request->input('id_quiz');
        $quiz = Quiz::find($id_quiz);
        $user = Auth::user()->id;

        $anggota_kelas = Anggota_kelas::where([['kelas_id', '=', $quiz->materi->kelas_id],['user_id', '=', $user],])->first();

        $cek = Hasil_quiz::where([['quiz_id', '=', $id_quiz],['creator_id', '=', $anggota_kelas->id], ])->first();
        if($cek == null){
            $hasil = new Hasil_quiz([
                'creator_id' => $anggota_kelas->id,
                'quiz_id' => $id_quiz,
                'waktu_mulai' => Carbon::now(),
                'ip_address' =>request()->ip(),
                'user_agent' => $request->header('User-Agent'),
                ]);
            $hasil->save();
            $hid = $hasil->id;

            $query = Jawaban_user::where('hasil_id', '=', $hid)->get();
            $result = array();
            $now = Carbon::now();
            $hasil = Hasil_quiz::findOrFail($hid);
            $sisa_waktu = $hasil->quiz->durasi * 60;

            foreach($query as $item){
               $result[] = array('id_question' => $item->soal_id, 'answer' => $item->jawaban_id);
            }
            $results = array('id' => $hid, 'detail' => $result, 'sisa_waktu' => $sisa_waktu);
            //dd($results);
        }
        else{
            $hid = $cek->id;
            $query = Jawaban_user::where('hasil_id', '=', $hid)->get();
            $result = array();
            $now = Carbon::now();
            $hasil = Hasil_quiz::findOrFail($hid);
            $act_waktu = $now->diffInSeconds(Carbon::parse($hasil->waktu_mulai));
            $sisa_waktu = intval($hasil->quiz->durasi * 60) - intval($act_waktu);

            foreach($query as $item){
               $result[] = array('id_question' => $item->soal_id, 'answer' => $item->jawaban_id);
            }
            $results = array('id' => $hid, 'detail' => $result, 'sisa_waktu' => $sisa_waktu);
            //dd($results);
        }


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
        $hasil->nilai = intval($nilai);
        $hasil->waktu_selesai = $now;
        $hasil->total_waktu = $now->diffInSeconds($waktu_mulai);
        $hasil->status = "Selesai dikerjakan";
        $hasil->save();

        return \Response::json($hasil);
    }
}
