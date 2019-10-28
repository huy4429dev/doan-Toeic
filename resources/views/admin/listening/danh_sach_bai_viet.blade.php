@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Tên chủ đề </h1>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <a style="background:#c6c6c642" href="{{url('admin/listening/topic/add-post/'.$idTopic)}}" class="btn btn-secondary btn-sm">Add Post +</a>
    @if (session('thongbao'))
      <div class="alert alert-success alert-dismissible" style="margin-top:10px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo</h4>
        {{ session('thongbao') }}
      </div>
      @endif
    <div class="box-tools">
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Time</th>
          <th>Description</th>
          <th colspan="2" style="text-align: center;">Action</th>
        </tr>
        @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->description}}</td>
          <td style="width: 50px;">
            <a class="btn btn-primary" href="{{ url('admin/listening/topic/update-post/'.$post->id ) }}">Sửa</a>
          </td>
          <td style="width: 50px;">
            <a class="btn btn-danger" href="{{ url('admin/listening/topic/delete-post/'.$post->id ) }}">Xóa</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      <li>{{ $posts->links() }}</li>
    </ul>
  </div>
  <!-- /.box-body -->
</div>
@stop