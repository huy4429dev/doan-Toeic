@extends('adminlte::page')

@section('title', 'Câu hỏi đề thi')

@section('content_header')
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-title">Part {{$id}} / {{$toeicexam->title}} </h3>
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
        <form role="form" method="POST" action="/admin/toeic-question-has-para/create/para/{{$toeicparttow->id}}/{{$toeicexamtow->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
           
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung:</label>
                    <textarea name="content" type="text" class="form-control ckeditor" rows="10"></textarea>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>
@stop