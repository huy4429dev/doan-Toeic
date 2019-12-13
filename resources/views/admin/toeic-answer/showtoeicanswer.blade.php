@extends('adminlte::page')

@section('title', 'Phần đáp án')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border" style="margin-bottom: 20px">
        <h3 class="box-title">Đáp án </h3>
    </div>
    <div>

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
                    <h4 style="margin-bottom:20px">{{$toiecanswer->content}} </h4>


                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="text-center" tabindex="0">A</th>
                                <th class="text-center" tabindex="0">B</th>
                                <th class="text-center" tabindex="0">C</th>
                                <th class="text-center" tabindex="0">D</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td class="text-center">{{ $toiecanswer->A }}</td>
                                <td class="text-center">{{ $toiecanswer->B }}</td>
                                <td class="text-center">{{ $toiecanswer->C }}</td>
                                <td class="text-center">{{ $toiecanswer->D }}</td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-warning btn-sm"><a style="color:white" href="update/{{$toiecanswer->id}}">Sửa</a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-danger btn-sm"><a style="color:white" href="delete/{{$toiecanswer->id}}">Xóa</a></button>
                                </td>
                            </tr>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop