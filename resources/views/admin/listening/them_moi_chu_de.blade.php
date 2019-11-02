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
    <h3 class="box-title">Thêm mới chủ đề</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form id="form-submit" role="form" action="{{route('listening.topic.add')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
      <div class="alert alert-danger" style="display:none">
      </div>
      <div class="alert alert-success alert-dismissible" style="display:none">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
      </div>
      <div class="form-group">
        <label>Thumbnail</label>
        <input id="file" class="btn btn-app" type="file" name="thumbnail" multiple style="margin-left:0">

      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button id="btn-submit" type="submit" class="btn btn-primary">Thêm</button>
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