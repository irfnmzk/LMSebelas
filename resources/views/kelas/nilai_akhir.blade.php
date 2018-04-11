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
</head>
<body>
<div class="admin-banner">
                        <h3>Data Nilai Akhir Kelas</h3>
                    </div>
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 add-data-admin">
                        <a href="#"><button class="btn btn-primary" id="kembali">Kembali</button></a>
                    </div>
                </div>    
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <table class="table table-striped table-hover table-no-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th><th>Nama</th>
                                        @foreach($kelas->materi as $materi)
                                        @foreach($materi->tugas as $tugas)
                                        <th>Tugas : {{ $tugas->judul }}</th>
                                        @endforeach
                                        @foreach($materi->quiz as $quiz)
                                        <th>Quiz : {{ $quiz->judul }}</th>
                                        @endforeach
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kelas->anggota_kelas as $anggota_kelas)
                                   
                                    <tr>
                                        @if($anggota_kelas->user->role == 2)
                                        <td>{{$loop->iteration-1}}</td>
                                        <td>{{ $anggota_kelas->user->name }}</td>
                                        
                                        @foreach($kelas->materi as $materi)
                                            @foreach($materi->tugas as $tugas)
                                            <td>
                                                @foreach($anggota_kelas->jawaban_tugas as $jawaban_tugas)
                                                    @foreach($jawaban_tugas->nilai_tugas as $nilai_tugas)
                                                    @if($jawaban_tugas->tugas->id == $tugas->id)
                                                    {{ $nilai_tugas->nilai }}
                                                    @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            @endforeach
                                            @foreach($materi->quiz as $quiz)
                                            <td>
                                                @foreach($anggota_kelas->hasil_quiz as $hasil_quiz)
                                                    @if($hasil_quiz->quiz['id'] == $quiz->id)
                                                    {{ $hasil_quiz->nilai }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            @endforeach
                                        @endforeach
                                        @endif
                                        
                                    </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
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
<script src="{{ asset('assets/summernote/summernote-lite.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('assets/vendors/jquery.datatables.js') }}"></script>
<script type="text/javascript">
    $(".check-materi").click(function() {
      $("#btn-del-materi").attr("disabled", !this.checked);
    });
    $("#nilai_akhir").click(function() {
      document.location.href = "{{ url('nilai_akhir/'. $kelas->id) }}";
    });
    $("#kembali").click(function() {
      document.location.href = "{{ url('/form_materi/'.$kelas->id) }}";
    });
</script>