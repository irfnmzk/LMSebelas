@extends('layouts.app')
@section('content')
<div class="container-fluid">
        
                            <div class="card profile">
                            <div class="col-lg-12 col-md-12 col-sm-12 profile-cover">
                                <img src="{{ asset('assets/img/pencils-book.jpeg')}}" class="bgavatar"/>
                             
                            <div class="profile-photo">
                                    <img src="{{ $user->picture }}" alt="...">
                            </div>
                            <div class="profile-nickname">{{ $user->name}} </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="profile-identity">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="card-content">
                                <table class="profile-table table table-hover">
                                    <tbody>
                                        <tr><td><i style="color:#2678cc;" class="zmdi zmdi-account"></i> Full Name</td>
                                        <td>{{ $user->name}}</td></tr>
                                        <tr><td><i style="color:#f44;" class="zmdi zmdi-email"></i> Email</td>
                                        <td>{{ $user->email}}</td></tr>
                                        <tr><td><i style="color:#ff6022;" class="zmdi zmdi-cake"></i> Birthday</td>
                                        <td>May 20th 1996</td></tr>
                                        <tr><td><i style="color:#09bb90;" class="zmdi zmdi-face"></i> Role</td>
                                        <td>{{ ($user->role == '1')? 'Guru' : 'Siswa'  }}</td></tr>
                                        <tr><td><i style="color:#0b0;" class="zmdi zmdi-balance"></i> Sekolah</td>
                                        <td>{{ $user->sekolah}}</td></tr>
                                        <tr><td><i style="color:#33f;" class="zmdi zmdi-assignment-account"></i> Jurusan</td>
                                        <td>{{ $user->jurusan}}</td></tr>
                                    </tbody>
                                </table>
                                <a href="{{ url('/user/profile/edit') }}"><button class="btn btn-info" style="padding:5px 10px;"><i style="font-size:17px;margin:0 3px 0 0;" class="zmdi zmdi-edit"></i> Edit Your Profile</button></a>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card profile-side"><i>
                                    Lorem Ipsum Dolor Sit Amet. Lorem Ipsum is simply a dummy text.
                                </i></div>
                                </div>
                                </div>
                            </div>
                            </div>
                            
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card groups">
                                <div class="card-header">
                                    <i class="zmdi zmdi-accounts-alt" style="font-size:50px;color:#4b4;margin-right:20px;"></i><h4 class="card-title">Joined Class</h4>
                                </div>
                                <div class="card-content">
                                
                                <div class="row">

                                    <!-- Here are some group list -->
                                    @foreach($kelas as $item)
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="card group-list">
                                    <a href="#">
                                    <div class="group-img">
                                        <img src="../assets/img/study-book.jpeg" style="height:100%"/>
                                    </div>
                                    <div class="group-abt">
                                        <div id="group-name"><strong>{{ $item->name}}</strong></div>
                                        <div id="group-stat"><span><b>{{ $item->anggota_kelas->count() }}</b> Members</span></div>
                                    </div>
                                    </a>
                                    </div>
                                    </div>
                                    @endforeach
                                    
                                    
                                    
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
@endsection