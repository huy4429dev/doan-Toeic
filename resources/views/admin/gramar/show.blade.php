@extends('adminlte::page')

@section('title', 'Ngữ pháp')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách chủ đề ngữ pháp</h3>
    </div>
    <a style="float: right; margin-right: 20px;" href="{{ route('saveGramar') }}" class="btn btn-success btn-add">Thêm</a>

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
                                <th class="sorting" tabindex="0">Tiêu đề chủ đề</th>
                                <th class="sorting" tabindex="0">Hình ảnh</th>
                                <th class="sorting" tabindex="0">Level</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>
                            @if (session('thongbao'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                                {{ session('thongbao') }}
                        </thead>
                        <tbody>
                            @endif
                            @foreach($gramars as $gramar)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $gramar->id }}</td>
                                <td class="sorting_1">{{ $gramar->title }}</td>
                                <td class="sorting_1"><img width="70px;" src="/uploads/gramar/{{ $gramar->thumbnail }}" /></td>
                                <td class="sorting_1">
                                    @if($gramar->level == 1)
                                    {{'Cấp 1'}}
                                    @elseif($gramar->level == 2)
                                    {{'Cấp 2'}}
                                    @elseif($gramar->level == 3)
                                    {{'Cấp 3'}}
                                    @elseif($gramar->level == 4)
                                    {{'Cấp 4'}}
                                    @elseif($gramar->level == 5)
                                    {{'Cấp 5 '}}
                                    @endif
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-default btn-sm"><a href="update/{{ $gramar->id }}">Sửa</a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-default btn-sm"><a href="delete/{{ $gramar->id }}">Xóa</a></button>
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
                            <li>{{ $gramars->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop