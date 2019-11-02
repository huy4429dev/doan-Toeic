<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role="row">
                        <th tabindex="0">id</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Time</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                    <div class="alert alert-success alert-dismissible" style="margin: 10px 0 20px; display:none">
                    </div>
                </thead>
                <tbody>

                    @foreach($topics as $topic)
                    <tr role="row" class="odd" id="topic-{{$topic->id}}">
                        <td class="sorting_1">{{ $topic->id }}</td>
                        <td class="sorting_1"> <a href="{{url('admin/listening/topic/'.$topic->id)}}">{{ $topic->title }}</a></td>
                        <td class="sorting_1"><img width="70px" height="70px" src="/uploads/listening/{{ $topic->thumbnail }}" /></td>
                        <td>{{$topic->created_at}}</td>
                        <td style="width: 50px;">
                            <a class="btn btn-primary" href="listening/update-topic/{{ $topic->id }}">Sửa</a>
                        </td>
                        <td style="width: 50px;">
                            <button class="btn btn-danger btn-submit" value="{{$topic->id }}">Xóa</button>
                        </td>

                    </tr>

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
                    {!! $topics->render() !!}
                </ul>
            </div>
        </div>
    </div>
</div>