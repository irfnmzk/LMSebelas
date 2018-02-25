@extends('layouts.app')

@section('content')
<style type="text/css">
.btn-group-sm .btn-fab{
  position: fixed !important;
  right: 29px;
}
.btn-group .btn-fab{
  position: fixed !important;
  right: 20px;
}
#main{
  bottom: 20px;
}
#quiz{
  bottom: 80px
}
#mail{
  bottom: 125px
}
#sms{
  bottom: 170px
}
#autre{
  bottom: 215px
}
</style>
<div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card in-class-header">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="in-class-header-content" id="info"><h4>INFO</h4></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="in-class-header-content" id="materi"><h4>MATERI</h4></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="in-class-header-content" id="member"><h4>ANGGOTA</h4></div>
                </div>
                </div>
        </div>
    </div>

    <div class="info">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="card card-class-info">
                        Lorem Ipsum
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="card card-class-bio">
                        <div class="class-photo">
                            <button class="btn btn-info edit-bio"><i class="zmdi zmdi-edit"></i> <span>Edit</span></button>
                            <img src="../assets/img/catfall.jpeg"/>
                        </div>
                        <div class="class-bio">
                            <h3>{{ $kelas->name }}</h3>
                            <h4>Guru : <span>{{ ucwords($kelas->creator->name) }}</span></h4>
                            <p>
                            {{ $kelas->code }}
                            Lorem Ipsum Dolor Sit Amet is simply a dummy text.
                            Lorem Ipsum Dolor Sit Amet is simply a dummy text.
                            Lorem Ipsum Dolor Sit Amet is simply a dummy text.
                            Lorem Ipsum Dolor Sit Amet is simply a dummy text.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="materi">
        <!-- accordion -->

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="card">
                <dl class="accordion">
                @foreach($kelas->materi as $materi)
                    <a href=""><dt>{{ $materi->judul }}</dt></a>
                    <dd>
                        <div class="accordion-content">
                            <ul>
                            @foreach($materi->modul as $modul)
                                <a href="#" class="hell" link="{{ $modul->link }}" type-sub="pdf">
                                    <li>{{ $modul->judul }}</li>
                                </a>
                            @endforeach
                            @if($loop->last)
                                @foreach($materi->quiz as $quiz)
                                <a href="#" class="hell" link="{{ $quiz->id }}" type-sub="quiz">
                                    <li>Quiz : {{ $quiz->judul }}</li>
                                </a>
                                @endforeach
                            @endif
                            </ul>
                        </div>
                    </dd>
                @endforeach
                </dl>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9">
            <div class="reader-bg">

            </div>
        </div>
    </div>
    <div class="members">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="member-list">

                    <div class="row">
                        @foreach($kelas->anggota_kelas as $item)
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="member-panel">
                                <div class="member-profpic">
                                    <img src="{{ $item->user['picture'] }}" />
                                </div>
                                <div class="member-desc">
                                    <span class="member-name">{{ $item->user['name'] }}</span>
                                    <span class="member-status">{{ $item->user['role']==1?'Guru':'Siswa' }}</span>
                                    <span class="nis">{{ $item->user['no_identitas'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->role == '1')
    <div class="row">
    <div class="col-md-12">
      <div class="btn-group-sm hidden" id="mini-fab">
      <span data-toggle="modal" data-target="#TambahMateri">
        <a href="#" class="btn btn-info btn-fab"  data-toggle="tooltip" data-placement="left" data-original-title="Tambah Materi" title="" id="autre">
          <i class="material-icons">
            <svg fill="#000000" style="width:24px;height:24px" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h10v4h8v10z"/>
            </svg>
          </i>
        </a>  
      </span>
        
        <span data-toggle="modal" data-target="#TambahModul">
          <a href="#" class="btn btn-warning btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Tambah Modul" title="" id="sms">
          <i class="material-icons">
           <svg fill="#000000" style="width:24px;height:24px" viewBox="0 0 24 24">
            <path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
            </svg>
          </i>
        </a>  
        </span>
        
        <span>
            <a href="#" class="btn btn-danger btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Tambah Tugas" title="" id="mail">
              <i class="material-icons">
                <svg fill="#000000" style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
              </i>
            </a>
        </span>

        <span data-toggle="modal" data-target="#TambahQuiz">
            <a href="#" class="btn btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Tambah Quiz" title="" id="quiz">
              <i class="material-icons">
                <svg fill="#000000" style="width:24px;height:24px" viewBox="0 0 24 24">
                  <path fill="#000000" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                </svg>
              </i>
            </a>
        </span>
        
      </div>
      <div class="btn-group">
        <a href="javascript:void(0)" class="btn btn-success btn-fab" id="main">
          <i class="material-icons">
            <svg fill="#000000" style="width:24px;height:24px" viewBox="0 0 24 24">
            <path d="M19,11H15V15H13V11H9V9H13V5H15V9H19M20,2H8A2,2 0 0,0 6,4V16A2,2 0 0,0 8,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M4,6H2V20A2,2 0 0,0 4,22H18V20H4V6Z" />
            </svg>
          </i>
        </a>
      </div>
    </div>
  </div>
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
                    <input type="text" class="form-control" name="judul" placeholder="Judul"/>
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" cols="20" rows="3"></textarea>
                    <input type="text" class="form-control" name="kkm" placeholder="KKM"/>
                    <div class="col-md-6">
                       <input type="text" class="form-control" name="nilai_tugas" placeholder="Nilai Tugas (%)"/> 
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="nilai_quiz" placeholder="Nilai Quiz (%)"/> 
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

    <div class="modal fade" id="TambahModul" tabindex="-1" role="dialog" aria-labelledby="TambahModul">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Modul</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('modul.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <input type="text" class="form-control" name="judul" placeholder="Judul"/>
                    <div class="select">
                        <select name="materi_id" class="form-control">
                            @foreach($kelas->materi as $opt)
                                <option value="{{ $opt->id }}">{{ $opt->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="fallback">
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

    <div class="modal fade" id="TambahQuiz" tabindex="-1" role="dialog" aria-labelledby="TambahQuiz">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Quiz</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('quiz.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <div class="select">
                        <select name="materi_id" class="form-control">
                            @foreach($kelas->materi as $opt)
                                <option value="{{ $opt->id }}">{{ $opt->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach(Auth::user()->anggota_kelas as $anggota_kelas)
                    @if($anggota_kelas->kelas_id == $kelas->id)
                    <input type="hidden" name="creator_id" value="{{ $anggota_kelas->id }}">
                    @endif
                    @endforeach
                    <input id="judul" type="text" class="form-control" name="judul" placeholder="Judul">
                    <textarea rows="3" id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <input id="durasi" type="number" class="form-control" name="durasi" placeholder="Durasi">
                    <input id="jumlah_soal" type="number" class="form-control" name="jumlah_soal" placeholder="Jumlah Soal">
                    Tanggal Mulai 
                    <input id="tanggal_mulai" type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Mulai">
                    Tanggal Selesai 
                    <input id="tanggal_selesai" type="date" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai">         
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
@endif
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        //minimize sidebar automatically
        document.getElementById("minimizeSidebar").click();

        $("#main").click(function() {
          $("#mini-fab").toggleClass('hidden');
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();  
        });
        $.material.init();

    //=== accordion ===//
        var allPanels = $('.accordion > dd').hide();
    
        $('.accordion > a > dt').click(function() {
        //allPanels.slideUp();
        $(this).parent().next().slideToggle();
        return false;
        });
        
        //close when click anywhere
        // $(document).click(function() {
        // allPanels.slideUp();
        // return false;
        // });
        
    //=== /accordion ===//
    
    //choose materi/members
    
    var tinf = $("#info");
    var tmtr = $("#materi");
    var tmmbrs = $("#member");
    var inf = $(".info");
    var mtr = $(".materi");
    var mmbrs = $(".members");
    
    mtr.fadeOut(0);
    mmbrs.fadeOut(0);
    tinf.css("border-bottom","3px solid #ff6000");
    
    tinf.click(function(){
        tinf.css("border-bottom","3px solid #ff6000");
        tmtr.css("border-bottom","3px solid transparent");
        tmmbrs.css("border-bottom","3px solid transparent");
        inf.fadeIn();
        mtr.fadeOut();
        mmbrs.fadeOut();
    });
    tmtr.click(function(){
        tmtr.css("border-bottom","3px solid #ff6000");
        tinf.css("border-bottom","3px solid transparent");
        tmmbrs.css("border-bottom","3px solid transparent");
        mtr.fadeIn();
        inf.fadeOut();
        mmbrs.fadeOut();
    });
    tmmbrs.click(function(){
        tmmbrs.css("border-bottom","3px solid #ff6000");
        tinf.css("border-bottom","3px solid transparent");
        tmtr.css("border-bottom","3px solid transparent");
        mtr.fadeOut();
        inf.fadeOut();
        mmbrs.fadeIn();
    });

    $('.hell').click(function (e) {
        e.preventDefault();
        var type = $(this).attr("type-sub");

        if(type == 'pdf'){
            var link = $(this).attr("link");
            $('.reader-bg').html("<iframe style='width:100%;height:85vh' height='100%' width='100%' src='{{ url('pdfku/') }}"+"/"+link+"' frameborder='0'></iframe>");
        }else if(type == 'quiz'){
            var link = $(this).attr("link");
            var url = "{{ url('start_quiz/') }}"+"/"+link+"";
            $('.reader-bg').load(url);
        }
    })
    });
</script>
@endsection