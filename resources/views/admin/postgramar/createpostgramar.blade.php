@extends('adminlte::page')

@section('title', 'Bài Viết Ngữ pháp')

@section('content_header')
<h1>Tạo bài viết ngữ pháp</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Bài viết ngữ pháp</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('savePostGramar') }}" enctype="multipart/form-data">
    @csrf
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
    </div>
    @endif
    <div class="form-group">
      <label>Topic</label>
      <select class="form-control" name="topic_id" id="topic">
        <option value="">------</option>
        @foreach($topics as $topic)
        <option value="{{ $topic->id }}">{{$topic->title}}</option>
        @endforeach
      </select>
      <label> Title</label>
      <input name="title" type="text" class="form-control" placeholder="Title">
      <label> Hình ảnh </label>
      <input class="btn btn-app" type="file" name="thumbnail" multiple>
      <label>Chi tiết sản phẩm</label>
      <textarea name="content" type="text" class="form-control ckeditor" rows="10"></textarea>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Thêm</button>
</div>
</form>
</div>
@stop