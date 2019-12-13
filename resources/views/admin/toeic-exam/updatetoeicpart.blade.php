@extends('adminlte::page')

@section('title', 'Sửa phẩn đề thi')

@section('content_header')
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>

<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Sửa phẩn đề thi</h1>
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
        <form role="form" method="POST" action="{{$toeicpart->id}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Tên chủ đề:</label>
                <input name="title" type="text" class="form-control" value="{{$toeicpart->title}}">
                <label> Hình ảnh </label>
                <p><img width="100px;" src="{{ $toeicpart->thumbnail }}"/>
                <input type="file" name="thumbnail" class="form-control">
                <label>Nội dung : </label>
                <textarea name="description" type="text" class="form-control ckeditor" rows="10">{{$toeicpart->description}}</textarea>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </form>
    </div>
</div>
@stop