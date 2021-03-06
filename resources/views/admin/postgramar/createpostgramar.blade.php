@extends('adminlte::page')

@section('title', 'Bài Viết Ngữ pháp')

@section('content_header')
@stop

@section('content')
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo bài viết ngữ pháp</h3>
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
            <form role="form" method="POST" action="{{ route('savePostGramar') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div>
                        <label>Chủ đề:</label>
                        <select class="form-control" name="topic_id" id="topic">
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{$topic->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Tên bài viết:</label>
                    <input name="title" type="text" class="form-control" placeholder="Title">
                    <label>Hình ảnh:</label>
                    <input class="btn btn-app" type="file" name="thumbnail" multiple>
                    <label>Chi tiết bài viết:</label>
                    <textarea name="content" type="text" class="form-control ckeditor" rows="10"></textarea>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@stop