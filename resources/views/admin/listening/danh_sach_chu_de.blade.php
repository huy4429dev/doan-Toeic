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
  <div class="box-header">
    <h3 class="box-title">Danh sách chủ đề</h3>
  </div>

  <form action="{{ route('listening.topic.search') }}" method="POST" role="search">
    @csrf
    <div class="box-tools">
      <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left; margin-left: 10px;">
        <input type="text" name="tl" class="form-control pull-right" placeholder="Tìm kiếm">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>
  <!-- /.box-header -->
  <div class="box-body">
    @include('admin.listening.table_chu_de')
  </div>
  <!-- /.box-body -->
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
    $(document).on('click', '.btn-submit', function(e) {
      var topicId = $(this).val();
      var topic = '#topic-' + $(this).val();
      $('div.alert-danger').css('display', 'none');
      $('div.alert-success').css('display', 'none');
      $(document).on('click', 'button.deleteConfirm', function() {
        var confirm = $(this).val();
        if (confirm == "true") {
          $.ajax({
            type: 'GET',
            url: '/admin/listening/delete-topic/' + topicId,
            success: function(data) {

              $('#example2_wrapper').html(data.html);
            }
          });
        }
      })
    });
  })
</script>
@stop