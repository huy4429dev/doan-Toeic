@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content_header')
<h1>Listening</h1>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cập nhật chủ đề</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{$topic->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="alert alert-danger" style="display:none">
            </div>
            <div class="alert alert-success alert-dismissible" style="display:none">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{$topic->title}}" name="title">
            </div>
            <div class="form-group">
                <label>Thumbnail</label>
                <div>
                    <img id="img-thumb"width="70px" height="70px" src="/uploads/listening/{{ $topic->thumbnail }}" style="    margin-bottom: 10px;" />
                </div>
                <input id="file" class="btn btn-app" type="file" name="thumbnail" multiple style="margin-left: 0;">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button id="btn-submit" type="submit" class="btn btn-primary">Cập nhật</button>
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
      $('alert-danger').css('display', 'none');
      $('div.alert-success').css('display', 'none');
      $('#btn-submit').html('Cập nhật ...')
      $.ajax({
        type: 'POST',
        url: '{{url("admin/listening/update-topic/$topic->id")}}',
        contentType: false,
        processData: false,
        data: formData,
        success: function(data) {
          $('#btn-submit').html('Cập nhật');

          if (data.errors) {
            $('div.alert-danger').css('display', 'block');
            $('.alert-danger').html(data.errors[0]);
          } else {
            console.log(data);
            $('div.alert-success').css('display', 'block');
            $('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  <h4><i class="icon fa fa-check"></i> Thông báo</h4>' + data.success);
            $('#img-thumb').attr('src','/uploads/listening/'+ data.thumbnail);
          }
        },
      });
    });
  })
</script>
@stop