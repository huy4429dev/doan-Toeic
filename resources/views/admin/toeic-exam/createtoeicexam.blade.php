@extends('adminlte::page')

@section('title', 'Đề thi Toiec')

@section('content_header')

@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tạo đề thi Toeic</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>
            @endforeach
        </div>
        @endif
        @if (session('thongbao'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo</h4>
            {{ session('thongbao') }}
        </div>
        @endif
        <!-- form start -->
        <form role="form" method="POST" action="{{ route('saveExam') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề đề thi:</label>
                <input name="title" type="text" class="form-control" placeholder="Title">
                <br>
                <label>Đề thi có phí hay mất phí:</label>
                <br>
                <label class="radio-inline">
                    <input name="status" value="0" checked="" type="radio">Không mất phí
                </label>
                <label class="radio-inline">
                    <input name="status" value="1" type="radio">Có phí
                </label>
                <br>
                <br>
                <label>Audio đề thi:</label>
                <input class="btn btn-app" style="margin-left:0" type="file" name="audio"  accept="audio/*">
                <label> Hình ảnh : </label>
                <input class="btn btn-app" style="margin-left:0"  type="file" name="thumbnail" multiple>
                <label>Chi tiết đề thi:</label>
                <textarea name="description" type="text" class="form-control ckeditor" rows="10"></textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>
@stop