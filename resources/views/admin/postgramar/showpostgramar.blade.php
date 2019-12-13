@extends('adminlte::page')

@section('title', 'Bài viết ngữ pháp')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách bài viết ngữ pháp</h3>
        </div>
        <!-- /.box-header -->
        <div style="margin:10px 10px 0 10px">
            <a style="float: right" href="{{ route('savePostGramar') }}"
               class="btn btn-success btn-add">Thêm</a>
            <form action="{{ route('searchPostGramar') }}" method="get" role="search">
                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left">
                        <input type="text" name="pt" class="form-control pull-right" placeholder="Tìm kiếm">
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
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th tabindex="0">id</th>
                                <th class="sorting" tabindex="0">Tiêu đề bài viết</th>
                                <th class="sorting" tabindex="0">Hình ảnh</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($postgramars as $postgramar)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $postgramar->id }}</td>
                                    <td class="sorting_1">{{ $postgramar->title }}</td>

                                    <td class="sorting_1"><img width="70px;"
                                                               src="/uploads/gramar/{{ $postgramar->thumbnail }}"/>
                                    </td>
                                    <td style="width: 50px;">
                                        <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                    href="update/{{$postgramar->id}}">Sửa</a></button>
                                    </td>
                                    <td style="width: 50px;">
                                        <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                    href="delete/{{$postgramar->id}}">Xóa</a></button>
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
                                <li>{{ $postgramars->links() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@stop