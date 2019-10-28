@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>{{$topic->title}}</h1>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Thêm mới bài viết</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{url('admin/listening/topic/add-post/'.$topic->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>

                @endforeach
            </div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
            </div>
        
            <div class="form-group">
                <label>Audio question</label>
                <input class="btn btn-app" style="margin-left:0" type="file" name="audio_ques" accept="audio/*">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Answer</label>
                <input type="text" class="form-control" id="exampleInputEmail2" placeholder="answer" name="answer">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail3">Level</label>
                <input type="text" class="form-control" id="exampleInputEmail3" value="1" name="level">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail4">Description</label>
                <textarea class="form-control" id="exampleInputEmail4" name="description"></textarea>   
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
@stop