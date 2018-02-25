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

<script type="text/javascript">
	$(document).ready(function() {
		$('.quiz-control').click(function (e) {
	        e.preventDefault();
	        alert("aaaa");
	            // var link = $(this).val();
	            // var url = "{{ url('quiz_control/') }}"+"/"+link+"";
	            // $('.reader-bg').load(url);
	        }
    	});
	});

        
    </script>