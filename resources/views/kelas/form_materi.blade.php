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

<a href="#"><button class="btn btn-info" id="nilai_akhir">Lihat Data Nilai Akhir</button></a> &nbsp;
                    <form method="POST" action="{{ route('materi.destroy') }}" id="del_materi" style="display:inline">
                                {{ csrf_field() }}
                                <button disabled id="btn-del-materi" class="btn btn-danger btn-hover" title="Delete" onclick="return confirm(&quot;Yakin Hapus Materi-Materi yg dipilih?&quot;)">Hapus</button>
                    </form>
                        
                        @foreach($kelas->materi as $materi)
                        <div class="card">
                            <div class="card timeline-card timeline-others" id="comment-{{$loop->iteration}}">
                            
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="content-timeline">
                                <div class="pull-right"><a href="{{ route('materi.edit',$materi->id) }}" class="btn btn-sm btn-info btn-hover">Edit</a> &nbsp;
                                <input type="checkbox" class="check-materi" name="checked[]" value="{{ $materi->id}}" form="del_materi"/></div>
                                <div class="username-timeline">{{$loop->iteration}}. {{ $materi->judul}}</div>
                                <br/>
                                <div class="text-content-timeline" id="text-content-timeline-{{$loop->iteration}}">
                                <ol>
                                @foreach($materi->modul as $modul)
                                    <li>
                                        {{ $modul->judul }}                              
                                        <div class="pull-right">
                                        <form id="destroy_modul" method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <a href="#" class="text-danger" onclick="return confirm(&quot;Hapus Modul {{ $modul->judul }}?&quot;)">
                                            <i class="zmdi zmdi-delete"></i> Hapus</a>
                                        </form>
                                        </div>
                                    </li>
                                @endforeach
                                @foreach($materi->tugas as $tugas)
                                    <li>
                                        Tugas : {{ $tugas->judul }}                               
                                        <div class="pull-right">
                                            <a data-toggle="modal" data-target="#TaskControl-{{ $tugas->id }}"><i class="zmdi zmdi-edit"></i> Edit</a> &nbsp;
                                            <form method="POST" action="{{ route('task.destroy', $tugas->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                            <a href="#" class="text-danger" onclick="return confirm(&quot;Hapus Tugas : {{$tugas->judul}}?&quot;)"><i class="zmdi zmdi-delete"></i> Hapus</a>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                                @foreach($materi->quiz as $quiz)
                                    <li>
                                        Quiz : {{ $quiz->judul }}                               
                                        <div class="pull-right">
                                            <a data-toggle="modal" data-target="#EditQuiz-{{ $quiz->id }}"><i class="zmdi zmdi-edit"></i> Edit</a> &nbsp;
                                            <form method="POST" action="{{ route('quiz.destroy', $quiz->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                            <a href="#" class="text-danger" onclick="return confirm(&quot;Hapus Quiz : {{$quiz->judul}}?&quot;)"><i class="zmdi zmdi-delete"></i> Hapus</a>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                                </ol>
                                </div>
                                <div class="responds-timeline responds-timeline-guru">
                                    <a data-toggle="modal" data-target="#TambahModul-{{ $materi->id }}"><button class="btn btn-danger">Tambah Modul</button></a>
                                    <a data-toggle="modal" data-target="#TambahQuiz-{{ $materi->id }}"><button class="btn btn-default">Tambah Quiz</button></a>
                                    <a data-toggle="modal" data-target="#TambahTugas-{{ $materi->id }}"><button class="btn btn-warning">Tambah Tugas</button></a>
                                </div>
                                </div>
                                </div>
                                </div>
                        </div>
                        @endforeach
                        
                        <a href="#"><button class="btn btn-info" data-toggle="modal" data-target="#TambahMateri">Buat Materi</button></a>


