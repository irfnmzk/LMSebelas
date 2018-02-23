<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.html" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/turbo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="{{ asset('assets/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
  <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ url('/assets/img/gif/preloader.gif')}}") center no-repeat #fff;
        }
    body {
      background: url('{{ asset('assets/img/pencils-book.jpeg') }} ');
      background-size: cover;
      overflow: hidden;
    }
    .title {
      width: 100%;
      padding: 30px 50px;
      font-size: 25px;
      color: #eee;
      font-weight: 100;
      font-family: catamaran;
    }
    .forms {
      background: rgba(255,255,255,0.7);
      width: 30%;
      display: block;
      margin: auto;
      text-align: center;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
      color: #444;
    }
    .form-1 i, .form-2 i {
      font-size: 30px;
      margin-right: 10px;
      color: #555;
      transition: 0.2s;
    }
    .form-1, .form-2 {
      display: block;
      margin: 10px 0;
    }
    form input:focus i{
      color: #2678cc;
    }
    form input {
      background: transparent;
      border: none;
      border-bottom: 2px solid #666;
      color: #555;
      padding: 5px;
      margin-top: -10px;
      transition: 0.2s;
    }
    form input:focus {
      border-bottom: 2px solid #2678cc;
    }
    form input::-webkit-input-placeholder {
      color: #444;
    }
    form button {
      background: #36f;
      border: none;
      padding: 10px 40px;
      color: #fff;
      font-size: 15px;
      text-transform: uppercase;
      font-weight: 100;
      border-radius: 4px;
      margin: 10px;
      transition: 0.2s;
    }
    form button:hover {
      box-shadow: 0 0 10px rgba(0,0,0,0.25);
    }
    .forms a:hover {
      text-decoration: underline;
    }
    .forms b {
      color: #555;
    }
    .social-media {
      margin-bottom: 20px; 
    }
    .social-media i {
      font-size: 20px;
      background: #555;
      color: #eee;
      width: 30px;
      height: 30px;
      padding: 5px;
      border-radius: 4px;
      margin: 0 5px;
      transition: 0.2s;
    }
    .social-media a i.zmdi-facebook:hover {
      background: #44b;
    }
    .social-media a i.zmdi-google-plus:hover {
      background: #d44;
    }
    .social-media a i.zmdi-twitter:hover {
      background: #4dd;
    }
    .forms span.or:before,
    .forms span.or:after {
      content: "-------------------";
    }
    .forms span.or {
      margin: 10px;
      color: #888;
      font-size: 12px;
    }
  </style>
</head>

<body>
<div class="se-pre-con"></div>
    <div class="wrapper">
    <div class="title">L-Even</div>
    <div class="content">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="forms">
        <div class="form-title"><h4>Login With</h4></div>
        <div class="social-media">
          <a href="{{ url('login/facebook') }}"><i class="zmdi zmdi-facebook socmed"></i></a>
          <a href="{{ url('login/google') }}"><i class="zmdi zmdi-google-plus socmed"></i></a>
          <a href="{{ url('login/twitter') }}"><i class="zmdi zmdi-twitter socmed"></i></a>
        </div>
        <span class="or"> OR </span>
        <form method="POST" action="{{route('login')}}">
          <h4>Leven Account</h4>
          {{csrf_field()}}
          <div class="form-1"><i class="zmdi zmdi-face"> </i><input type="text" name="email" placeholder="Username"/></div>
          <div class="form-2"><i class="zmdi zmdi-lock"> </i><input type="password" name="password" placeholder="Password"/></div>
          <button type="submit" name="submit">Login</button>
        </form>
        <b>Create New Account ?</b><a href="#"><div class="regist"> Register </div></a>
      </div>
      </div>
    </div>
  </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/vendors/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('assets/vendors/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('assets/vendors/moment.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/chartjs/Chart.min.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('assets/vendors/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/vendors/bootstrap-notify.js') }}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{ asset('assets/vendors/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin -->
<script src="{{ asset('assets/vendors/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin -->
<script src="{{ asset('assets/vendors/nouislider.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAurmSUEQDwY86-wOG3kCp855tCI8lHL-I"></script>
<!-- Select Plugin -->
<script src="{{ asset('assets/vendors/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('assets/vendors/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('assets/vendors/sweetalert2.js') }}"></script>
<!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('assets/vendors/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('assets/vendors/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('assets/vendors/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('assets/js/turbo.js') }}"></script>

<script src="{{ asset('assets/js/charts/flot-charts.js') }}"></script>
<script src="{{ asset('assets/js/charts/chartjs-charts.js') }}"></script>

<script type="text/javascript">
    $(window).on('load', function(){
            $(".se-pre-con").fadeOut("slow");
        });
</script>

</html>