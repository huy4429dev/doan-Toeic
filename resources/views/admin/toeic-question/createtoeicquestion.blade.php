@extends('adminlte::page')

@section('title', 'Câu hỏi đề thi')

@section('content_header')
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tạo câu hỏi đề thi</h3>
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
        <form role="form" method="POST" action="/admin/toeic-question/create/{{$toeicparttow->id}}/{{$toeicexamtow->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div>
                    <label>Đề thi:</label>
                    <select class="form-control" name="toeic_exam_id" id="toeic" disabled>
                        <option value="{{ $toeicexam->id }}">{{$toeicexam->title}}</option>
                    </select>
                </div>
                <div>
                    <label>Phần đề thi:</label>
                    <select class="form-control" name="toeic_part_id" id="toeic" disabled>
                        <option value="{{ $toeicpart->id }}">{{$toeicpart->title}}</option>
                    </select>
                </div>
                <label> Hình ảnh  </label>
                <input class="btn btn-app" type="file" name="thumbnail" multiple>
                <label>Đáp án đúng:</label>
                <select name="answer" id="" class="form-control">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <br>
                <label>Chi tiết câu hỏi:</label>
                <textarea name="content" type="text" class="form-control ckeditor" rows="10"></textarea>
                <label>Đáp án A:</label>
                <input name="A" type="text" class="form-control" placeholder="Nhâp đáp án">
                <label>Đáp án B:</label>
                <input name="B" type="text" class="form-control" placeholder="Nhập đáp án">
                <label>Đáp án C:</label>
                <input name="C" type="text" class="form-control" placeholder="Nhâp đáp án">
                <label>Đáp án D:</label>
                <input name="D" type="text" class="form-control" placeholder="Nhâp đáp án">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>
@stop