@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="in-class-header-content" id="info"><h4>
                        @if(Auth::user()->role == 1)
                        FORM MATERI
                        @else
                        INFO
                        @endif
                    </h4></div>
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                <button class="btn btn-success btn-sm" id="toggle-pengumuman" 
                @if(Auth::user()->role == 2) style="display:none;" @endif>Show Pengumuman</button>
                    <div id="pengumuman-div" class="card card-class-info" @if(Auth::user()->role == 1) style="display:none;" @endif>
                    <div class="content-timeline">
                    @if(Auth::user()->role == 1)
                        <h4>Tambah Pengumuman</h4>
                        <form method="POST" action="{{route('diskusi.store', $kelas->id)}}">
                        {{csrf_field()}}
                        <textarea placeholder="How's it going ?" name="text"></textarea>
                    
                        <button type="submit" class="post-status btn btn-info pull-right">Post</button>
                        </form>
                        @include('timeline.kelas')
                    @else
                        @include('timeline.kelas')
                    @endif
                        
                    </div>
                    </div>
                    <br>
                    @if(Auth::user()->role == 1)
                    <iframe style='width:100%;height:85vh' height='100%' width='100%' src='{{ url('/form_materi/'.$kelas->id)}}' frameborder='0'>
                    </iframe>
                    @endif
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
                                <a href="#" class="hell" id="{{ $modul->id }}" link="{{ $modul->link }}" type-sub="pdf">
                                    <li>{{ $modul->judul }}</li>
                                </a>
                            @endforeach
                            @foreach($materi->tugas as $tugas)
                                <a href="#" class="hell" link="{{ $tugas->id }}" type-sub="task">
                                    <li>{{ $tugas->judul }}</li>
                                </a>
                            @endforeach
                                @foreach($materi->quiz as $quiz)
                                <a href="#" class="hell" link="{{ $quiz->id }}" type-sub="quiz">
                                    <li>Quiz : {{ $quiz->judul }}</li>
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
                                    <img src="{{ $item->user['picture'] }}" onerror="this.src='{{ asset('assets/img/placeholder.jpg')}}'"/>
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
      <div class="btn-group">
        <a data-toggle="modal" data-target="#KelasDetail" class="btn btn-success btn-fab" id="main">
          <i class="material-icons">
            <svg fill="#000000" style="width:24px;height:24px" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
            </svg>
          </i>
        </a>
      </div>
    </div>
  </div>

  <div class="modal fade" id="KelasDetail" tabindex="-1" role="dialog" aria-labelledby="TambahMateri">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="card card-class-bio">
                        <div class="class-photo">
                            <a href="{{ route('kelas.edit', $kelas->id) }}"><button class="btn btn-info edit-bio"><i class="zmdi zmdi-edit"></i> <span>Edit</span></button></a>
                            <img src="@empty(!$kelas->cover){{ asset('img/'.$kelas->cover) }} @else ../assets/img/catfall.jpeg @endempty"/>
                        </div>
                        <div class="class-bio">
                            <h3>{{ $kelas->name }}</h3>
                            <h4>Guru : <span>{{ ucwords($kelas->creator->name) }}</span></h4>
                            <p>
                            Kode Kelas : {{ $kelas->code }}<br>
                            {!! $kelas->deskripsi !!}
                            </p>
                        </div>
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
    @isset($quiz)
     @include('quiz.quiz_js')
     @endisset
</script>
<script type="text/javascript">
    var data_id = '';
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

    $("#toggle-pengumuman").click(function() {
        var x = document.getElementById("pengumuman-div");
            if (x.style.display === "none") {
                x.style.display = "block";
                this.innerHTML = "Hide Pengumuman";
            } else {
                x.style.display = "none";
                this.innerHTML = "Show Pengumuman";
            }
        });

    $('.hell').click(function (e) {
        e.preventDefault();
        var type = $(this).attr("type-sub");

        if(type == 'pdf'){
            var link = $(this).attr("link");
            var act = '{{ route("modul.destroy", ":id") }}';
            act = act.replace(':id', $(this).attr("id"));
            $('#destroy_modul').attr("action", act);
            $('#btn-destroy_modul').show();
            
            $('.reader-bg').html("<iframe style='width:100%;height:85vh' height='100%' width='100%' src='{{ url('pdfku/') }}"+"/"+link+"' frameborder='0'></iframe>");
        }else if(type == 'quiz'){
            var link = $(this).attr("link");
            var url = "{{ url('start_quiz/') }}"+"/"+link+"";
            $('.reader-bg').html("<iframe id='if_quiz_att' style='width:100%;height:100%;position:absolute;' height='100%' width='100%' src='"+url+"' frameborder='0'></iframe>");
        }else if(type == 'task'){
            var link = $(this).attr("link");
            data_id = link;
            var url = "{{ url('task/') }}"+"/"+link+"";
            $('.reader-bg').load(url);
        }
    })
    });

    $(document).ready(function(){
        $('#deskripsi').summernote({
            height: 100,
            placeholder: 'Deskripsi Tugas',
            tabsize: 2
        });
        $('.dropdown-toggle').dropdown();
        
    });

    $(document).on('submit', '.form_tugas', function (e) {
        e.preventDefault();

        var formdata = new FormData(this);
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formdata,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                console.log('success');
                var url = "{{ url('task/') }}"+"/"+data_id+"";
                $('.reader-bg').load(url);
            },
            error: function(data){
                alert('error');
            }
        });
    });

    $(document).on('click', '#task-result', function() {
        var id = $(this).val();
        var url = "{{ url('task_result/') }}"+"/"+id+"";

        $('.reader-bg').load(url);
    });

    $(document).on('submit', '#add_nilai', function(e){
        e.preventDefault();
        
        $.ajax({
            url: $(this).attr('action'),
            dataType: 'text',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                alert('Data berhasil di simpan');
            },
            error: function(data){
                alert('failed');
            },
        });
    });
    $(document).on('click', '#task-control', function(){
        $('#desc-task').summernote();
    })
</script>
@endsection
