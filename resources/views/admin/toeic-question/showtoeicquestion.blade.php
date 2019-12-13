@extends('adminlte::page')

@section('title', 'Phần câu hỏi')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border" style="margin-bottom: 20px">
        <h3 class="box-title">Danh sách câu hỏi</h3>
    </div>
    <div>
        <a style="float: right; margin-right: 20px;" href="/admin/toeic-question/create/{{$id}}/{{$type}}" class="btn btn-success btn-add">Thêm</a>

        <!-- <a style="float: right; margin-right: 20px;" href="{{ route('saveExam') }}" class="btn btn-success btn-add">Thêm</a> -->
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
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th tabindex="0" style="width:60px" class="text-center">id</th>
                                <th class="text-center" tabindex="0">Câu hỏi</th>
                                <th class="text-center" tabindex="0">Thời gian</th>
                                <th tabindex="0" class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($toeicquestions as $toeicquestion)
                            <tr role="row" class="odd">
                                <td class="text-center">{{ $toeicquestion->id }}</td>

                                <td class="text-center">
                                    <a href="/admin/toeic-answer/{{$toeicquestion->id}}">{{ $toeicquestion->content }}</a></td>
                                <td class="text-center">{{$toeicquestion->created_at}}</td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-warning btn-sm"><a style="color:white" href="/admin/toeic-question/update/{{$id}}/{{$type}}/{{ $toeicquestion->id }}">Sửa</a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-danger btn-sm"><a style="color:white" href="/admin/toeic-question/delete/{$id}}/{{$type}}/{{ $toeicquestion->id }}">Xóa</a></button>
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
                            <li>{{ $toeicquestions->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop