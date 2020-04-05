@extends('layouts.app')
@section('css')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Permissions') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{ __('Permissions') }}</th>
                                <th>{{ __('Roles') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td><span class="badge bg-info">{{ $permission->roles->count() }}</span></td>
                                    </tr>
                                @empty
                                    <div class="row alert alert-info">
                                        Permission can be created from a console command for particular controller
                                    </div>

                                @endforelse
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
