<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.html') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>L-even</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/turbo.css') }}" rel="stylesheet" />
    <!-- Jquery UI CSS    -->
    <link href="{{ asset('assets/vendors/jquery-ui-1.12.0/jquery-ui.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="{{ asset('assets/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- Dropzone CSS -->
    <link href="{{ asset('assets/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('assets/css/easy-autocomplete.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.css') }}" rel="stylesheet">
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

    </style>

</head>

<body>
    <div class="se-pre-con"></div>
    
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="{{ url('dashboard') }}" class="simple-text">
                    <i class="zmdi zmdi-boat" style="font-size:40px;color:#2678ff;"></i>
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="{{ url('dashboard') }}" class="simple-text">
                    <i class="zmdi zmdi-boat" style="font-size:30px;color:#2678ff;"></i>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <i class="zmdi zmdi-nature-people"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    @if(Auth::user()->active == 1)
                    <li>
                        <a href="{{ url('classroom') }}">
                            <i class="zmdi zmdi-home"></i>
                            <p>Classroom</p>
                        </a>
                    </li>
                    <li>
                        <a href="group.html">
                            <i class="zmdi zmdi-accounts-alt"></i>
                            <p>Group</p>
                        </a>
                    </li>
                    <li>
                        <a href="course.html">
                            <i class="zmdi zmdi-book"></i>
                            <p>Courses</p>
                        </a>
                    </li>
                    <li>
                        <a href="enroll.html">
                            <i class="zmdi zmdi-card"></i>
                            <p>Enroll Code</p>
                        </a>
                    </li>
                    @endif


                    <!--li>
                        <a data-toggle="collapse" href="#layouts" class="collapsed" aria-expanded="false">
                            <i class="material-icons">aspect_ratio</i>
                            <p>Layouts
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="layouts" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="layouts/boxed-layout.html">Box Layout</a>
                                </li>
                                <li>
                                    <a href="layouts/compact-menu.html">Compact Menu</a>
                                </li>
                                <li>
                                    <a href="layouts/horizontal-menu.html">Horizontal Menu</a>
                                </li>
                                <li>
                                    <a href="layouts/rtl-layout.html">RTL</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    -->
                </ul>

            </div>
            
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-absolute" data-topbar-color="blue">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
              <i class="material-icons visible-on-sidebar-regular f-26 zmdi zmdi-chevron-left"></i>
                            <i class="material-icons visible-on-sidebar-mini f-26 zmdi zmdi-chevron-right"></i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Home </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="zmdi zmdi-notifications" style="font-size:25px;"></i>
                                    <span class="notification" style="border-radius:50%;">6</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">You have 5 new messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Mike</a>
                                    </li>
                                    <li>
                                        <a href="#">Wish Mary on her birthday!</a>
                                    </li>
                                    <li>
                                        <a href="#">5 warnings in Server Console</a>
                                    </li>
                                    <li>
                                        <a href="#">Jane completed 'Induction Training'</a>
                                    </li>
                                    <li>
                                        <a href="#">'Prepare Marketing Report' is overdue</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--i class="zmdi zmdi-account-circle" style="font-size:25px;"></i-->
                                    <div class="profile-picture"><img src="{{ Auth::user()->picture }}" /></div>
                                    <span class="caret" style="margin-top:-15px;"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('user/profile') }}"><i class="zmdi zmdi-account" style="font-size:20px;margin-right:10px;"></i><span>Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-settings" style="font-size:20px;margin-right:10px;"></i><span>Settings</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="zmdi zmdi-power" style="font-size:20px;margin-right:10px;"></i><span>Logout</span></a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="//www.iubenda.com/privacy-policy/87368183" title="Privacy Policy">Privacy Policy</a>
                                <script type="text/javascript">
                                    (function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);
                                </script>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;


                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Leven</a> Learning Management System


                    </p>
                </div>
            </footer>
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

<!-- Dropzone js -->
<script src="{{ asset('assets/vendors/dropzone/dropzone.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('assets/summernote/summernote-lite.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function(){
            $(".se-pre-con").fadeOut("slow");
        });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        var options = {

            url: function (name) {
                return '{{ url('sekolah/find') }}';
            },

            getValue: function (element) {
                return element.name;
            },

            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                    dataType: "json"
                }
            },

            preparePostData: function (data) {
                data.name = $("#q").val();
                return data;
            },

            list: {
                maxNumberOfElements: 5,
                match: {
                    enabled: true
                },
                showAnimation: {
                    type: "slide", //normal|slide|fade
                    time: 400,
                    callback: function() {}
                },

                hideAnimation: {
                    type: "slide", //normal|slide|fade
                    time: 400,
                    callback: function() {}
                }
            },

            placeholder: "Nama Sekolah "
        };
        $("#q").easyAutocomplete(options);
        
});
</script>
@yield('script')

</html>