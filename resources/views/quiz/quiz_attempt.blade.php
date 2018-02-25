<div class="card card-start-quiz">
					<h3>{{ $quiz->judul }}</h3>
					<div class="quiz-desc">
					<p>
						{{ $quiz->deskripsi }} 
					</p>
						<span>{{ $quiz->soal->count() }} / {{ $quiz->jumlah_soal }}</span> Pertanyaan
						<b>{{ $tanggal_mulai->toDayDateTimeString() }} sd {{ $tanggal_selesai->toDayDateTimeString() }}</b>
					</div>
					@if($sip && $quiz->active == 1)
					<button class="btn btn-primary startquiz">Mulai</button>
					@endif
</div>