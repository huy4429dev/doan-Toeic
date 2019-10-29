@extends('adminlte::page')

@section('title', 'Từ vựng')

@section('content_header')
    <a href="#" onclick="history.back()">Danh sách từ vựng</a> /
    <a>Tạo từ vựng</a>
@stop


@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo từ vựng mới chủ đề:
                <b style="text-transform: capitalize">{{$topic->title}}</b>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
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
            <form role="form" method="POST" action="{{route('post.vocabulary.create')}}">
                @csrf
                <div class="form-group">
                    <div style="display: none">
                        <label>Loại chủ đề:</label>
                        <select class="form-control" name="topic_id" id="topic">
                            <option value="{{ $topic->id }}">{{$topic->title}}</option>
                        </select>
                    </div>
                    <div>
                        <label>Tên từ vựng:</label>
                        <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div>
                        <label>Loại từ vựng:</label>
                        <select class="form-control" name="word_type">
                            <option value=""> -------------- </option>
                            <option value="Động từ">Động từ</option>
                            <option value="Động từ">Cụm động từ</option>
                            <option value="Danh từ">Danh từ</option>
                            <option value="Danh từ">Cụm danh từ</option>
                            <option value="Tĩnh từ">Tĩnh từ</option>
                            <option value="Tĩnh từ">Cụm tĩnh từ</option>
                        </select>
                    </div>
                    <div>
                        <label>Phát âm:</label>
                        <input name="pronounce" type="text" class="form-control" placeholder="/abc/">
                    </div>
                    <div>
                        <label>Link âm thanh:</label>
                        <input name="audio" type="text" class="form-control" placeholder="http://abc.mp3">
                    </div>
                    <div class="form-group">
                        <label>Cách dùng từ vựng:</label>
                        <textarea name="use" type="text" class="form-control ckeditor" rows="10"></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
@stop