<div class="modal fade" id="TambahMateri" tabindex="-1" role="dialog" aria-labelledby="TambahMateri">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Materi</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('materi.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{ $kelas->id }}" name="kelas_id">

                    <div class="form-group label-floating">
                        <label class="control-label">Judul</label>    
                        <input type="text" class="form-control" name="judul" placeholder="Judul"/>
                    </div>
                    Deskripsi
                    <textarea class="form-control deskripsi" name="deskripsi" placeholder="Deskripsi" cols="20" rows="3"></textarea>

                    <div class="form-group label-floating">
                        <label class="control-label">KKM</label>    
                       <input type="number" class="form-control" name="kkm" placeholder="KKM"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nilai Tugas</label>    
                       <input type="number" class="form-control" name="nilai_tugas" placeholder="Nilai Tugas (%)"/> 
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nilai Quiz</label>    
                       <input type="number" class="form-control" name="nilai_quiz" placeholder="Nilai Quiz (%)"/>
                    </div>
                    
                    <b>Keterangan : nilai tugas dan quiz saat dijumlahkan harus 100 %</b>
                    
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

    @foreach($kelas->materi as $materi)
    <div class="modal fade" id="TambahTugas-{{ $materi->id }}" tabindex="-1" role="dialog" aria-labelledby="TambahTugas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Tugas</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('tugas.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{ $kelas->id }}" name="kelas_id">
                    <input type="hidden" value="{{ $materi->id }}" name="materi_id">
                    <div class="form-group label-floating">
                        <label class="control-label">Judul</label>    
                       <input type="text" class="form-control" name="judul" placeholder="Judul"/>
                    </div>
                    Deskripsi
                    <textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" placeholder="Deskripsi" cols="20" rows="3"></textarea>
                    <div class="form-group label-floating">
                        <label class="control-label">Deadline</label>    
                       <input id="deadline" type="date" class="form-control" name="deadline" placeholder="deadline">
                    </div>
                    
                    
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
    

    <div class="modal fade" id="TambahModul-{{ $materi->id }}" tabindex="-1" role="dialog" aria-labelledby="TambahModul">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Modul</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('modul.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    
                    <input type="hidden" value="{{ $materi->id }}" name="materi_id">
                    <div class="form-group label-floating">
                        <label class="control-label">Judul</label>    
                       <input type="text" class="form-control" name="judul" placeholder="Judul"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">File</label>    
                       <input name="link" type="file"/>
                    </div>
                    
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

    <div class="modal fade" id="TambahQuiz-{{ $materi->id }}" tabindex="-1" role="dialog" aria-labelledby="TambahQuiz">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Quiz</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('quiz.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <input type="hidden" value="{{ $materi->id }}" name="materi_id">
                    @foreach(Auth::user()->anggota_kelas as $anggota_kelas)
                    @if($anggota_kelas->kelas_id == $kelas->id)
                    <input type="hidden" name="creator_id" value="{{ $anggota_kelas->id }}">
                    @endif
                    @endforeach
                    <div class="form-group label-floating">
                        <label class="control-label">Judul</label>    
                       <input id="judul" type="text" class="form-control" name="judul" placeholder="Judul">
                    </div>
                    Deskripsi
                    <textarea rows="3" class="form-control deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <div class="form-group label-floating">
                        <label class="control-label">Durasi</label>    
                       <input id="durasi" type="number" class="form-control" name="durasi" placeholder="Durasi">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Jumlah Soal</label>    
                       <input id="jumlah_soal" type="number" class="form-control" name="jumlah_soal" placeholder="Jumlah Soal">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tanggal Mulai</label>    
                       <input id="tanggal_mulai" type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Mulai">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tanggal Selesai</label>    
                       <input id="tanggal_selesai" type="date" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai">
                    </div>
                             
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
    @foreach($materi->tugas as $tugas)
    <div class="modal fade" id="TaskControl-{{ $tugas->id }}" tabindex="-1" role="dialog" aria-labelledby="TaskControl">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Tugas</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('task.edit', $tugas->id)}}" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group label-floating">
                        <label class="control-label">Judul</label>    
                       <input type="text" class="form-control" name="judul" value="{{$tugas->judul}}"/>
                    </div>
                    Deskripsi
                    <textarea class="form-control deskripsi" name="deskripsi" id="desc-task" cols="20" rows="3">{{$tugas->deskripsi}}</textarea>
                    <div class="form-group label-floating">
                        <label class="control-label">Deadline</label>    
                       <input id="deadline" type="date" class="form-control" name="deadline" value="{{$tugas->deadline}}">
                    </div>
                    <input type="submit" class="btn btn-primary" />
                </div>
                <div class="modal-footer">
                    <div class="form-group form-button">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($materi->quiz as $quiz)
    <div class="modal fade" id="EditQuiz-{{ $quiz->id }}" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Quiz</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('quiz.update', $quiz->id)}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group label-floating">
                        <label class="control-label">Judul</label>    
                       <input id="judul" type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $quiz->judul }}">
                    </div>
                    Deskripsi
                    <textarea rows="3" id="deskripsi" class="form-control deskripsi" name="deskripsi" placeholder="Deskripsi">{{ $quiz->deskripsi }}</textarea>
                    
                    <div class="form-group label-floating">
                        <label class="control-label">Durasi</label>    
                       <input id="durasi" type="number" class="form-control" name="durasi" placeholder="Durasi" value="{{ $quiz->durasi }}">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Jumlah Soal</label>    
                       <input id="jumlah_soal" type="number" class="form-control" name="jumlah_soal" placeholder="Jumlah Soal" value="{{ $quiz->jumlah_soal }}">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tanggal Mulai</label>    
                       <input id="tanggal_mulai" type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Mulai" value="{{ $quiz->tanggal_mulai }}">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tanggal Selesai</label>    
                       <input id="tanggal_selesai" type="date" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai" value="{{ $quiz->tanggal_selesai }}"> 
                    </div>
                            
                </div>
                <button class="btn btn-fill btn-warning" id="kelola_soal" value="{{ $quiz->id}}">Kelola Soal</button>
                <div style="float: right; padding-bottom: 50px; padding-right: 20px;"><button type="submit" class="btn btn-fill btn-primary">Simpan</button></div>
                <div class="modal-footer">
                    <div class="form-group form-button">
                    
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
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
    $("#kelola_soal").click(function() {
        var url = "{{ route('quiz.control', ':id') }}";
        url = url.replace(':id', $("#kelola_soal").val());
      if (top.location!= self.location) {
        top.location = url;
        }
    });

    $(document).ready(function(){
        $('.deskripsi').summernote({
            height: 100,
            placeholder: 'Deskripsi',
            tabsize: 2
        });
        $('.dropdown-toggle').dropdown();
        
    });

    function handleElement(i) {
        var c = $("#comment-"+i);
        console.log(c);
        c.click(function(){
            $('#text-content-timeline-'+i).slideToggle();
        });
    }

    var tct = $(".text-content-timeline");
    tct.slideUp(0);

    for(var i=0; i<={{$kelas->materi->count()}}; i++){
        handleElement(i);
    }
</script>