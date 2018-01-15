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
                <h4><a href="asdas"><i class="fa fa-book"></i> Sebelas RPL 1 <b>(Administrator Kelas)</b></a></h4><hr>
                <h4><a href="asdas"><i class="fa fa-book"></i> Sebelas RPL 1 <b>(Anggota Kelas)</b></a></h4>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <p>Timeline kamu kosong silahkan bergabung ke kelas</p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Gabung Ke kelas</button>
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

    <div class="modal fade text-center" id="modal-default">
          <div class="modal-dialog" style="max-width: 300px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form action="{{ route('setting.store') }}" method="post" class="horizntal-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="isFirstTime" value="{{Auth::user()->active==0?'yes':'no'}}">
                      <div class="form-group {{$errors->has('name')?'has-error':''}}">
                        <label for="email" class="col-sm-2">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{Auth::user()->name}}">
                        </div>
                        <span class="help-block">{{$errors->first('name')}}</span>
                      </div><br>
                      <br>
              </div>
              <div class="modal-footer">
                <div class="col-md-12 text-center">
                <button type="button" class="btn btn-primary">Bergabung</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection