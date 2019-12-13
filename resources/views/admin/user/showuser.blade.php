@extends('adminlte::page')

@section('title', 'Tài khoản')

@section('content')

    <div class="box">
        <div class="box-header with-border" style="margin-bottom: 20px">
            <h3 class="box-title">Danh sách tài khoản</h3>
        </div>
        <div>
            <a style="float: right; margin-right: 20px;" href="{{ route('saveUser') }}" class="btn btn-success btn-add">Thêm</a>
<!-- 
            <form action="{{ route('searchGramar') }}" method="get" role="search">

                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left; margin-left: 10px;">
                        <input type="text" name="tl" class="form-control pull-right" placeholder="Tìm kiếm">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="clear: both;margin-top: 5px">
            @if (session('thongbao'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                    </button>
                    <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                    {{ session('thongbao') }}
                </div>
            @endif
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th tabindex="0">id</th>
                                <th class="sorting" tabindex="0">Tiêu tài khoản</th>
                                <th class="sorting" tabindex="0">Email</th>
                                <th class="sorting" tabindex="0">Password</th>
                                <th class="sorting" tabindex="0">Quyền truy cập</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $user->id }}</td>
                                    <td class="sorting_1">{{ $user->name }}</td>
                                    <td class="sorting_1">{{ $user->email }}</td>
                                    <td class="sorting_1">{{ ($user->password) }}</td>
                                    <td class="sorting_1">
                                        @if($user->role_id == 1)
                                            {{'admin'}}
                                        @elseif($user->role_id == 2)
                                            {{'user'}}
                                        @endif
                                    </td>
                                    <td style="width: 50px;">
                                        <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                    href="update/{{ $user->id }}">Sửa</a></button>
                                    </td>
                                    <td style="width: 50px;">
                                        <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                    href="delete/{{ $user->id }}">Xóa</a></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li>{{ $users->links() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@stop