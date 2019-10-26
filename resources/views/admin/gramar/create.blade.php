@extends('adminlte::page')

@section('title', 'Ngữ pháp')

@section('content_header')
<h1>Gramar</h1>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Thêm mới chủ đề</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('saveGramar') }}" enctype="multipart/form-data">
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
      <label>Category</label>
      <select class="form-control" name="category_id" id="category">
        <option value="">------</option>
        @foreach($categorys as $category)
        <option value="{{ $category->id }}">{{$category->name}}</option>
        @endforeach
      </select>
      <label> Title</label>
      <input name="title" type="text" class="form-control" placeholder="Title">
      <label>Thumbnail</label>
      <input class="btn btn-app" type="file" name="thumbnail" multiple>
      <br>
      <label>Level học ngữ pháp:</label>
      <br>
      <label class="radio-inline">
        <input name="level" value="1" checked="" type="radio">Cấp 1
      </label>
      <label class="radio-inline">
        <input name="level" value="2" type="radio">Cấp 2
      </label>
      <label class="radio-inline">
        <input name="level" value="3" type="radio">Cấp 3
      </label>
      <label class="radio-inline">
        <input name="level" value="4" type="radio">Cấp 4
      </label>
      <label class="radio-inline">
        <input name="level" value="5" type="radio">Cấp 5
      </label>

    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Thêm</button>
</div>
</form>
</div>
@stop