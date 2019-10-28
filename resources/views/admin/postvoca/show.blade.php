@extends('adminlte::page')

@section('title', 'Từ vững')

@section('content')

    <div class="box">
        <div class="box-header with-border" style="margin-bottom: 20px">
            <h3 class="box-title">Danh sách chủ đề từ vững</h3>
        </div>
        <div>
            <a style="float: right; margin-right: 20px;" href="vocabulary/create"
               class="btn btn-success btn-add">Thêm</a>

            <form method="POST" action="" role="search">
                @csrf
                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs"
                         style="width: 200px; float: left; margin-left: 10px;">
                        <input type="text" name="id" class="form-control pull-right" placeholder="Tìm kiếm">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- /.box-header -->
        <div class="box-body" style="clear: both;padding-top: 0">
            @if (session('thongbao'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 5px">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                    {{ session('thongbao') }}
                </div>
            @endif
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            {{--title--}}
                            <thead>
                            <tr role="row">
                                <th tabindex="0">id</th>
                                <th class="sorting" tabindex="0">Tên từ</th>
                                <th class="sorting" tabindex="0">Loại từ</th>
                                <th class="sorting" tabindex="0">Phát âm</th>
                                <th class="sorting" tabindex="0">Cách dùng</th>
                                <th class="sorting" tabindex="0">Âm thanh</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>
                            </thead>
                            {{--data--}}
                            <tbody>
                            @foreach($post as $item)
                                <a href="http://localhost:8000/admin/dashboard">
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $item->id }}</td>
                                        <td class="sorting_1">{{ $item->title }}</td>
                                        <td class="sorting_1">{{$item->word_type }}</td>
                                        <td class="sorting_1">{{$item->pronounce }}</td>
                                        <td class="sorting_1">{{$item->use }}</td>
                                        <td class="sorting_1">{{$item->audio }}</td>
                                        <td style="width: 50px;">
                                            <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                        href="vocabulary/update/{{ $item->id }}">Sửa</a></button>
                                        </td>
                                        <td style="width: 50px;">
                                            <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                        href="vocabulary/delete/{{ $item->id }}">Xóa</a></button>
                                        </td>
                                    </tr>
                                </a>
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
                                {{--<li>{{ $data->links() }}</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@stop