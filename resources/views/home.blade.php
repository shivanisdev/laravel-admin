@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @can('role.store')
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('Roles') }}</span>
                            <span class="info-box-number"><a href="/role">{{ __('Create New Role') }}</a></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            @endcan

            @can('permissions.index')
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-shield"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('Permissions') }}</span>
                            <span class="info-box-number"><a href="/permission">{{ __('View All Permissions') }}</a></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            @endcan

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
