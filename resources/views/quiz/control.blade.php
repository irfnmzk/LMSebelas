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
                                <a href='#'><div class='col-lg-3 col-md-3 col-sm-4'><div class='card'>{{$loop->iteration}}</div></div></a>
                                @endforeach
                                
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                
                                <div class="card-finish" id="more-number">&plus;
                                </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button class="btn btn-primary pull-left">Previous</button>
                                    <button class="btn btn-info pull-right">Next</button>
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
                                Jumlah Maks Pertanyaan : <span>{{$quiz->soal->count()}}</span>
                            </div>
                            
                            @foreach($quiz->soal as $soal)
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    @if(!empty($soal->picture))
                                        <div class="col-lg-12 col-md-12 col-sm-12" id="q-image"><img src="{{ asset('img/'.$soal->picture) }}"></div>
                                    @endif
                                </div>
                                
                                    
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Pertanyaan</label>
                                    <div class="form-group label-floating">
                                        <textarea class="form-control" id="pertanyaan">{{ $soal->pertanyaan }}</textarea>
                                    </div>
                                </div>
                                    
                                    <!-- MC -->
                                    <div class="multiple-choice-type">
                                    
                                    @foreach($soal->jawaban as $jawaban)
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                        <input type="radio" name="benar" value="{{$loop->iteration-1}}" @if($jawaban->benar == 1) checked @endif style="display:inline">
                                        </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <input type="text" class="form-control" id="pilihan" name="pilihan[]" placeholder="Pilihan {{$loop->iteration}}" value="{{ $jawaban->isi }}" required>
                                    </div>
                                    @endfor
                                    
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
                            
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#pertanyaan').summernote({
            height: 100,
            tabsize: 2,
            placeholder: "Pertanyaan"
        });
        $('.dropdown-toggle').dropdown();
        
    });
</script>

@endsection