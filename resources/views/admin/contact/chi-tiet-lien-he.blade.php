@extends('adminlte::page')

@section('title', 'English Pro')

@section('content_header')
<!-- <h1 class="text-center">Wellcome to admin page English Pro </h1> -->

@stop

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding-bottom: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Chi tiết câu hỏi </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0 30px !important">
                    <div class="mailbox-read-info">
                        <h3 class="text-center">{{$contact->title}}</h3>
                        <h5>From: {{$contact->student->email}}
                            <span class="mailbox-read-time pull-right">{{Date('d M Y h:m',strtotime($contact->created_at))}}</span></h5>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        {{$contact->content}}
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
                @if( !empty($contact->answer))
                <div class="box-footer bg-gray" style="margin: 20px 30px !important">
                    <h5>Reply: {{Auth::user()->email}}
                        <span class="mailbox-read-time pull-right">{{Date('d M Y h:m',strtotime($contact->updated_at))}}</span></h5>
                    <p>{{$contact->answer}}</p>
                </div>
                @else
                <div class="box-footer" style="padding: 20px 30px !important">
                    <form action="reply/{{$contact->id}}" method="POST">
                    @csrf
                        <textarea class="form-control " name="reply" id="" cols="30" rows="10"></textarea>
                    <div class="pull-right" style="padding-top:20px">
                        <button type="submit" class="btn btn-default"><i class="fa fa-reply"></i> Trả lời</button>
                    </div>
                    </form>
                    <button type="button" style="margin-top:20px" class="btn btn-default"><a href="delete/{{$contact->id}}" class="text-danger"> Xóa</a></button>
                </div>
                @endif
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@stop