@extends('layouts.app')
@section('content')
<div class="admin-banner">
    <h3>Data Kelas</h3>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 add-data-admin">
            <a href="#">
                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i> Add data</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <table class="table table-striped table-hover table-bordered" id="main-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Creator</th>
                            <th>Jumlah siswa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jacob</td>
                            <td>Director</td>
                            <td>
                                <p class="text-success">Available</p>
                            </td>
                            <td class="actions-admin"><a href="#" class="text text-info"><i class="zmdi zmdi-edit"></i> Edit</a> &nbsp; <a href="#" class="text text-danger"><i class="zmdi zmdi-delete"></i> Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.min.css')}}" type="text/css" />
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js')}}"></script>
@endsection
@section('script')
    <script type="text/javascript" >
        $(document).ready(function(){
            $('#main-table').DataTable()
        })
    </script>
@endsection