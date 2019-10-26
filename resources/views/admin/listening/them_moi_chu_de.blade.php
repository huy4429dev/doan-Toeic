@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Listening</h1>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Thêm mới chủ đề</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" action="{{route('listening.topic.add')}}" method="POST" enctype="multipart/form-data">
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
      @endif
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
      </div>
      <div class="form-group">
        <label>Thumbnail</label>
        <input class="btn btn-app" type="file" name="thumbnail" multiple style="margin-left:0">

      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@stop