@extends('adminlte::page')

@section('title', 'Từ vựng')
@section('content_header')
    <a href="#" onclick="history.back()">Danh sách chủ đề</a> /
    <a>Danh sách từ vựng</a>
@stop
@section('content')

    <div class="box">
        <div class="box-header with-border" style="margin-bottom: 20px">
            <h3 class="box-title">Danh sách từ vựng chủ đề:
                <b style="text-transform: capitalize">{{$topic->title}}</b>
            </h3>
        </div>
        <div>
            <a style="float: right; margin-right: 20px;" href="create/{{$topic->id}}"
               class="btn btn-success btn-add">Thêm</a>

            <form method="POST" action="{{route('post.vocabulary.search',$topic->id)}}" role="search">
                @csrf
                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs"
                         style="width: 200px; float: left; margin-left: 10px;">
                        <input type="text" name="id" value="@if(isset($id)){{$id}}@endif" class="form-control pull-right" placeholder="Tìm kiếm">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- /.box-header -->
        <div class="box-body" style="clear: both;padding-top: 0">
            @if (session('thongbao'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 5px">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                    {{ session('thongbao') }}
                </div>
            @endif
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            {{--title--}}
                            <thead>
                            <tr role="row">
                                <th class="text-center" tabindex="0">id</th>
                                <th class="sorting text-center" tabindex="0">Tên từ vựng</th>
                                <th class="sorting text-center" tabindex="0">Loại từ vựng</th>
                                <th class="sorting text-center" tabindex="0">Phát âm</th>
                                <th class="sorting text-center" tabindex="0">Cách dùng từ vựng</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>
                            </thead>
                            {{--data--}}
                            <tbody>
                            @foreach($post as $item)
                                <a href="http://localhost:8000/admin/dashboard">
                                    <tr role="row" class="odd">
                                        <td class="sorting_1 text-center">{{ $item->id }}</td>
                                        <td class="sorting_1 text-center">{{ $item->title }}</td>
                                        <td class="sorting_1 text-center">{{$item->word_type }}</td>
                                        <td class="sorting_1 text-center">
                                            @if($item->audio != "")
                                                <img id="audio{{$item->id}}" src="/uploads/image/audio_icon_blue.png"
                                                     onclick="playAudio({{$item->id}})"
                                                     au="{{$item->audio}}" style="width: 30px"
                                                     class="audio-icon main-audio" alt="Nghe phát âm">
                                                <br>
                                            @endif
                                            <script>
                                                function playAudio(id) {
                                                    var str = "audio" + id;
                                                    var audio = new Audio(document.getElementById(str).getAttribute("au"));
                                                    audio.play();
                                                }
                                            </script>

                                            {{ $item->pronounce }}
                                        </td>
                                        <td class="sorting_1">{{$item->use }}</td>
                                        <td style="width: 50px;">
                                            <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                        href="update/{{ $item->id }}">Sửa</a></button>
                                        </td>
                                        <td style="width: 50px;">
                                            <button type="button" class="btn btn-block btn-default btn-sm"><a
                                                        href="delete/{{ $item->id }}">Xóa</a></button>
                                        </td>
                                    </tr>
                                </a>
                            @endforeach
                            </tbody>
                            <tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li>{{ $post->links() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@stop