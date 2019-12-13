@extends('adminlte::page')

@section('title', 'Bài viết')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Danh sách bài viết</h3>
    </div>
    <!-- /.box-header -->
    <div style="margin:10px 10px 0 10px">
        <a style="float: right" href="{{ route('saveArticle') }}" class="btn btn-success btn-add">Thêm</a>
        <form action="{{ route('searchArticle') }}" method="get" role="search">
            <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left">
                    <input type="text" name="at" class="form-control pull-right" placeholder="Tìm kiếm">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- .box-body--}}
    <div class="box-body" style="clear: both; margin-top: 20px">
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
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="text-center">id</th>
                                <th class="text-center">Tiêu đề</th>
                                <th class="text-center">Hình ảnh</th>
                                <th class="text-center">Thời gian</th>
                                <th tabindex="0" class="text-center" colspan="2">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr role="row" class="odd">
                                <td class="text-center">{{ $post->id }}</td>
                                <td class="text-center">{{ $post->title }}</td>

                                <td class="text-center"><img width="50px;" src="/uploads/article/{{ $post->thumbnail }}" />
                                </td>
                                <td class="text-center">{{ $post->created_at }}</td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-warning btn-sm"><a style="color:white" href="update/{{$post->id}}">Sửa</a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-danger btn-sm"><a style="color:white" href="delete/{{$post->id}}">Xóa</a></button>
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
                            <li>{{ $posts->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop