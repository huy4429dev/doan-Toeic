@extends('adminlte::page')

@section('title', 'English Pro')

@section('content_header')
<!-- <h1 class="text-center">Wellcome to admin page English Pro </h1> -->

@stop

@section('content')
<section class="content" style="padding: 0 15px !important;">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Question </h3>

                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @if(!$contacts->isEmpty())
                                @foreach($contacts as $contact)
                                <tr>
                                    <td style="width:100px ; text-align:center">{{$id}}</td>
                                    <td style="width: 200px;" class="mailbox-name"><b>{{$contact->student->name}}</b></td>
                                    <td class="mailbox-subject"><a href="contact/{{$contact->id}}">{{$contact->title}}</a>
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">{{$contact->created_at}}</td>
                                    @if($contact->view === 1)
                                    <td class="text-right"><span class="bg-blue text-right" style="padding: 3px 12px;width:54px;text-align: center;    font-size: 12px">Đã xem</span></td>
                                    @else
                                    <td class="text-right"><span class="bg-yellow text-right" style="padding: 3px 6px;width:54px;text-align: center;    font-size: 12px">Chưa xem</span></td>

                                    @endif
                                </tr>
                                @php
                                $id++
                                @endphp
                                @endforeach
                                @else
                                <h4 class="text-warning text-center">Chưa có câu hỏi nào @@</h4>
                                @endif
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <div class="pull-right">
                            <div class="btn-group">
                                {{ $contacts->links() }}
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@stop