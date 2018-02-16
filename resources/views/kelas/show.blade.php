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
#mail{
  bottom: 80px
}
#sms{
  bottom: 125px
}
#autre{
  bottom: 170px
}
</style>
<div class="container-fluid">
dfdf
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card in-class-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="in-class-header-content" id="materi">
                        <h4>MATERI</h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="in-class-header-content" id="member">
                        <h4>ANGGOTA</h4>
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
                                <a href="#" class="hell" link="{{ $modul->link }}">
                                    <li>{{ $modul->judul }}</li>
                                </a>
                            @endforeach
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
        <a href="#" class="btn btn-info btn-fab" data-toggle="modal" data-target="#TambahMateri" data-original-title="Tambah Materi" title="" id="autre">
          <i class="material-icons">
            tab
          </i>
        </a>
        <a href="#" class="btn btn-warning btn-fab" data-toggle="modal" data-target="#TambahModul" data-original-title="Tambah Modul" title="" id="sms">
          <i class="material-icons">
            picture_as_pdf
          </i>
        </a>
        <a href="#" class="btn btn-danger btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Tambah Tugas" title="" id="mail">
          <i class="material-icons">
            assignment
          </i>
        </a>
      </div>
      <div class="btn-group">
        <a href="javascript:void(0)" class="btn btn-success btn-fab" id="main">
          <i class="material-icons">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="#000000" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
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
                    <input type="text" class="form-control" name="nilai_tugas" placeholder="Nilai Tugas (%)"/>
                    <input type="text" class="form-control" name="nilai_quiz" placeholder="Nilai Quiz (%)"/>
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
                    <select name="materi_id" class="form-control">
                    @foreach($kelas->materi as $opt)
                    <option value="{{ $opt->id }}">{{ $opt->judul }}</option>
                    @endforeach
                    </select>
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
    
    var tmtr = $("#materi");
    var tmmbrs = $("#member");
    var mtr = $(".materi");
    var mmbrs = $(".members");
    
    mmbrs.fadeOut(0);
    tmtr.css("border-bottom","3px solid #ff6000");
    
    tmtr.click(function(){
        tmtr.css("border-bottom","3px solid #ff6000");
        tmmbrs.css("border-bottom","3px solid transparent");
        mtr.fadeIn();
        mmbrs.fadeOut();
    });
    tmmbrs.click(function(){
        tmmbrs.css("border-bottom","3px solid #ff6000");
        tmtr.css("border-bottom","3px solid transparent");
        mtr.fadeOut();
        mmbrs.fadeIn();
    });

    $('.hell').click(function (e) {
        e.preventDefault();
        var link = $(this).attr("link");

        alert(link);
        console.log(link);
        $('.reader-bg').html("<iframe style='width:100%;height:85vh' height='100%' width='100%' src='{{ url('pdfku/') }}"+"/"+link+"' frameborder='0'></iframe>");
    })
    });
</script>
@endsection