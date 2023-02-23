@extends('admin.master')

@section('title')
    Role Detail
@endsection

@section('mainContent')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Role at a glance</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('/roleManage') }}">Go Back</a>
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
                                    {{ $role->name }}
                                </div>
                            </div>
                            <div class="pull-left">
                                <div class="form-group">
                                    <strong>Permissions:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->name }},</label>
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






{{--@extends('admin.master')--}}

{{--@section('mainContent')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2> Show Role</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Name:</strong>--}}
{{--                {{ $role->name }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Permissions:</strong>--}}
{{--                @if(!empty($rolePermissions))--}}
{{--                    @foreach($rolePermissions as $v)--}}
{{--                        <label class="label label-success">{{ $v->name }},</label>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
