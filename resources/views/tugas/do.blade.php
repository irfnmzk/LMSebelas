
        <div class="detail-tugas">
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
            @php
                $done = false;
                $taskId = '';
            @endphp
                @if($tugas->creator->user->id != Auth::user()->id)
                    @foreach($tugas->jawaban_tugas as $jawaban)
                        @if($jawaban->creator->user->id == Auth::user()->id)
                            @php
                                $done = true;
                                $taskId = $jawaban->id;
                            @endphp
                        @endif
                    @endforeach
                    @if($done == false)
                    <form method="POST" action="{{route('siswa.tugas.store')}}" class="form_tugas">
                        {{csrf_field()}}
                        <input type="hidden" name="tugas_id" value="{{ $tugas->id }}"/>
                        <input type="file" name="link" placeholder="Upload Tugas" />
                        <input type="submit" name="upload-tugas" value="Upload" class="submit_tugas" id="task_btn"/>
                    </form>
                    @else
                        <h3>Kamu sudah mengirimkan jawaban kamu</h3>
                        <a href="{{route('task.download', $taskId)}}"><button class="btn btn-primarry">Lihat jawaban</button></a>
                    @endif
                @else
                    <button class="btn btn-primary" id="task-result" value="{{$tugas->id}}">Lihat Hasil</button>
                    <button class="btn btn-primary" id="task-control" value="{{$tugas->id}}" data-toggle="modal" data-target="#TaskControl">Tugas Control</button>
                @endif
            </div>

        </div>

    <div class="modal fade" id="TaskControl" tabindex="-1" role="dialog" aria-labelledby="TaskControl">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Tugas</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('task.edit', $tugas->id)}}" class="form-horizontal">
                    {{csrf_field()}}
                    <input type="text" class="form-control" name="judul" value="{{$tugas->judul}}"/><br/>
                    <textarea class="form-control" name="deskripsi" id="desc-task" cols="20" rows="3">{{$tugas->deskripsi}}</textarea><br/>
                    <input id="deadline" type="date" class="form-control" name="deadline" value="{{$tugas->deadline}}"><br/>
                    <input type="submit" class="btn btn-primary" />
                </div>
                <div class="modal-footer">
                    <div class="form-group form-button">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div