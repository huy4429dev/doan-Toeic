@extends('adminlte::page')

@section('title', 'Trang quản trị')

@section('content_header')
<h1>Sửa bài viết ngữ pháp</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<style>
  .icon_del {
    position: relative;
    top: 4px;
    left: 10px;
  }
</style>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title">Bài viết ngữ pháp</h1>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{$postgramar->id}}" enctype="multipart/form-data">
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
        @foreach($topics as $topic)
        <option @if($topic->id == $postgramar->topic_id)
          {{"selected"}}
          @endif
          value="{{ $topic->id }}">{{$topic->title}}</option>
        @endforeach

      </select>
      <label> Tiêu đề bài viết</label>
      <input name="title" type="text" class="form-control" value="{{$postgramar->title}}">
     <label> Hình ảnh</label>
      <input class="btn btn-app" type="file" name="thumbnail" multiple>
      <p><img width="100px;" src="/uploads/gramar/{{ $postgramar->thumbnail }}" /></p>
      <label>Nội dung bài viết</label>
      <textarea name="content" type="text" class="form-control ckeditor" rows="10">{{$postgramar->content}}</textarea>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Sửa</button>
</div>
</form>
</div>
@stop
