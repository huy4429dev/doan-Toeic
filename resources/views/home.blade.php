<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./font-anwesome/css/all.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="nav">
                    <div>
                        <div class="logo">
                            <h3><a href="{{route('home')}}">ENGLISH PRO</a></h3>
                        </div>
                        <ul class="page-member">
                            <li><a href="{{route('about')}}">Giới thiệu</a></li>
                            <li><a href="{{route('contact')}}">Đặt câu hỏi</a></li>
                            <li><a href="{{route('blog')}}">Tin tức</a></li>
                        </ul>

                    </div>
                    <div>
                        <div class="user-login">
                            @if(!Session::has('user'))
                                <a href="#" id="myBtn">ĐĂNG NHẬP </a>
                            @else

                                <img src="uploads/image/{{  empty(Session::get('user')->avatar) ? 'user_icon.png' : Session::get('user')->avatar }}"
                                     style="width: 42px;height: 42px;border-radius: 50%;position: relative;left: -5px;top: -3px;"
                                     ; alt="">
                                <span>{{Session::get('user')->name}}</span>
                                <ul class="user-info">
                                    <li><a href="{{route('student-profile')}}">Tài khoản</a></li>
                                    <li><a href="{{route('student-logout')}}">Đăng xuất</a></li>
                                </ul>
                            @endif
                        </div>
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div class="form-login">
                                    <form action="{{route('student-login')}}" method="post">
                                        @csrf
                                        <p class="login-error"
                                           style="display:none; color:red;padding:0;margin:0;    margin-left: 52px;">
                                            Sai tên đăng nhập hoặc mật khẩu

                                        </p>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email"
                                                   value="member@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Mật khấu"
                                                   value="123456">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" id="btn-submit" name="login" value="Đăng Nhập">
                                        </div>
                                        <a href="dang-ky-user">Đăng ký tài khoản </a>
                                    </form>
                                </div>
                                <img id="form-login-img" src="uploads/image/login-user.png" alt="">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="box-full" style="padding: 50px;">

        <div class="container">
            <div class="row">
                <div class="slider" style="box-shadow: 1px 1px 7px 0px #00000045;">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="uploads/image/learn-english-writing-grammar-online.png" alt="Los Angeles"
                                     style="width:1100px; height:618px">
                                <div class="carousel-caption">
                                    <h3>English Pro</h3>
                                    <p>We will become "English Hero" </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="uploads/image/english-course.jpg" alt="Chicago"
                                     style="width:1100px; height:618px">
                                <div class="carousel-caption" style="color: black;bottom: 26px;">
                                    <h3>English Pro</h3>
                                    <p>Step by step </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="uploads/image/meses-en-ingles-1024x683.jpg"
                                     style="width:1100px; height:618px">
                                <div class="carousel-caption" style="color: #673AB7;bottom: 104px;">
                                    <h3>English Pro</h3>
                                    <p>Learn every day</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid full-bgr">
        <div class="content">
            <div class="learn">
                <div class="container">
                    <h2 style="    padding: 30px 0 20px;">Chương Trình Học</h2>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="learn-cate box">
                                <h2 class="slogan">
                                    Lấy lại nền tảng tiếng Anh căn bản
                                    <p>Bạn muốn <b>lấy lại nền tảng tiếng Anh</b> trước khi bắt đầu luyện thi?</p>
                                </h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="one-cate">
                                            <div class="cate-ava">
                                                <img src="./uploads/image/luyen_nghe_toeic.png" alt="ngu phap">
                                            </div>
                                            <div class="title">
                                                <h3>
                                                    Cải thiện kĩ năng nghe tiếng Anh
                                                </h3>
                                                <p class="excerpt">
                                                    Vừa luyện nghe, vừa chơi game!
                                                </p>
                                            </div>
                                            <div class="go-learn">
                                                <a href="{{route('listening',[1])}}">CẢI THIỆN KĨ NĂNG NGHE</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="one-cate">
                                            <div class="cate-ava">
                                                <img src="./uploads/image/600_tu_vung_toeic.png" alt="ngu phap">
                                            </div>
                                            <div class="title">
                                                <h3>
                                                    Học ngữ pháp tiếng Anh căn bản
                                                </h3>
                                                <p class="excerpt">
                                                    với Chương trình Ngữ Pháp PRO
                                                </p>
                                            </div>
                                            <div class="go-learn">
                                                <a href="{{ route('showGramar') }}">Học ngữ pháp căn bản</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="one-cate" style="margin:auto">
                                        <div class="cate-ava">
                                            <img src="./uploads/image/ngu_phap_toeic.png" alt="ngu phap">
                                        </div>
                                        <div class="title">
                                            <h3>
                                                Học 600 từ vựng hay gặp trong TOEIC
                                            </h3>
                                            <p class="excerpt">
                                                được chia theo chủ đề, với đầy đủ thông tin về từ
                                            </p>
                                        </div>
                                        <div class="go-learn">
                                            <a href="tu-vung">HỌC 600 TỪ VỰNG TOEIC</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="toeic">
                                        <h3>Luyện thi TOEIC</h3>
                                        <p>Bạn <b>đã nắm được ngữ pháp và từ vựng</b> tiếng Anh căn bản?</p>
                                        <a href="toeic/danh-sach-de-thi" class="go-toeic">BẮT ĐẦU LUYỆN NGAY</a>
                                    </div>
                                </div>

                            </div>
                            <div class="learn-today box">
                                <h3>
                                    Đề xuất bạn học hôm nay
                                </h3>
                                <div class="card-learn">
                                    <div class="blog-learn">
                                        <div class="cate-ava">
                                            <img src="./uploads/gramar/{{$topicGramarRandom->thumbnail}}" alt="">
                                        </div>
                                        <h4>{{$topicGramarRandom->title}}</h4>
                                    </div>
                                    <div class="go-learn">
                                        <a href="ngu-phap-tieng-anh/{{$topicGramarRandom->id}}/{{$topicGramarRandom->title}}.html">HỌC</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="rank-user">
                                @if(Session::has('user'))

                                    <div class="user-info box">
                                        <div class="user-head">
                                            <div class="user-avatar">
                                                <img src="uploads/image/{{  empty(Session::get('user')->avatar) ? 'user_icon.png' : Session::get('user')->avatar }}"
                                                     alt="avatar">
                                            </div>
                                            <h3 class="user-name">
                                                {{Session::get('user')->name}}
                                            </h3>
                                            <img src="./uploads/image/level_1.png" alt="" class="user-level">

                                        </div>
                                        <div class="user-deltail-socre">
                                            <!-- <div class="score-of-week">
                                                <p class="score-title">
                                                    Điểm tuần này
                                                </p>
                                                <p class="score">
                                                    0
                                                </p>
                                            </div>
                                            <div class="score-of-week">
                                                <p class="score-title">
                                                    Hạng tuần này
                                                </p>
                                                <p class="score">
                                                    > 100
                                                </p>
                                            </div> -->
                                            <div class="score-of-week">
                                                <p class="score-title">
                                                    Tổng điểm
                                                </p>
                                                <p class="score score-total" style="color: #87c52e;">
                                                    {{Session::get('user')->score}}
                                                </p>
                                            </div>
                                            <div class="score-of-week">
                                                <p class="score-title">
                                                    Xếp hạng
                                                </p>
                                                <p class="score-rank">
                                                    {{$userRank}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="chart box" style="padding-bottom:12px">
                                    <div class="chart-head">
                                        <div class="chart-img">
                                            <img src="./uploads/image/icon_ranking.png" alt="">
                                        </div>
                                        <div class="chart-title">
                                            <h2>Bảng xếp hạng</h2>
                                            <img src="./uploads/image/icon_question.png" alt="">
                                        </div>
                                    </div>
                                    <div class="chart-list">
                                        <div class="chart-button">
                                            <button>Tổng Xếp hạng</button>
                                        </div>
                                        <ul class="chart-week">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($users as $user)
                                                <li class="one-user">
                                                    <div class="rank-number">{{$i}}</div>
                                                    <div class="user-info-rank">
                                                        <img class="avartar" src="./uploads/image/{{$user->avatar}}"
                                                             alt="">
                                                        <span class="user-name">
                                                            {{$user->name}}
                                                        </span>
                                                        <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                    </div>
                                                    <div class="chart-score">
                                                        {{$user->score}}
                                                    </div>
                                                </li>
                                                @php
                                                    $i++
                                                @endphp
                                            @endforeach
                                        </ul>
                                        <!-- <ul class="chart-total">
                                            <li class="one-user">
                                                <div class="rank-number">1</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">2</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">3</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">4</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">5</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">6</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">7</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">8</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">9</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                            <li class="one-user">
                                                <div class="rank-number">10</div>
                                                <div class="user-info-rank">
                                                    <img class="avartar" src="./uploads/image/hienWQ3.png" alt="">
                                                    <span class="user-name">
                                                            Hien
                                                     </span>
                                                    <img class="medal" src="./uploads/image/level_70.png" alt="">
                                                </div>
                                                <div class="chart-score">
                                                    8709
                                                </div>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="padding: 0 30px  20px 30px;">Tiếng Anh Mỗi Ngày Blog</h2>
                            <div class="blog-list box">
                                <div class="row">
                                    @if(!$blogs->isEmpty())
                                        <div class="col-md-6">
                                            <div class="post-to-day">
                                                <div class="card card-box">
                                                    <a href="./blog/{{$blogs->first()->id}}"><img
                                                                src="./uploads/article/{{$blogs->first()->thumbnail}}"
                                                                class="card-img-top" alt="..."></a>
                                                    <div class="card-body">
                                                        <a href="./blog/{{$blogs->first()->id}}">
                                                            <h5 class="card-title box-title">{{$blogs->first()->title}}</h5>
                                                        </a>
                                                        <a href="./blog/{{$blogs->first()->id}}">
                                                            <p class="card-text box-text">{{$blogs->first()->summary}}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="post-box">
                                                @foreach($blogs as $blog)
                                                    @if($blog->id == $blogs->first()->id)
                                                        @php
                                                            continue;
                                                        @endphp
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="post">
                                                                <a href="./blog/{{$blog->id}}"><img
                                                                            src="./uploads/article/{{$blog->thumbnail}}"
                                                                            alt=""></a>
                                                                <h4 class="title-post" style="padding: 2px 22px;">
                                                                    <a style="    color: gray;font-weight: 400;"
                                                                       href="./blog/{{$blog->id}}"> {{$blog->title}}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <div id="bottom">
        <div class="container">
            <div data-footer-accordion="" class="footer-link">
                <div class="row">
                    <div class="col-md-4">
                        <div class="item">
                            <h3 class="link-title active">• Về Tiếng Anh Mỗi Ngày <span
                                        class="icon icon-bt_up hidden-md hidden-lg"></span></h3>
                            <div class="wrap-link show">
                                <ul class="links">
                                    <li><a href="/about/?r=footer">Giới thiệu về Tiếng Anh Mỗi Ngày</a></li>
                                    <li>
                                        <a href="https:/tienganhmoingay.com/ket-qua-thi-toeic-hoc-vien/?r=footer"
                                           title="Kết quả thi TOEIC của học viên">Kết quả thi TOEIC của học viên</a>
                                    </li>
                                    <li><a href="/jobs/?r=footer" title="Tuyển dụng">Tuyển dụng</a></li>
                                    <li><a href="/terms/?r=footer">Điều khoản sử dụng</a></li>
                                    <li><a href="/privacy-policy/?r=footer">Chính sách bảo mật</a></li>
                                    <li><a href="https:/tienganhmoingay.com/huong-dan/chinh-sach-diem-thuong/?r=footer">Chính
                                            sách tặng điểm thưởng</a></li>
                                    <li>
                                        <a href="https:/tienganhmoingay.com/huong-dan/cac-chinh-sach-uu-dai-khac/?r=footer">Chính
                                            sách ưu đãi khi mua tài khoản</a></li>
                                    <li>
                                        <a href="https:/tienganhmoingay.com/huong-dan/chinh-sach-bao-luu-cong-them-ngay-dung/?r=footer"
                                           title="Chiến sách cộng thêm ngày sử dụng">Chính sách bảo lưu &amp; cộng thêm
                                            ngày sử dụng</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item contact-block">
                            <h3 class="link-title">• Chăm sóc khách hàng <span
                                        class="icon icon-bt_up hidden-md hidden-lg"></span></h3>
                            <div class="wrap-link">
                                <ul class="links">
                                    <li><a style="margin: 0; padding: 0;"
                                           href="/huong-dan/cach-hoc-tren-tieng-anh-moi-ngay/?r=footer"
                                           title="Hướng dẫn cách học">Hướng dẫn cách học</a>
                                    </li>
                                    <li><a style="margin: 0; padding: 0;" href="/pay/?r=footer"
                                           title="Hướng dẫn thanh toán">Hướng dẫn thanh toán</a>
                                    </li>
                                </ul>
                                <p class="intro-text">Chúng tôi cam kết hỗ trợ bạn <span>tối đa (9am - 9pm)</span></p>
                                <ul class="links">
                                    <li><a href="javascript:;" title="0916 92 1419"><span
                                                    class="glyphicon glyphicon-earphone"></span> 0916 92 1419</a>
                                    </li>
                                    <li><a href="/contact/?r=footer" title="Gửi tin"><span
                                                    class="glyphicon glyphicon-edit"></span>Gửi tin</a>
                                    </li>
                                    <li><a href="javascript:;" title="support@tienganhmoingay.com"><span
                                                    class="glyphicon glyphicon-envelope"></span>
                                            support@tienganhmoingay.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item share-block">
                            <h3 class="link-title">• Kết nối <span class="icon icon-bt_up hidden-md hidden-lg"></span>
                            </h3>
                            <div class="wrap-link">
                                <ul class="links" style="margin-bottom: 0;">
                                    <li style="width: 100%; margin: 0 0 10px;">
                                        <div class="fb-like fb_iframe_widget" data-href="https:/tienganhmoingay.com"
                                             data-layout="button_count" data-action="like" data-show-faces="true"
                                             data-share="true" fb-xfbml-state="rendered"
                                             fb-iframe-plugin-query="action=like&amp;app_id=956108007815000&amp;container_width=246&amp;href=https%3A%2F%2Ftienganhmoingay.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true">
                                            <span style="vertical-align: bottom; width: 134px; height: 20px;"><iframe
                                                        name="f75a79518cde6" width="1000px" height="1000px"
                                                        title="fb:like Facebook Social Plugin" frameborder="0"
                                                        allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                        allow="encrypted-media"
                                                        src="https:/www.facebook.com/v2.12/plugins/like.php?action=like&amp;app_id=956108007815000&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3f62dc3ec6f14c%26domain%3Dtienganhmoingay.com%26origin%3Dhttps%253A%252F%252Ftienganhmoingay.com%252Ff28b7f38b21596c%26relation%3Dparent.parent&amp;container_width=246&amp;href=https%3A%2F%2Ftienganhmoingay.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"
                                                        style="border: none; visibility: visible; width: 134px; height: 20px;"
                                                        class=""></iframe></span></div>
                                    </li>
                                    <li>
                                        <a href="http:/facebook.com/tienganhmoingayonline" target="_blank"><img
                                                    src="./uploads/image/facebook_icon.png"
                                                    alt="Tiếng Anh Mỗi Ngày Facebook Page"></a>
                                    </li>
                                    <li>
                                        <a href="http:/youtube.com/tienganhmoingayonline" target="_blank"><img
                                                    src="./uploads/image/youtube_icon.png"
                                                    alt="Tiếng Anh Mỗi Ngày YouTube "></a>
                                    </li>
                                </ul>
                                <p class="intro-text">Like Page để học tiếng Anh hàng ngày</p>
                                <div class="fb-page fb_iframe_widget"
                                     data-href="https:/www.facebook.com/tienganhmoingayonline/" data-tabs="timeline"
                                     data-height="150" data-small-header="true" data-adapt-container-width="true"
                                     data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered"
                                     fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=956108007815000&amp;container_width=246&amp;height=150&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftienganhmoingayonline%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline">
                                    <span style="vertical-align: bottom; width: 246px; height: 150px;"><iframe
                                                name="f100495a062a328" width="1000px" height="150px"
                                                title="fb:page Facebook Social Plugin" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                allow="encrypted-media"
                                                src="https:/www.facebook.com/v2.12/plugins/page.php?adapt_container_width=true&amp;app_id=956108007815000&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df76fbd7eae0818%26domain%3Dtienganhmoingay.com%26origin%3Dhttps%253A%252F%252Ftienganhmoingay.com%252Ff28b7f38b21596c%26relation%3Dparent.parent&amp;container_width=246&amp;height=150&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftienganhmoingayonline%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline"
                                                style="border: none; visibility: visible; width: 246px; height: 150px;"
                                                class=""></iframe></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="./jquery-3.4.1.min.js "></script>
<script src="https:/cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https:/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="./js/script.js "></script>
<script>
    let displayProfile = false;
    document.querySelector('.user-login span').addEventListener('click', function () {
        if (displayProfile == true) {
            document.querySelector('.user-info').style.display = 'none';
            displayProfile = false;
        } else {
            document.querySelector('.user-info').style.display = 'block';
            displayProfile = true;
        }
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn-submit").click(function (e) {

        e.preventDefault();

        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();

        $.ajax({
            type: 'POST',
            url: "user/login",
            data: {
                password: password,
                email: email
            },
            success: function (data) {
                if (data.success == 1) {
                    window.location.href = "{{route('home')}}"
                    $('#myBtn').replaceWith(' <i class="fas fa-user-circle"></i><span>' + data.username + '</span> <ul class="user-info"><li><a href="user/profile">Tài khoản</a></li><li><a href="{{route("student-logout")}}">Đăng xuất</a></li></ul>');
                    $('#myModal').css('display', 'none');
                    $(document).on('click', '.user-login span', function () {
                        $('.user-info').toggle();
                    });
                } else {
                    $('.login-error').css('display', 'block');
                }
            }
        });

    });
</script>
</body>

</html>