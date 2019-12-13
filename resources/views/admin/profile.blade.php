@extends('adminlte::page')

@section('title', 'Hồ sơ')

@section('content_header')
@stop

@section('content')
<!-- Main content -->
<section class="content" style="padding-top: 0;">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads/image/admin-avatar.jpg')}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$user->name}}</h3>

                    <p class="text-muted text-center">Manage</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">{{rand(1000,10000)}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">{{rand(1000,10000)}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">{{rand(1000,10000)}}</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        {{$user->education}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted">{{$user->address}}</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        @foreach ($skills as $key => $skill)
                        <span class="label label-{{$skill['style']}}">{{$skill['skill']}}</span>
                        @endforeach
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>{{$user->slogan}}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="POST" action="{{route('profile.update',['id' => $user->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Họ tên</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="inputName" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Điện thoại</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="inputName" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Địa chỉ</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" id="inputName" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Slogan</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="slogan" id="inputExperience">{{$user->slogan}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Kĩ năng</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="skill" id="inputSkills" value="{{$user->skill}}  ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Mật khẩu</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="inputSkills" placeholder="*********">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input id="checkbox" type="checkbox"> Đồng ý thay đổi
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button id="submit" type="submit" class="btn btn-danger">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@stop

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var checkbox = document.querySelector('#checkbox');
        var submit = document.querySelector('#submit');
        submit.onclick = function() {
            if (!checkbox.checked) {
                window.alert('Xác nhận trước khi thay đổi !');
                return false;
            }
        }
    })
</script>
@stop