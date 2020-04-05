@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Create New Role') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="/role" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="roleName" class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="roleName"
                                           placeholder="Enter Role">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-info">
                                {{ __('Create New Role') }}
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Roles') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{ __('Roles') }}</th>
                                <th>{{ __('Permissions') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td><span class="badge bg-info">{{ $role->permissions->count() }}</span></td>
                                    <td>
                                        <div class="btn btn-group btn-xs">
                                            <a href="permission/assign/{{ $role->name }}"
                                               title="{{ __('Assign Permissions') }}" class="btn btn-xs btn-success">
                                                <i class="fa fa-user-shield"></i>
                                            </a>
                                            <a href="" class="btn btn-xs btn-danger" title="{{ __('Delete Role') }}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
