@extends('adminlte::page')

@section('title', 'Tìm kiếm bài viết')

@section('content')

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Danh mục tìm kiếm</h3>
        <h4>Tìm kiếm thấy : {{count($posts)}} bài viết </h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table">
            <tbody>
                <tr>
                    <th tabindex="0">id</th>
                    <th class="sorting" tabindex="0">Tiêu đề bài viết</th>
                    <th class="sorting" tabindex="0">Tóm tắt bài viết</th>
                    <th class="sorting" tabindex="0">Hình ảnh</th>
                    <th tabindex="0"></th>
                    <th tabindex="0"></th>
                </tr>
                @if (session('thongbao'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                    {{ session('thongbao') }}
                </div>
    </div>
    @endif

    @foreach($posts as $post)
    <tr role="row" class="odd">
        <td class="sorting_1">{{ $post->id }}</td>
        <td class="sorting_1">{{ $post->title }}</td>

        <td class="sorting_1">{{ $post->summary }}</td>
        <td class="sorting_1"><img width="70px;" src="/uploads/article/{{ $post->thumbnail }}" />
        </td>
        <td style="width: 50px;">
            <button type="button" class="btn btn-block btn-default btn-sm"><a href="update/{{$post->id}}">Sửa</a></button>
        </td>
        <td style="width: 50px;">
            <button type="button" class="btn btn-block btn-default btn-sm"><a href="delete/{{$post->id}}">Xóa</a></button>
        </td>
    </tr>

    @endforeach
    </tbody>
    </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
        <li>{{ $posts->links() }}</li>
    </ul>
</div>
</div>
@stop