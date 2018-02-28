@extends('layouts.app') @section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9 col-md-6 col-sm-12">
            <div class="card timeline-card timeline-write">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="profpic-user-timeline"><img src="{{ Auth::user()->picture }}" onerror="this.src='{{ asset('assets/img/placeholder.jpg')}}'" /></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="content-timeline">
                        <h3>Welcome Back, {{ strtok(Auth::user()->name, " ") }}!</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card portofolio-card">
                <div class="index-avatar">
                    <img src="{{ asset('assets/img/study-book.jpeg')}}" class="back" />
                    <img src="{{ Auth::user()->picture }}" onerror="this.src='{{ asset('assets/img/placeholder.jpg')}}'" class="front" />
                </div>
                <div class="index-nickname">{{ Auth::user()->name }}</div>
                <div class="index-portofolio">
                    <a href="#"><i class="zmdi zmdi-facebook-box"></i></a>
                    <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                    <a href="#"><i class="zmdi zmdi-google-plus-box"></i></a>
                    <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection