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

                                <img src="uploads/image/{{  empty(Session::get('user')->avatar) ? 'user_icon.png' : Session::get('user')->avatar }}" style="width: 42px;height: 42px;border-radius: 50%;position: relative;left: -5px;top: -3px;" ; alt="">
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
                                            <p class="login-error" style="display:none; color:red;padding:0;margin:0;    margin-left: 52px;">
                                                Sai tên đăng nhập hoặc mật khẩu

                                            </p>
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Email" value="member@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Mật khấu" value="123456">
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
        <div class="main-content">
            <div class="container bgr-white">
                <div class="article-nav-wrapper">
                    <nav class="article-nav-contact pb-5">
                        <ul class="text-center contact-feature">
                            <li data-id="contact-question" class="contact-question">
                                Đặt câu hỏi
                            </li >
                            @if(Session::has('user'))
                            <li data-id="my-contact" class="my-contact">
                                Câu hỏi của bạn
                            </li>
                            @endif
                            <li data-id="list-contact" class="list-contact">
                                Câu hỏi mới
                            </li>
                        </ul>
                    </nav>
                    <div class="full-toeic-test">
                        <div style="margin-bottom: 60px;">
                            <h1 class="test-name text-center">
                                Viết câu hỏi của bạn
                            </h1>
                            <div style="text-align: center;" class="pb-5">
                                <p>
                                    Bạn có thể hỏi bất kì điều gì về tiếng Anh <br /> (từ vựng, ngữ pháp, giải một câu hỏi cụ thể, kinh nghiệm học, ...)</p>
                            </div>
                            <div class="form-contact contact" id="contact-question">
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{route('student-contact')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="font-size: 20px;margin-left: 14px;    margin-right: 12px;">Tựa đề</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Câu hỏi của bạn về vấn đề gì ?" style="    width: 628px;height: 36px;" name="title" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Nội dung câu hỏi" name="content" required></textarea>
                                    </div>
                                    @if(Session::has('user'))
                                    <input type="text" value="{{Session::get('user')->id}}" hidden name="student_id" required>
                                    @endif
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="send-contact" value="Gửi câu hỏi">
                                    </div>
                                </form>
                            </div>
                            @if(Session::has('user'))
                            <div id="my-contact" class="my-contact contact" style="width:700px; margin:auto; display:none">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Câu trả lời</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$myContacts->isEmpty())
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($myContacts as $contact)
                                        @if(empty($contact->answer))
                                        <tr style="background: #dee2e6;">
                                        @else
                                        <tr style="background: #fff;">
                                        @endif
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$contact->content}}</td>
                                            <td width="300px">{{ empty($contact->answer) ? 'Chưa có câu trả lời ' : $contact->answer }}</td>
                                            <td>{{@$contact->created_at}}</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                        @else 
                                            <h4 class="text-warning text-center">Bạn chưa hỏi câu hỏi nào :D</h4>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            <div id="list-contact" class="all-contact contact" style="width:700px; margin:auto;padding-bottom: 50px;; display:none">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Câu trả lời</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$allContact->isEmpty())
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($allContact as $contact)
                                        @if(empty($contact->answer))
                                        <tr style="background: #dee2e6;">
                                        @else
                                        <tr style="background: #fff;">
                                        @endif
                                            <th scope="row">{{$i}}</th>
                                            <td width="300px">{{$contact->content}}</td>
                                            <td>{{ empty($contact->answer) ? 'Chưa có câu trả lời ' : $contact->answer }}</td>
                                            <td>{{@$contact->created_at}}</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                        @else 
                                            <h4 class="text-warning text-center">Bạn chưa hỏi câu hỏi nào :D</h4>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </main>`
    <footer>
        <div id="bottom">
            <div class="container">
                <div data-footer-accordion="" class="footer-link">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="item">
                                <h3 class="link-title active">• Về Tiếng Anh Mỗi Ngày <span class="icon icon-bt_up hidden-md hidden-lg"></span></h3>
                                <div class="wrap-link show">
                                    <ul class="links">
                                        <li><a href="/about/?r=footer">Giới thiệu về Tiếng Anh Mỗi Ngày</a></li>
                                        <li>
                                            <a href="https:/tienganhmoingay.com/ket-qua-thi-toeic-hoc-vien/?r=footer" title="Kết quả thi TOEIC của học viên">Kết quả thi TOEIC của học viên</a>
                                        </li>
                                        <li><a href="/jobs/?r=footer" title="Tuyển dụng">Tuyển dụng</a></li>
                                        <li><a href="/terms/?r=footer">Điều khoản sử dụng</a></li>
                                        <li><a href="/privacy-policy/?r=footer">Chính sách bảo mật</a></li>
                                        <li><a href="https:/tienganhmoingay.com/huong-dan/chinh-sach-diem-thuong/?r=footer">Chính sách tặng điểm thưởng</a></li>
                                        <li><a href="https:/tienganhmoingay.com/huong-dan/cac-chinh-sach-uu-dai-khac/?r=footer">Chính sách ưu đãi khi mua tài khoản</a></li>
                                        <li><a href="https:/tienganhmoingay.com/huong-dan/chinh-sach-bao-luu-cong-them-ngay-dung/?r=footer" title="Chiến sách cộng thêm ngày sử dụng">Chính sách bảo lưu &amp; cộng thêm ngày sử dụng</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item contact-block">
                                <h3 class="link-title">• Chăm sóc khách hàng <span class="icon icon-bt_up hidden-md hidden-lg"></span></h3>
                                <div class="wrap-link">
                                    <ul class="links">
                                        <li><a style="margin: 0; padding: 0;" href="/huong-dan/cach-hoc-tren-tieng-anh-moi-ngay/?r=footer" title="Hướng dẫn cách học">Hướng dẫn cách học</a>
                                        </li>
                                        <li><a style="margin: 0; padding: 0;" href="/pay/?r=footer" title="Hướng dẫn thanh toán">Hướng dẫn thanh toán</a>
                                        </li>
                                    </ul>
                                    <p class="intro-text">Chúng tôi cam kết hỗ trợ bạn <span>tối đa (9am - 9pm)</span></p>
                                    <ul class="links">
                                        <li><a href="javascript:;" title="0916 92 1419"><span class="glyphicon glyphicon-earphone"></span> 0916 92 1419</a>
                                        </li>
                                        <li><a href="/contact/?r=footer" title="Gửi tin"><span class="glyphicon glyphicon-edit"></span>Gửi tin</a>
                                        </li>
                                        <li><a href="javascript:;" title="support@tienganhmoingay.com"><span class="glyphicon glyphicon-envelope"></span> support@tienganhmoingay.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item share-block">
                                <h3 class="link-title">• Kết nối <span class="icon icon-bt_up hidden-md hidden-lg"></span></h3>
                                <div class="wrap-link">
                                    <ul class="links" style="margin-bottom: 0;">
                                        <li style="width: 100%; margin: 0 0 10px;">
                                            <div class="fb-like fb_iframe_widget" data-href="https:/tienganhmoingay.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=956108007815000&amp;container_width=246&amp;href=https%3A%2F%2Ftienganhmoingay.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"><span style="vertical-align: bottom; width: 134px; height: 20px;"><iframe name="f75a79518cde6" width="1000px" height="1000px" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https:/www.facebook.com/v2.12/plugins/like.php?action=like&amp;app_id=956108007815000&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3f62dc3ec6f14c%26domain%3Dtienganhmoingay.com%26origin%3Dhttps%253A%252F%252Ftienganhmoingay.com%252Ff28b7f38b21596c%26relation%3Dparent.parent&amp;container_width=246&amp;href=https%3A%2F%2Ftienganhmoingay.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true" style="border: none; visibility: visible; width: 134px; height: 20px;" class=""></iframe></span></div>
                                        </li>
                                        <li>
                                            <a href="http:/facebook.com/tienganhmoingayonline" target="_blank"><img src="./uploads/image/facebook_icon.png" alt="Tiếng Anh Mỗi Ngày Facebook Page"></a>
                                        </li>
                                        <li>
                                            <a href="http:/youtube.com/tienganhmoingayonline" target="_blank"><img src="./uploads/image/youtube_icon.png" alt="Tiếng Anh Mỗi Ngày YouTube "></a>
                                        </li>
                                    </ul>
                                    <p class="intro-text">Like Page để học tiếng Anh hàng ngày</p>
                                    <div class="fb-page fb_iframe_widget" data-href="https:/www.facebook.com/tienganhmoingayonline/" data-tabs="timeline" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=956108007815000&amp;container_width=246&amp;height=150&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftienganhmoingayonline%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline"><span style="vertical-align: bottom; width: 246px; height: 150px;"><iframe name="f100495a062a328" width="1000px" height="150px" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https:/www.facebook.com/v2.12/plugins/page.php?adapt_container_width=true&amp;app_id=956108007815000&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df76fbd7eae0818%26domain%3Dtienganhmoingay.com%26origin%3Dhttps%253A%252F%252Ftienganhmoingay.com%252Ff28b7f38b21596c%26relation%3Dparent.parent&amp;container_width=246&amp;height=150&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftienganhmoingayonline%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline" style="border: none; visibility: visible; width: 246px; height: 150px;" class=""></iframe></span></div>
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
        $(function(){
            $('.contact-feature li').on('click',function(){
                $('.contact').css('display','none');
                $('#'+$(this).data("id")).toggle();
            });
        })    
    
    </script>
    <script>
        let displayProfile = false;
        document.querySelector('.user-login span').addEventListener('click', function() {
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

        $("#btn-submit").click(function(e) {

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
                success: function(data) {
                    if (data.success == 1) {
                        window.location.href = "{{route('home')}}"
                        $('#myBtn').replaceWith(' <i class="fas fa-user-circle"></i><span>' + data.username + '</span> <ul class="user-info"><li><a href="user/profile">Tài khoản</a></li><li><a href="{{route("student-logout")}}">Đăng xuất</a></li></ul>');
                        $('#myModal').css('display', 'none');
                        $(document).on('click', '.user-login span', function() {
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