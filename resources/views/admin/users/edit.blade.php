@extends('admin.master')

@section('title')
   Edit User
@endsection

@section('mainContent')
    <div class="container-fluid">

        <div class="col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Edit User Info</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('/userManage') }}">Manage User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 margin-tb mb-4">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="pull-left">
                        <h2>Update User Info</h2>
                    </div>
                    {!! Form::model($user, ['method' => 'POST','route' => ['/userUpdate', $user->id]]) !!}

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Name :</label>
                            <div class="col-md-6">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Email :</label>
                            <div class="col-md-6">
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Password :</label>
                            <div class="col-md-6">
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Confirm Password :</label>
                            <div class="col-md-6">
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Select Role :</label>
                            <div class="col-md-6">
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" name="btn" class="btn btn-primary btn-block">Update User Info</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
@endsection
