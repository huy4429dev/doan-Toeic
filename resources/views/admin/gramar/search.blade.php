@extends('adminlte::page')

@section('title', 'Tìm kiếm chủ đề ngữ pháp')

@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Danh mục tìm kiếm</h3>
    <h4>Tìm kiếm thấy : {{count($gramar)}} chủ đề </h4>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table">
      <tbody>
        <tr>
          <th style>Tiêu đề chủ đề</th>
          <th style="width: 40px"></th>
        </tr>
        @if (session('thongbao'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Thông báo</h4>
          {{ session('thongbao') }}
        </div>
  </div>
  @endif

  @foreach($gramar as $gr)
  <tr>

    <td>{{ $gr->title }}</td>
    <td style="width: 50px;">
      <button type="button" class="btn btn-block btn-default btn-sm"><a href="update/{{ $gr->id }}">Sửa</a></button>
    </td>
    <td style="width: 50px;">
      <button type="button" class="btn btn-block btn-default btn-sm"><a href="delete/{{ 
                    $gr->id }}">Xóa</a></button>
    </td>
  </tr>

  @endforeach
  </tbody>
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
  <ul class="pagination pagination-sm no-margin pull-right">
    <li>{{ $gramar->links() }}</li>
  </ul>
</div>

</div>
@stop