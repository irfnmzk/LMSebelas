
        <div class="detail-tugas">
            <div id="judul-tugas"></div>
            <div id="desc-tugas">
                <span class="deskripsi">
							<h3>{{ $tugas->judul }}</h3>
							<strong>oleh {{ $tugas->creator->user->name }}</strong>
							<p>{!!$tugas->deskripsi!!}</p>
							<span class="deadline">
							<strong>Deadline: <span>Jumat, 22 Februari 2091 - 10:00 a.m<span></strong>
							</span>
                </span>
            </div>
            <div class="upload-tugas">
                <form method="POST">
                    <input type="file" name="tugas" placeholder="Upload Tugas" />
                    <input type="submit" name="upload-tugas" value="Upload" />
                </form>
            </div>

        </div>