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
<style type="text/css">
</style>

<body>
<div class="card card-result-quiz">
				<div class="result-header">
				<img src="{{Auth::user()->picture }}" class="pp"/>
				<span>{{ ucwords(Auth::user()->name) }}</span>
				</div>
				<div class="result-content">
				<div class="user-score">Nilai Anda :<span>{{ $cek->nilai }}</span></div>
				@if($cek->nilai >= 90)
				<div class="quiz-comment">Kerja Bagus !</div>
				@elseif($cek->nilai >= 70 && $cek->nilai < 90)
				<div class="quiz-comment">Bagus !</div>
				@else
				<div class="quiz-comment">Tetap Semangat dan berusaha lagi</div>
				@endif
				<div class="last-quiz">
					<div class="last-quiz-desc"><span><strong>Judul Quiz</strong></span><span>{{ $quiz->judul }}</span></div>
					<div class="last-quiz-desc"><span><strong>Waktu Mulai </strong></span><span>{{ $waktu_mulai->toDayDateTimeString() }}</span></div>
					<div class="last-quiz-desc"><span><strong>Finish Date</strong></span><span>{{ $waktu_selesai->toDayDateTimeString()}}</span></div>
					<div class="last-quiz-desc"><span><strong>Jumlah Benar</strong></span><span><strong>{{ $cek->jumlah_benar }}</strong>/
					{{ $quiz->soal->count() }}</span></div>
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
