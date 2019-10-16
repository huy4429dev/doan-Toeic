@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

  <h1>Listening</h1>
@stop

@section('content')
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Topics List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th style="width: 80px">Post</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><a href="{{url('admin/listening/topic/1')}}">XXX</a></td>
                  <td>
                      <div> 20/10/2019</div>
                  </td>
                  <td><span class="badge bg-red">10</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                  <div> 20/10/2019</div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                  <div> 20/10/2019</div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                  <div> 20/10/2019</div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
@stop
