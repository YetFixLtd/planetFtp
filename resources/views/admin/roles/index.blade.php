@extends('admin.master')

@section('title')
    Roles
@endsection

@section('mainContent')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Role Management</h2>
                            </div>
                            <div class="pull-right">
                                @can('role-create')
                                    <a class="btn btn-success" href="{{ route('/roleAdd') }}"> Create New Role</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Role Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Roll ID</th>
                                <th>Roll Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Roll ID</th>
                                <th>Roll Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('/roleShow',$role->id) }}">Show</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('/roleEdit',$role->id) }}">Edit</a>
                                        @endcan
                                        @can('role-delete')
{{--                                            {!! Form::open(['method' => 'DELETE','route' => ['/roleDelete', $role->id],'style'=>'display:inline']) !!}--}}
                                            {!! Form::open(['method' => 'GET','route' => ['/roleDelete', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! $roles->render() !!}
@endsection

