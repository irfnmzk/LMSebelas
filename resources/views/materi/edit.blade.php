@extends('layouts.app') @section('content')
<div class="content">
                <div class="container-fluid">

                            <div class="card profile">
                                <!--div class="profpic profpic-data col-lg-12 col-md-12 col-sm-12">
                                    
                                    <img src="../assets/img/catfall.jpeg" class="avatar"/>
                                </div-->
                            <form class="form-horizontal" method="POST" action="{{route('materi.update', $materi->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                            <div class="col-lg-2 col-md-2">
                            
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="">
                                <div class="card-content">
                                    
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Judul</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="judul" value="{{$materi->judul}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Deskripsi</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <textarea name="deskripsi" class="summernote">{{ $materi->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-3 label-on-left">KKM</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="deskripsi" value="{{$materi->kkm}}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Nilai Tugas (%)</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="nilai_tugas" value="{{$materi->nilai_tugas}}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Nilai Quiz</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="nilai_quiz" value="{{$materi->nilai_quiz}}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-3 label-on-left"></label><b>Keterangan : Nilai Tugas dan Nilai Quiz saat Dijumlahkan harus berjumlah 100.</b>
                                        </div>
                                        
                                        <div class="row">
                                            <div class=" col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-info">SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2"></div>
                        </div>
                        </div>
                         </form>   
                    </div>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('.summernote').summernote({
        'height' : 100
    });
});
    
</script>
@endsection