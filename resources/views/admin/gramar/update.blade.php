@extends('adminlte::page')

@section('title', 'Trang quản trị')

@section('content_header')
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
            <form role="form" method="POST" action="{{$gramar->id}}" enctype="multipart/form-data">
                @csrf


                <div class="form-group">

                    <div>
                        <label>Loại chủ đề:</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach($categorys as $category)
                                @if($category->id === 2)
                                    <option selected value="{{ $category->id }}">{{$category->name}}</option>
                                @else
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label>Tên chủ đề:</label>
                    <input name="title" type="text" class="form-control" value="{{$gramar->title}}">
                    <label> Hình ảnh:</label>
                    <input class="btn btn-app" type="file" name="thumbnail" multiple value="{{ $gramar->thumbnail }}">
                    <p><img width="100px;" src="/uploads/gramar/{{ $gramar->thumbnail }}"/></p>
                    <br>
                    <label>Cấp độ học ngữ pháp:</label>
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
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@stop

