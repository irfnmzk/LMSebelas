@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                    <a href=""><dt>Section 1</dt></a>
                    <dd>
                        <div class="accordion-content">
                            <ul>
                                <a href="#" id="hell">
                                    <li>Tambah Tugas</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                            </ul>
                        </div>
                    </dd>
                    <a href=""><dt>Section 2</dt></a>
                    <dd>
                        <div class="accordion-content">
                            <ul>
                                <a href="#">
                                    <li>Tambah Tugas</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                            </ul>
                        </div>
                    </dd>
                    <a href=""><dt>Section 3</dt></a>
                    <dd>
                        <div class="accordion-content">
                            <ul>
                                <a href="#">
                                    <li>Tambah Tugas</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                                <a href="#">
                                    <li>Materi ABCD</li>
                                </a>
                            </ul>
                        </div>
                    </dd>
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
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
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

    $('#hell').click(function (e) {
        e.preventDefault();
        $('.reader-bg').html("<iframe style='width:100%;height:85vh' height='100%' width='100%' src='{{url('pdfku')}}' frameborder='0'></iframe>");
    })
    });
</script>
@endsection