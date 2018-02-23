@extends('layouts.app')
@section('content')
<div class="detail-tugas">
					<div id="judul-tugas"></div>
					<div id="desc-tugas">
						<span class="deskripsi">
							<h3>Judul Tugas Disini</h3>
							<strong>Oleh: Pak Udin</strong>
							<p>Lorem Ipsum Dolor Sir Amet.Lorem Ipsum Dolor Sir Amet.
							Lorem Ipsum Dolor Sir Amet.Lorem Ipsum Dolor Sir A
							Lorem Ipsum Dolor Sir Amet.Lorem Ipsum Dolor Sir A
							met.Lorem Ipsum Dolor Sir Amet.Lorem Ipsum Dolor Sir Amet.</p>
							<span class="deadline">
							<strong>Deadline: <span>Jumat, 22 Februari 2091 - 10:00 a.m<span></strong>
							</span>
						</span>
					</div>
					<div class="upload-tugas">
						<form method="POST">
							<input type="file" name="tugas" placeholder="Upload Tugas" />
							<input type="submit" name="upload-tugas" value="Upload"/>
						</form>
					</div>
					<button class="btn btn-info">Lihat Data Nilai Tugas</button>
				</div>
@endsection
