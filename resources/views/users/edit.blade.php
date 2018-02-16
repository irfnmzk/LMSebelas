@extends('layouts.app') @section('content')
<div class="content">
                <div class="container-fluid">

                            <div class="card profile">
                                <!--div class="profpic profpic-data col-lg-12 col-md-12 col-sm-12">
                                    
                                    <img src="../assets/img/catfall.jpeg" class="avatar"/>
                                </div-->
                            <form class="form-horizontal" method="POST" action="{{route('profile.update')}}">
                            {{csrf_field()}}

                            <div class="col-lg-12 col-md-12 col-sm-12 profile-cover">
                                <img src="{{url('assets/img/pencils-book.jpeg')}}" class="bgavatar"/>
                                
                            <div class="fileinput fileinput-new text-center profile-photo" data-provides="fileinput">
                                <div class="fileinput-new thumbnail before-input">
                                    <img src="{{$user->picture}}" alt="...">
                                </div>
                                <!-- <div class="fileinput-preview fileinput-exists thumbnail after-input"></div>
                                <span class="btn btn-file">
                                    <span class="fileinput-new"><i class="zmdi zmdi-plus"></i></span>
                                    <span class="fileinput-exists photo-edit"><i class="zmdi zmdi-settings"></i></span>
                                    <input type="file" name="picture"/>
                                </span>
                                <a href="#pablo" class="btn fileinput-exists cancel-upload" data-dismiss="fileinput">&times;</a> -->
                            </div>
                            
                            </div>
                            <div class="row">
                            <div class="col-lg-2 col-md-2">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="">
                                <div class="card-content">
                                    
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">No Identitas</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="no_identitas" value="{{$user->no_identitas}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Nama</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="nama" value="{{$user->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Sekolah</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" id="q" class="form-control datepicker" name="sekolah" value="{{$user->sekolah}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Jurusan</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="jurusan" value="{{$user->jurusan}}">
                                                </div>
                                            </div>
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