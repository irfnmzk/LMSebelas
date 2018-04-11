@extends('layouts.app') @section('content')
<style>
    .portofolio-card-data {
        position: relative;
        background-size: cover
        color: #fff;
        border-radius: 4px;
    }
    .portofolio-card-data h3,
    .portofolio-card-data h5 {
        margin: 5px 0;
    }
    .portofolio-card-data img.p-avatar {
        width: 125px;
        height: 125px;
        border-radius: 50%;
        box-shadow: 1px 1px 7px rgba(0,0,0,0.5);
        margin: 10px 0;
    }
    .portofolio-socmed {
        margin: 10px;
    }
    .portofolio-socmed a:first-child {
        margin-left: 0;
    }
    .portofolio-socmed a i {
        /*box-shadow: 1px 1px 7px rgba(0,0,0,0.5);*/
    }
    .portofolio-socmed a {
        font-size: 30px;
        margin: 0 20px;
        color: #fff;
    }
    .portofolio-content {
        position: relative;
        height: 100%;
        padding: 25px 50px;
        background: linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0));
        background: -webkit-linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0));
        background: -moz-linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0));
        background: -o-linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0));
        z-index: 10;
    }
    .portofolio-background {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    .portofolio-background img {
        width: 100%;
        height: 100%;
        z-index:0;
    }
</style>
<div class="container-fluid">

    <div class="row">
        <!--div class="col-lg-9 col-md-12 col-sm-12">
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
        </div-->

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card portofolio-card-data">
                <div class="portofolio-content col-lg-7 col-md-7 col-sm-12">
                <h5>Welcome</h5>
                <img class="p-avatar" src="{{ Auth::user()->picture }}" onerror="this.src='{{ asset('assets/img/placeholder.jpg')}}'" class="front" />
                <h3>{{ Auth::user()->name }}</h3>
                <h6>@if(Auth::user()->role == 1) Guru @elseif(Auth::user()->role== 2) Siswa @else Admin @endif</h6>
                <div class="portofolio-socmed">
                    <a href="#"><i class="zmdi zmdi-facebook-box"></i></a>
                    <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                    <a href="#"><i class="zmdi zmdi-google-plus-box"></i></a>
                    <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                </div>
                </div>
                <div class="portofolio-background">
                    <img class="p-bg" src="{{ asset('assets/img/study-book.jpeg')}}" class="back" />
                </div>
                <!--div class="index-avatar">
                    <h2>Welcome</h2>
                    <!--img src="{{ asset('assets/img/study-book.jpeg')}}" class="back" /->
                    <img src="{{ Auth::user()->picture }}" onerror="this.src='{{ asset('assets/img/placeholder.jpg')}}'" class="front" />
                <!--/div>
                <div class="index-nickname">{{ Auth::user()->name }}</div>
                <div class="index-portofolio">
                    <a href="#"><i class="zmdi zmdi-facebook-box"></i></a>
                    <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                    <a href="#"><i class="zmdi zmdi-google-plus-box"></i></a>
                    <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                </div-->
            </div>
        </div>

    </div>
</div>
@endsection