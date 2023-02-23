@extends('admin.master')

@section('title')
    Users
@endsection

@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Users Management</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('/userAdd') }}"> Create New User</a>
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
    {{--        <hr class="sidebar-divider my-0">--}}
    {{--    <div class="container-fluid">--}}
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{--        <hr class="sidebar-divider my-0">--}}
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('/userShow',$user->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('/userEdit',$user->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'GET','route' => ['/userDelete', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! $data->render() !!}
@endsection
