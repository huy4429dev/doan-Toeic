@extends('adminlte::page')

@section('title', 'Đề thi')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border" style="margin-bottom: 20px">
        <h3 class="box-title">Danh sách đề thi</h3>
        <h4>Tìm kiếm thấy : {{count($toeicexams)}} đề thi </h4>
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
                                <th tabindex="0">id</th>
                                <th class="sorting" tabindex="0">Tiêu đề đề thi</th>
                                <th class="sorting" tabindex="0">Nôi dung</th>
                                <th style="width: 150px;" class="sorting" tabindex="0">Không mất phí-Có phí</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($toeicexams as $toeicexam)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $toeicexam->id }}</td>
                                <td class="sorting_1"> <a href="{{url('toeic-part/'.$toeicexam->id)}}">{{ $toeicexam->title }}</a></td>
                                <td class="sorting_1">{{ $toeicexam->description }}</td>
                                <td class="sorting_1">
                                    @if($toeicexam->status == 0)
                                    {{'Không mất phí'}}
                                    @elseif($toeicexam->status == 1)
                                    {{'Có phí'}}
                                    @endif
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-default btn-sm"><a href="update/{{ $toeicexam->id }}">Sửa</a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-default btn-sm"><a href="delete/{{ $toeicexam->id }}">Xóa</a></button>
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
                            <li>{{ $toeicexams->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop