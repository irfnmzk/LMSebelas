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
    <style>
        .no-js #loader {
            display: none;
        }
        
        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }
        
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ url('/assets/img/gif/preloader.gif')}}") center no-repeat #fff;
        }
        
        .ui-autocomplete {
            position: absolute;
            z-index: 1000;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        
        .ui-autocomplete > li {
            padding: 3px 20px;
        }
        
        .ui-autocomplete > li:hover {
            background-color: #C8DBEA;
        }
        
        .ui-autocomplete > li:focus {
            background-color: #C8DBEA;
        }
        
        .ui-autocomplete > li:active {
            background-color: #C8DBEA;
        }
        
        .ui-helper-hidden-accessible {
            display: none;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="detail-tugas">
            <div id="judul-tugas"></div>
            <div id="desc-tugas">
                <span class="deskripsi">
							<h3>{{ $tugas->judul }}</h3>
							<strong>oleh {{ $tugas->creator->user->name }}</strong>
							<p>{{$tugas->deskripsi}}</p>
							<span class="deadline">
							<strong>Deadline: <span>Jumat, 22 Februari 2091 - 10:00 a.m<span></strong>
							</span>
                </span>
            </div>
            <div class="upload-tugas">
                <form method="POST">
                    <input type="file" name="tugas" placeholder="Upload Tugas" />
                    <input type="submit" name="upload-tugas" value="Upload" />
                </form>
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

<!-- Dropzone js -->
<script src="{{ asset('assets/vendors/dropzone/dropzone.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.easy-autocomplete.min.js') }}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $(".se-pre-con").fadeOut("slow");
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        var options = {

            url: function(name) {
                return '{{ url('
                sekolah / find ') }}';
            },

            getValue: function(element) {
                return element.name;
            },

            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                    dataType: "json"
                }
            },

            preparePostData: function(data) {
                data.name = $("#q").val();
                return data;
            },

            list: {
                maxNumberOfElements: 7,
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