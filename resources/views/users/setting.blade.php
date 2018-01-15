@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        @if(Auth::user()->active == 1)
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Irfan Marzuki</h3>

              <p class="text-muted text-center">Ragnaboyx@gmail.com</p><hr>

              <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-gear"></i> Setting</b></a><br>
              <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-user"></i> Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Class List Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Daftar Kelas</h3>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Tambah Kelas</button>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        @endif    
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">{{Auth::user()->active==1?'Profil':'Lengkapi Profil Anda'}}</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <form action="{{ route('setting.store') }}" method="post" class="horizntal-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="isFirstTime" value="{{Auth::user()->active==0?'yes':'no'}}">
                      <div class="form-group {{$errors->has('name')?'has-error':''}}">
                        <label for="email" class="col-sm-2">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{Auth::user()->name}}">
                        </div>
                        <span class="help-block">{{$errors->first('name')}}</span>
                      </div>
                      <br>
                      <br>
                      <div class="form-group {{$errors->has('email')?'has-error':''}}">
                        <label for="email" class="col-sm-2">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" placeholder="Email" name="email" value="{{Auth::user()->email}}" readonly>
                        </div>
                        <span class="help-block">{{$errors->first('email')}}</span>
                      </div>
                      <br>
                      <br>
                      @if(Auth::user()->active != 1)
                      <div class="form-group {{$errors->has('email')?'has-error':''}}">
                        <label for="role" class="col-sm-2">Saya adalah</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="role">
                            <option value="" disabled selected>Pilih</option>
                            <option value="guru">Seorang guru</option>
                            <option value="siswa">Siswa</option>
                          </select>
                        </div>
                        <span class="help-block">{{$errors->first('sekolah')}}</span>
                      </div>
                      <br>
                      <br>
                      @endif
                      <div class="form-group {{$errors->has('sekolah')?'has-error':''}}">
                        <label for="email" class="col-sm-2">Asal Sekolah</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Sekolah" name="sekolah" value="{{Auth::user()->sekolah}}" >
                        </div>
                        <span class="help-block">{{$errors->first('sekolah')}}</span>
                      </div>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col-sm-8">
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                  </div>
                </div>

                
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
    @endsection