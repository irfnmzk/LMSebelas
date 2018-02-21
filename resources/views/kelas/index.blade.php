@extends('layouts.app')
@section('content')
<div class="container-fluid">

                    <div class="row">

                        @if(Auth::user()->role == '1')
                        <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="join-this-class">
                            <button class="btn btn-info join-class" data-toggle="modal" data-target="#ModalBuat"><i class="zmdi zmdi-home"></i> Buat Kelas</button>
                        </div>
                        </div>
                        <div class="col-lg-7 col-md-6"></div>

                        <div class="modal fade example-modal-sm" id="ModalBuat" tabindex="-1" role="dialog" aria-labelledby="BuatKelas">
                                    <div class="col-lg-12 col-md-12 col-sm-12 enroll-page">
                                        <div class="card input-enroll-code">
                                            <form method="POST" action="{{route('kelas.store')}}"><span class="close" data-dismiss="modal">&times;</span>
                                            {{csrf_field()}}
                                                <div class="form-group">
                                                    <input type="text" class="form-controll" name="name" placeholder="Class Name"/>
                                                    <button class="btn pull-right" type="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                </div>

                        @elseif(Auth::user()->role == '2')
                        <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="join-this-class">
                            <button class="btn btn-info join-class" data-toggle="modal" data-target="#ModalJoin"><i class="zmdi zmdi-home"></i> Join Kelas</button>
                        </div>
                        </div>
                        <div class="col-lg-7 col-md-6"></div>

                        <div class="modal fade example-modal-sm" id="ModalJoin" tabindex="-1" role="dialog" aria-labelledby="JoinKelas">
                                    <div class="col-lg-12 col-md-12 col-sm-12 enroll-page">
                                        <div class="card input-enroll-code">
                                            <form method="POST" action="{{route('kelas.join')}}"><span class="close" data-dismiss="modal">&times;</span>
                                            {{csrf_field()}}
                                                <div class="form-group">
                                                    <input type="text" class="form-controll" name="code" placeholder="Class Code" maxlength="6" />
                                                    <button class="btn pull-right" type="submit">Bergabung</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                </div>

                        @endif


                        <div class="col-lg-12 col-md-12 col-sm-12">
                        @foreach($kelas as $item)
                            <a href="{{ route('show.kelas', $item->id) }}">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card classes">
                                    <img src="../assets/img/catfall.jpeg" />
                                <div class="card-footer">{{$item->name}}</div>
                                </div>
                            </div>
                            </a>
                        @endforeach
                        </div>
                        
                    </div>
                    
                </div>
@endsection