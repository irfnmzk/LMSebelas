@extends('layouts.app')
@section('content')
<div class="container-fluid">

                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card class-welcome">
                            <div class="row">
                                <div class="welcome-say">
                                <div class="card-icon-w">
                                    <i class="zmdi zmdi-home"></i>
                                </div>
                                <div class="title-w">Join A Class Today</div>
                                <div class="card-icon-y">
                                    <i class="zmdi zmdi-book"></i>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @if(Auth::user()->role == '1')
                        <div class="join-this-class">
                            <button class="btn btn-info" data-toggle="modal" data-target="#ModalBuat">BUAT</button>
                        </div>

                        <div class="modal fade example-modal-sm" id="ModalBuat" tabindex="-1" role="dialog" aria-labelledby="BuatKelas">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Buat Kelas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('kelas.store')}}" class="form-horizontal" >
                                                {{csrf_field()}}
                                                
                                                <input type="text" class="form-control" name="name" placeholder="Class Name"/>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-group form-button">
                                                <button type="submit" class="btn btn-fill btn-primary">Simpan</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @elseif(Auth::user()->role == '2')
                        <div class="join-this-class">
                            <button class="btn btn-info" data-toggle="modal" data-target="#ModalJoin">JOIN</button>
                        </div>
                        <div class="modal fade example-modal-sm" id="ModalJoin" tabindex="-1" role="dialog" aria-labelledby="BuatKelas">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Join Kelas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('kelas.join')}}" class="form-horizontal" >
                                                {{csrf_field()}}
                                                
                                                <input type="text" class="form-control" name="code" placeholder="Class Code"/>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-group form-button">
                                                <button type="submit" class="btn btn-fill btn-primary">Bergabung</button>
                                                </form>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        @foreach($kelas as $item)
                        <a href="{{ route('show.kelas', $item->id) }}">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card classes">
                                <img src="../assets/img/catfall.jpeg" />
                                <div class="card-footer">{{$item->name}}</div>
                            </div>
                        </div>
                        @endforeach
                        </a>
                        
                    </div>
                    
                </div>
@endsection