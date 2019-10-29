@extends('adminlte::page')

@section('title', 'Từ vững')
@section('content_header')
    <a href="#" onclick="history.back()">Danh sách chủ đề</a> /
    <a>Tạo chủ đề</a>
@stop

@section('content_header')
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo chủ đề từ vững</h3>
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
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div style="display: none">
                        <label>Loại chủ đề:</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach($data as $category)
                                @if($category->id === 1)
                                    <option selected value="{{ $category->id }}">{{$category->name}}</option>
                                @else
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Tên chủ đề:</label>
                        <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div>
                        <label>Hình ảnh:</label>
                        <input class="btn btn-app" type="file" name="thumbnail" multiple>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@stop