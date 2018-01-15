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

          @include('layouts.widgets.profile')

          @include('layouts.widgets.class')
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
              <form action="{{ route('setting.store') }}" method="post" class="horizntal-form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Gabung Ke kelas</h4>
              </div>
              <div class="modal-body">
                    {{ csrf_field() }}
                      <div class="form-group {{$errors->has('code')?'has-error':''}}">
                        <label for="email" class="col-sm-2 text-center">Kode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="kode kelas" name="code" value="">
                        </div>
                        <span class="help-block">{{$errors->first('code')}}</span>
                      </div><br>
                      <br>
              </div>
              <div class="modal-footer">
                <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Bergabung</button>
                </div>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection