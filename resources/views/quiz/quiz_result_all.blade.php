<head>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/turbo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="{{ asset('assets/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('assets/css/easy-autocomplete.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.css') }}" rel="stylesheet">
    <style type="text/css">
    body {
    	overflow-y: scroll; 
    }
    </style>
</head>

<body>
<div class="row">
        <div class="col-md-12">
            <div class="card" style="position: relative;">
                <div class="card-content">
                    <h4 class="card-title">Hasil dari Quiz : {{ $quiz->judul }}</h4><br>
                    <a href="{{ url('/quiz_result_excel/'.$quiz->id ) }}" class="btn btn-success btn-sm" title="Cetak Hasil">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Cetak Excel
                        </a>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama</th>
                                    <th>Jumlah Benar</th>
                                    <th>Nilai</th>
                                    <th>Total Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($hasil as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->jumlah_benar }}</td>
                                    <td>{{ $item->nilai }}</td>
                                    <td>{{ $item->total_waktu }} Detik</td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="footer" style="padding-bottom: 50px;">
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
<script src="{{ asset('assets/summernote/summernote-lite.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('assets/vendors/jquery.datatables.js') }}"></script>
<script type="text/javascript">
	@include('quiz/quiz_js')
</script>