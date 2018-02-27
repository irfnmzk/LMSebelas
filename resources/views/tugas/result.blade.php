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
                                <form method="POST">
                                    <input type="number" name="nilai" value="0"/>
                                </form>
                            </td>
                        </tr>
                        @endforeach
	</table>
</div>
