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
						<tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>
                            @foreach($item->jawaban_tugas as $answer)
                                @if($answer->tugas_id = $tugas->id)
                                    <a href="{{route('task.download', $answer->id)}}" class="status-selesai">Download</a>
                                @endif
                            @endforeach
                            </td>
                            <td>
                            @foreach($item->jawaban_tugas as $answer)
                                @if($answer->tugas_id = $tugas->id)
                                    <form method="POST" action="{{route('tugas.nilai.store', $answer->id)}}" id="add_nilai">
                                        <div class="row">
                                            {{csrf_field()}}
                                            <input type="hidden" name="jawaban_tugas_id" value="{{$answer->id}}" id="tugas_id" />
                                            <div class="col-md-7"><input type="number" name="nilai" value="0" id="nilai" /></div>
                                            <div class="col-md-2"><input type="submit" class="btn-info"/></div>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                            </td>
                        </tr>
                        @endif
                        @endforeach
	</table>
</div>