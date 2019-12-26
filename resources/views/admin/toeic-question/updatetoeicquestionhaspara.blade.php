@extends('adminlte::page')

@section('title', 'Sửa phẩn đề thi')

@section('content_header')
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>

<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Sửa phẩn câu hỏi</h1>
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
        <form role="form" method="POST" action="{{$toeicquestion->id}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div>
                    <label>Đề thi:</label>
                    <select class="form-control" name="toeic_exam_id" id="toeic" disabled>
                        <option value="{{ $toeicexam->id }}">{{$toeicexam->title}}</option>
                    </select>
                </div>
                <div>
                    <label>Chọn đoạn văn:</label>
                    <select class="form-control" name="toeic_para_id" id="toeic">
                        @foreach($toeicpara as $toeicpara)
                         @if($toeicpara->id == $toeicquestion->toeicPara->id)
                         <option value="{{ $toeicpara->id }}" selected>{{$toeicpara->title}}</option>

                         @php continue
                         @endphp
                         @endif 
                        <option value="{{ $toeicpara->id }}">{{$toeicpara->title}}</option>
                        @endforeach
                    </select>
                </div>
                <label> Hình ảnh </label>
                @if($toeicquestion->thumbnail)
                <p><img width="100px;" src="/uploads/toeic/{{ $toeicquestion->thumbnail }}" />
                @endif
                    <input type="file" name="thumbnail" class="form-control">
                    <label>Đáp án:</label>
                    <input name="answer" value="{{$toeicquestion->answer}}" type="text" class="form-control" placeholder="Ví du: A hoặc B C D">
                    <label>Nội dung câu hỏi : </label>
                    <textarea name="content" type="text" class="form-control ckeditor" rows="10">{{$toeicquestion->content}}</textarea>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </form>
    </div>
</div>
@stop