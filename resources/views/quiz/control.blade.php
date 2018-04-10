@extends('layouts.app')

@section('content')
<div class="content admin-content">
 <div class="container-fluid">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Mengelola Soal</h2>
                        <div class="card">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <!-- List Number -->
                                <h5>Nomor Soal</h5>
                                <div class="admin-list-number">
                                @foreach($quiz->soal as $list)
                                <a href='#' nomorsoal="{{$loop->iteration}}" idsoal="{{$list->id}}"><div class='col-lg-3 col-md-3 col-sm-4'><div class='card'>{{$loop->iteration}}</div></div></a>
                                @endforeach
                                
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                
                                <button class="card-finish" id="more-number" @if($quiz->soal->count() < $quiz->jumlah_soal)disabled @endif>&plus;
                                </button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <br/>
                                    <br/>
                                    <br/>
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-8 col-md-8 col-sm-6">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            
                            <div class="form-group label-floating">
                                    <label class="control-label">Judul Quiz</label>
                                    <input readonly type="text" class="form-control" value="{{ $quiz->judul }}" placeholder="Judul">
                                </div>
                                
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                Jumlah Maks Pertanyaan : <span>{{$quiz->jumlah_soal}}</span>
                            </div>
                            
                            @foreach($quiz->soal as $soal)
                            <form method="POST" id="del_quiz" action="{{ url('/delete_question/' . $soal->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                            <form method="POST" id="form_edit_soal" action="{{ route('question.update', $soal->id) }}" class="form-horizontal form_soal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-12 col-md-12 col-sm-12 soal-{{ $loop->iteration }} soal-quiz" style="display: none;">
                            <button form="del_quiz" class="btn btn-sm btn-danger" title="Delete soal" onclick="return confirm(&quot;Hapus Soal Ini?&quot;)"><i class="material-icons">close</i>Hapus Soal</button>
                                <div class="card">
                                    @if(!empty($soal->picture))
                                        <div class="col-lg-12 col-md-12 col-sm-12" id="q-image"><img src="{{ asset('img/'.$soal->picture) }}"></div>
                                    @endif
                                </div>
                                
                                    
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Pertanyaan</label>
                                    <div class="form-group label-floating">
                                        <textarea class="form-control pertanyaan" name="pertanyaan">{{ $soal->pertanyaan }}</textarea>
                                    </div>
                                </div>
                                    
                                    <!-- MC -->
                                    <div class="multiple-choice-type">
                                    
                                    @foreach($soal->jawaban as $jawaban)
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                        <input type="radio" id="benar_edit-{{$loop->iteration-1}}" name="benar" value="{{$loop->iteration-1}}" @if($jawaban->benar == 1) checked @endif >
                                        </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <input type="hidden" name="pilihan_id-{{$loop->iteration-1}}" id="pilihan_id-{{$loop->iteration-1}}" value="{{ $jawaban->id }}">
                                        <input type="text" class="form-control" id="pilihan_edit-{{$loop->iteration-1}}" name="pilihan_edit-{{$loop->iteration-1}}" placeholder="Pilihan {{$loop->iteration}}" value="{{ $jawaban->isi }}" required>
                                    </div>
                                    @endforeach
                                    
                                    <br/>
                                    
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <br/>
                                    </div>
                            </div>
                            </form>
                            @endforeach
                            <form method="POST" action="{{route('question.store')}}" class="form-horizontal form_soal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-12 col-md-12 col-sm-12 soal-quiz tambah-soal" style="display: none;">
                                <div class="card">
                                    
                                </div>
                                <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                                    
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Pertanyaan</label>
                                    <div class="form-group label-floating">
                                        <textarea class="form-control pertanyaan" name="pertanyaan"></textarea>
                                    </div>
                                </div>
                                    
                                    <!-- MC -->
                                    <div class="multiple-choice-type">
                                    
                                    @for($i=1; $i<=5; $i++)
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                        <div class="radio">
                                        <label>
                                        <input type="radio" name="benar" value="{{$i-1}}" @if($i==1) checked @endif >
                                        </label>
                                        </div>
                                        </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <input type="text" class="form-control" id="pilihan" name="pilihan[]" placeholder="Pilihan {{$i}}" required>
                                    </div>
                                    @endfor
                                    
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <br/>
                                    </div>
                            </div>
                            </form>
                            
                            
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.pertanyaan').summernote({
            height: 100,
            tabsize: 2,
            placeholder: "Pertanyaan"
        });
        $('.dropdown-toggle').dropdown();
        
    });

    current = 0;
    $(".admin-list-number a").click(function(){
                    $(".admin-list-number a").removeClass("active");
                    $(this).addClass("active");
                    $(".soal-quiz").slideUp('fast');
                    current = $(this).attr("nomorsoal");
                    $(".soal-"+current).slideToggle('fast');
            });
    $("#more-number").click(function(){
                    $(".admin-list-number a").removeClass("active");
                    $(".soal-quiz").slideUp('fast');
                    current = 0;
                    $(".tambah-soal").slideDown('fast');
            });
</script>

@endsection
