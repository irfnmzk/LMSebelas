<div class="card card-start-quiz">
					<h3>{{ $quiz->judul }}</h3>
					<div class="quiz-desc">
					<p>
						{{ $quiz->deskripsi }} 
					</p>
						<span>{{ $quiz->soal->count() }} / {{ $quiz->jumlah_soal }}</span> Pertanyaan
						<b>{{ $tanggal_mulai->toDayDateTimeString() }} sd {{ $tanggal_selesai->toDayDateTimeString() }}</b>
					</div>
					@if(Auth::user()->role == 1)
					<button class="btn btn-primary quiz-control" value="{{ $quiz->id }}">Kelola Quiz</button>
					@else
					@if($sip && $quiz->active == 1)
					<button class="btn btn-primary startquiz">Mulai</button>
					@endif
					@endif
</div>

<div class="quiz" >
<meta name="csrf_token" content="{{ csrf_token() }}" />
@foreach($quiz->soal as $soal)
			<div class="col-lg-8 col-md-8 col-sm-12 soal soal-{{ $loop->iteration }}" style="display:none">
				<div class="card quiz-question">
				<h4>Pertanyaan No.<span>{{ $loop->iteration }}</span></h4>
					<p>
					@if(!empty($soal->picture))
					<div class="col-lg-12 col-md-12 col-sm-12" id="q-image"><img src="{{ asset('img/'.$soal->picture) }}"></div>
					@endif

					{{  $soal->pertanyaan }}
					</p>
					<div class="options">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form>
						@foreach($soal->jawaban as $jawaban)
						<span class="option">
						<input type="radio" name="jawabansoal[{{$loop->parent->iteration}}]" value="{{ $jawaban->id }}"  idquestion="{{ $soal->id }}" ke="{{ $loop->parent->iteration}}"> Jawaban A
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
			<div class="col-lg-4 col-md-4 col-sm-12 area-nomor-soal" style="display:none">
				<div class="card time-count countdown">
					<h4>Sisa Waktu: <span>00:00</span></h4>
				</div>
				
				<div class="card">
				<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="number-now">
							Question: <span>18</span>/<span>10</span>
						</div>
				</div>

				@foreach($quiz->soal as $list)
                <div class="col-lg-3 col-md-3 col-sm-3 number-list">
					<a nomorsoal="{{$loop->iteration}}" idsoal="{{$list->id}}" class="btn btn-default btn-quiz" href="#" idid="">{{$loop->iteration}}</a>
				</div>
                @endforeach
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 quiz-finish">
				<button class="btn btn-primary">Finish</button>
				</div>
			</div>
		
		</div>