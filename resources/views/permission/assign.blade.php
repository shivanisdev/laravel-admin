@extends('layouts.app')
@section('css')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <form action="/permission/save/{{$role->name}}" method="post">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Assign Permissions') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                {{ __('Select Permissions for the') }} <b>{{ $role->name }}</b>
                                <select class="duallistbox" multiple="multiple" name="permissions[]">
                                    @foreach($permissions as $permission)
                                        <option
                                            {{ ($role->hasPermissionTo($permission->name))? 'selected' : '' }}
                                            value="{{ $permission->name }}">
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">
                        {{ __('Add Permissions') }}
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- Page script -->
    <script>
        $(function () {
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()
        })
    </script>
@endsection
