@extends('adminlte::page')

@section('title', 'Sửa phẩn đáp án')

@section('content_header')
@stop

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Sửa phẩn đáp án</h1>
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
        <form role="form" method="POST" action="{{$toeicanswer->id}}" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Câu hỏi:</label>
                <select class="form-control" name="id_question" id="toeic">
                    @foreach($toeicquestions as $toeicquestion)
                    <option @if($toeicquestion->id == $toeicanswer->id_question)
                        {{"selected"}}
                        @endif
                        value="{{ $toeicquestion->id }}">{{$toeicquestion->content}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Đáp án A</label>
                <input name="A" type="text" class="form-control" value="{{$toeicanswer->A}}">
            </div>
            <div class="form-group">
                <label>Đáp án B</label>
                <input name="B" type="text" class="form-control" value="{{$toeicanswer->B}}">
            </div>
            <div class="form-group">
                <label>Đáp án C</label>
                <input name="C" type="text" class="form-control" value="{{$toeicanswer->C}}">
            </div>
            <div class="form-group">
                <label>Đáp án D</label>
                <input name="D" type="text" class="form-control" value="{{$toeicanswer->D}}">
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </form>
    </div>
</div>
@stop