@extends('layouts.app')
@section('content')
<div class="admin-banner">
    <h3>Employees Data</h3>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 add-data-admin">
            <a href="#">
                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i> Add data</button>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 search-admin">
            <form>
                <input type="text" name="search" placeholder="Search...">
                <button class="btn btn-info"><i class="zmdi zmdi-search"></i></button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <table class="table table-striped table-hover table-no-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
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
                        <tr>
                            <td>2</td>
                            <td>Jane</td>
                            <td>Manager</td>
                            <td>
                                <p class="text-danger">Not Available</p>
                            </td>
                            <td class="actions-admin"><a href="#" class="text text-info"><i class="zmdi zmdi-edit"></i> Edit</a> &nbsp; <a href="#" class="text text-danger"><i class="zmdi zmdi-delete"></i> Delete</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Julian</td>
                            <td>CEO</td>
                            <td>
                                <p class="text-warning">Doing A Job</p>
                            </td>
                            <td class="actions-admin"><a href="#" class="text text-info"><i class="zmdi zmdi-edit"></i> Edit</a> &nbsp; <a href="#" class="text text-danger"><i class="zmdi zmdi-delete"></i> Delete</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Jajang</td>
                            <td>Office Boi</td>
                            <td>
                                <p class="text-success">Available</p>
                            </td>
                            <td class="actions-admin"><a href="#" class="text text-info"><i class="zmdi zmdi-edit"></i> Edit</a> &nbsp; <a href="#" class="text text-danger"><i class="zmdi zmdi-delete"></i> Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="admin-pagination">
                <div class="to-remove">Pagination here</div>
            </div>
        </div>
    </div>

</div>
@endsection