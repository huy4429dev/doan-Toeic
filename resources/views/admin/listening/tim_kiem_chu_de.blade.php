@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content_header')
<h1>Listening</h1>
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Danh sách chủ đề</h3>
    </div>

    <form action="{{ route('searchGramar') }}" method="get" role="search">

        <div class="box-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left; margin-left: 10px;">
                <input type="text" name="tl" class="form-control pull-right" placeholder="Tìm kiếm">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th tabindex="0">id</th>
                                <th class="sorting" tabindex="0">Title</th>
                                <th class="sorting" tabindex="0">Thumbnail</th>
                                <th class="sorting" tabindex="0">Action</th>
                            </tr>
                            @if (session('thongbao'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                                {{ session('thongbao') }}
                        </thead>
                        <tbody>
                            @endif
                            @foreach($topics as $topic)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $topic->id }}</td>
                                <td class="sorting_1">{{ $topic->title }}</td>
                                <td class="sorting_1"><img width="70px" height="70px" src="/uploads/listening/{{ $topic->thumbnail }}" /></td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger"  href="listening/delete-topic/{{ $topic->id }}">Xóa</a>
                                </td>
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
                            <li>{{ $topics->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop