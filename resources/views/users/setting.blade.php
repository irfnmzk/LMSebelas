@extends('layouts.app') @section('content')

<div class="content">
    <div class="container-fluid">
           <!-- <form method="POST" class="profile-photo-cover">
                <div class="col-lg-12 col-md-12 col-sm-12 profile-cover">
                    <img src="../assets/img/photocovercat.jpg" class="bgavatar" />

                    <div class="fileinput fileinput-new text-center profile-photo" data-provides="fileinput">
                        <div class="fileinput-new thumbnail before-input">
                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail after-input"></div>
                        <span class="btn btn-file">
                  <span class="fileinput-new"><i class="zmdi zmdi-plus"></i></span>
                        <span class="fileinput-exists photo-edit"><i class="zmdi zmdi-settings"></i></span>
                        <input type="file" name="photoProfile" />
                        </span>
                        <a href="#pablo" class="btn fileinput-exists cancel-upload" data-dismiss="fileinput">&times;</a>
                    </div>
            </form>
            </div> -->
            <div class="row">
                <div class="col-lg-2 col-md-2">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card profile">
                        <form method="POST" action="{{route('setting.store')}}" class="form-horizontal">
                          {{csrf_field()}}
                            <div class="card-header card-header-text text-center">
                                <h4 class="card-title">Biodata</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">No Identitas</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" value="" name="no_identitas">
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Nama</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" value="{{ $user->name or '' }}" name="name">
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Sekolah</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <!-- <select id="select2" class="form-control select2" name="sekolah">
                                            
                                            </select> -->

                                            <input type="text" class="form-control" id="q" name="sekolah">

                                            <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jurusan</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" placeholder="Nama Jurusan" name="jurusan">
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Saya adalah</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="select">
                                                <select class="form-control" name="role">
                                                  <option disabled selected>Select an Option</option>
                                                  <option value="1">Guru</option>
                                                  <option value="2">Siswa</option>
                                                </select>
                                            </div>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="pull-right">
                                        <div class="form-group form-button" style="padding-right: 30px;">
                                            <button type="submit" class="btn btn-fill btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection