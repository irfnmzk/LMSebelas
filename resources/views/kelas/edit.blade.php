@extends('layouts.app') @section('content')
<div class="content">
                <div class="container-fluid">

                            <div class="card profile">
                                <!--div class="profpic profpic-data col-lg-12 col-md-12 col-sm-12">
                                    
                                    <img src="../assets/img/catfall.jpeg" class="avatar"/>
                                </div-->
                            <form class="form-horizontal" method="POST" action="{{route('kelas.update', $kelas->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="col-lg-12 col-md-12">
                            <h3 style="text-align:center;margin: 20px 0 0 0;">Edit Kelas</h3>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="">
                                <div class="card-content">
                                    
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Nama Kelas</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="name" value="{{$kelas->name}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Deskripsi</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <textarea name="deskripsi" class="summernote">{{ $kelas->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                        
                            <legend>Class Image</legend>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ asset('assets/img/image_placeholder.jpg') }}"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="..." />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:left;">
                            <button class="btn btn-info"><i class="zmdi zmdi-save"></i> SIMPAN</button>
                            <p></p>
                        </div>
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