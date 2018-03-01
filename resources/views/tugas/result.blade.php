<div class="data-tugas">
	<h3>Data Nilai Tugas</h3>
	<table colspacing="0" border="1px">
						<tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Nilai</th>
                        </tr>
                        @foreach($kelas->anggota_kelas as $item)
                        @if($item->user->id != $kelas->creator_id)
                            @php($exist = false)
						<tr>
                            <td>{{$loop->iteration-1}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>
                            @if($exist == false)
                                {{'Belum Mengerjakan'}}
                            @endif
                            @foreach($item->jawaban_tugas as $answer)
                                @if($answer->tugas_id == $tugas->id)
                                    <a href="{{route('task.download', $answer->id)}}" class="status-selesai">Download</a>
                                @endif
                            @endforeach
                            </td>
                            <td>
                            @foreach($item->jawaban_tugas as $answer)
                                @if($answer->tugas_id == $tugas->id)
                                    @php($exist = true)
                                    @php($n = 0)
                                    @foreach($answer->nilai_tugas as $nilai)
                                        @if($nilai->jawaban_tugas_id == $answer->id)
                                            @php($n = $nilai->nilai)
                                        @endif
                                    @endforeach
                                    <form method="POST" action="{{route('tugas.nilai.store', $answer->id)}}" id="add_nilai">
                                        <div class="row">
                                            {{csrf_field()}}
                                            <input type="hidden" name="jawaban_tugas_id" value="{{$answer->id}}" id="tugas_id" />
                                            <div class="col-md-7"><input type="number" name="nilai" value="{{$n}}" id="nilai" /></div>
                                            <div class="col-md-2"><input type="submit" class="btn-info"/></div>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                            @if($exist == false)
                                {{'Kosong'}}
                            @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
	</table>
</div>