
        <div class="detail-tugas">
            <div id="judul-tugas"></div>
            <div id="desc-tugas">
                <span class="deskripsi">
							<h3>{{ $tugas->judul }}</h3>
							<strong>Oleh {{ ucwords($tugas->creator->user->name) }}</strong>
							<p>{!!$tugas->deskripsi!!}</p>
							<span class="deadline">
							<strong>Deadline: <span>{{ Carbon\Carbon::parse($tugas->deadline)->toDayDateTimeString() }}<span></strong>
							</span>
                </span>
            </div>
            <div class="upload-tugas">
                <form method="POST" action="{{route('siswa.tugas.store')}}" class="form_tugas">
                    {{csrf_field()}}
                    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}"/>
                    <input type="file" name="link" placeholder="Upload Tugas" />
                    <input type="submit" name="upload-tugas" value="Upload" class="submit_tugas"/>
                </form>
            </div>

        </div>