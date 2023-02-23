@extends('admin.master')

@section('title')
    User Detail
@endsection

@section('mainContent')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>User at a glance</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('/userManage') }}">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="pull-left">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="pull-left">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
