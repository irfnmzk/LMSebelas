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
	body{
		overflow-y: scroll;
	}
</style>

<body>
<div class="card card-start-quiz startbutton">
					<h3>{{ $quiz->judul }}</h3>
					<div class="quiz-desc">
					<p>
						{{ $quiz->deskripsi }} 
					</p>
						<span>{{ $quiz->soal->count() }} / {{ $quiz->jumlah_soal }}</span> Pertanyaan
						<b>{{ $tanggal_mulai->toDayDateTimeString() }} sd {{ $tanggal_selesai->toDayDateTimeString() }}</b>
					</div>
					@if(Auth::user()->role == 1)
					<button class="btn btn-danger quiz-result-all" value="{{ $quiz->id }}">Lihat Hasil Quiz</button>
					@elseif($sip && $quiz->active == 1)
					<button class="btn btn-primary startquiz {{ $classdisabled }}" {{ $disabled }}>Mulai</button>
					@endif
</div>

<div class="quiz" >
<meta name="csrf_token" content="{{ csrf_token() }}" />
<meta name="id_quiz" content="{{ $quiz->id }}" />
<meta name="id_user" content="{{ Auth::user()->id }}" />
@foreach($quiz->soal as $soal)
			<div class="col-lg-8 col-md-8 col-sm-8 soal-{{ $loop->iteration }}" style="display:none">
				<div class="card quiz-question">
				<h4>Pertanyaan No.<span>{{ $loop->iteration }}</span></h4>
					<p>
					@if(!empty($soal->picture))
					<div class="col-lg-12 col-md-12 col-sm-12" id="q-image"><img src="{{ asset('img/'.$soal->picture) }}"></div>
					@endif

					{!!  $soal->pertanyaan !!}
					</p>
					<div class="options">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form>
						@foreach($soal->jawaban as $jawaban)
						<span class="option">
						<input type="radio" name="jawabansoal[{{$loop->parent->iteration}}]" value="{{ $jawaban->id }}"  idquestion="{{ $soal->id }}" ke="{{ $loop->parent->iteration}}" class="inputjawaban"> Jawaban 
						@switch($loop->iteration)
						@case(1)
						A
						@break
						@case(2)
						B
						@break
						@case(3)
						C
						@break
						@case(4)
						D
						@break
						@case(5)
						E
						@break
						@default
						Error
						@endswitch
						<br>
						<label>
							{{ $jawaban->isi }}
						</label>
						</span>
						@endforeach
						</form>
					</div>
					</div>
				</div>
				<div class="switch-q">
					@if($loop->iteration > 1)
            		<div class="pull-left">
		                <div class="col-lg-4 col-md-4 col-sm-12 pull-left"><button class="btn btn-primary sebelumnya" idquestion="{{ $soal->id }}" type="button" ke="{{ $loop->iteration }}">Sebelumnya</button></div>
		            </div>
		            @endif

		            @if($loop->last)
		            <div class="pull-right">
		                <div class="col-lg-4 col-md-4 col-sm-12 pull-right"><button class="btn btn-info finishquiz">Selesai</button></div>
		            </div>
		            @else
		            <div class="pull-right">
		                <div class="col-lg-4 col-md-4 col-sm-12 pull-right"><button class="btn btn-info berikutnya" idquestion="{{ $soal->id }}" type="button" ke="{{ $loop->iteration }}">Berikutnya</button></div>
		            </div>
		            @endif
				</div>
			</div>
			@endforeach

			<div class="col-lg-4 col-md-4 col-sm-4 area-nomor-soal" style="display:none">
				<div class="card time-count">
					<h4>Sisa Waktu: <span class="countdown">00:00</span></h4>
				</div>
				
				<div class="card">
				<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="number-now">
							Nomor Soal
						</div>
				</div>

				@foreach($quiz->soal as $list)
                <div class="col-lg-3 col-md-3 col-sm-3 number-list listsoal">
					<a nomorsoal="{{$loop->iteration}}" idsoal="{{$list->id}}" class="btn btn-default btn-block" href="#" idid="">{{$loop->iteration}}</a>
				</div>
                @endforeach
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 quiz-finish">
				<button class="btn btn-primary finishquiz">Selesai</button>
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
