<head>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/turbo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="{{ asset('assets/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('assets/css/easy-autocomplete.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.css') }}" rel="stylesheet">
    <style type="text/css">
    body {
    	overflow-y: scroll; 
    }
    </style>
</head>

<body>
<div class="row">
        <div class="col-md-12">
            <div class="card" style="position: relative;">
                <div class="card-content">
                    <h4 class="card-title">{{ $quiz->judul }}</h4><br>
                    @if($quiz->jumlah_soal > $quiz->soal->count() )
                    <a href="#" data-toggle="modal" data-target="#TambahSoal" class="btn btn-success btn-sm" title="Tambah Soal Baru">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Soal
                        </a>
                    @else
                    <button disabled class="btn btn-success btn-disabled btn-sm" title="Soal tidak Bisa Ditambah Karena Telah Mencapai Batas Jumlah Soal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Soal
                        </button>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Gambar</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($quiz->soal as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{!! $item->pertanyaan !!}</td>
                                    <td>
                                    	
                                            @foreach($item->jawaban as $row)
                                            <div style="padding: 5px;">
                                            @if($row->benar== 1)
                                                <label class="label label-success">{{ $row->isi }}</label>
                                                @else
                                                <label class="label label-default">{{ $row->isi }}</label>
                                            @endif
                                            </div>
                                            @endforeach
                                        
                                    </td>
                                    <td>@if(empty($item->picture))
                                            Tidak Ada
                                        @else
                                            {{$item->picture}}
                                        @endif</td>
                                    <td class="td-actions text-right">
                                        <a href="#" class="btn btn-simple btn-info btn-icon edit"><i class="material-icons">edit</i></a>

                                        <form method="POST" action="{{ url('/delete_question/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-simple btn-danger btn-icon remove" title="Delete soal" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="material-icons">close</i></button>
                                            </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="footer" style="padding-bottom: 50px;">
            </div>
        </div>
    </div>
    <div class="modal fade" id="TambahSoal" tabindex="-1" role="dialog" aria-labelledby="TambahSoal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Soal</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('question.store')}}" class="form-horizontal form_soal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="quiz_id" value="{{$quiz->id}}"></input>
                    
                    <textarea rows="3" id="pertanyaan" class="form-control summernote" name="pertanyaan"></textarea>
                    Gambar
                    <img id="blah" src="#" alt="your image" style="max-height:250px; max-width:250px;"/>
                    <input id="picture" type="file" accept="image/*" class="form-control" name="picture">
                    

                    @for($i=1; $i<=5; $i++)
                        <label for="pilihan" class="col-md-4 control-label">#{{$i}} </label>
                           <input type="radio" name="benar" value="{{$i-1}}" @if($i==1) checked @endif > Pilih Sebagai Jawaban Benar
                                <input type="text" class="form-control" id="pilihan" name="pilihan[]" placeholder="Pilihan {{$i}}" required>
                    @endfor         
                </div>
                <div style="float: right; padding-bottom: 50px; padding-right: 20px;"><button type="submit" class="btn btn-fill btn-primary">Simpan</button></div>
                <div class="modal-footer">
                    <div class="form-group form-button">
                    
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/vendors/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/summernote/summernote-lite.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('assets/vendors/jquery.datatables.js') }}"></script>
<script type="text/javascript">
	@include('quiz/quiz_js')
</script>