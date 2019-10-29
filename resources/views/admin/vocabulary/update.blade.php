@extends('adminlte::page')

@section('title', 'Trang quản trị')

@section('content_header')
    <a href="#" onclick="history.back()">Danh sách chủ đề</a> /
    <a>Sửa chủ đề</a>
@stop


@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Sửa chủ đề ngữ pháp</h1>
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
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <label>Loại chủ đề:</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($cate as $item)
                            @if($item->id === $topic->category_id)
                                <option selected value="{{ $item->id }}">{{$item->name}}</option>
                            @else
                                <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Tên chủ đề:</label>
                    <input name="title" type="text" class="form-control" value="{{$topic->title}}">
                    <label> Hình ảnh:</label>
                    <input class="btn btn-app" type="file" name="thumbnail" multiple value="{{ $topic->thumbnail }}">
                    <p><img width="100px;" src="/uploads/gramar/{{ $topic->thumbnail }}"/></p>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@stop

