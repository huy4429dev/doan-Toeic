@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
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
@section('js')
<script type="text/javascript">
  $('document').ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $("#btn-submit").click(function(e) {
      e.preventDefault();
      var title = $("input[name=title]").val();
      var thumbnail = $('#file').prop('files')[0];
      var formData = new FormData();
      formData.append('title', title);
      formData.append('thumbnail', thumbnail);
      $('div.alert-danger').css('display', 'none');
      $('div.alert-success').css('display', 'none');
      $('#btn-submit').html('Thêm ...')
      $.ajax({
        type: 'POST',
        url: '/admin/listening/add-topic',
        contentType: false,
        processData: false,
        data: formData,
        success: function(data) {
          $('#btn-submit').html('Thêm');

          if (data.errors) {
            console.log(data.errors);
            data.errors.forEach(function(error) {
              console.log(error);
            })
            $('div.alert-danger').css('display', 'block');
            $('.alert-danger').html(data.errors[0]);
          } else {
            $('div.alert-success').css('display', 'block');
            $('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  <h4><i class="icon fa fa-check"></i> Thông báo</h4>' + data.success);
          }
        },
      });
    });
  })
</script>
@stop