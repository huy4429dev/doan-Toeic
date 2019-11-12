<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listening</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font-anwesome/css/all.css">

</head>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="nav">
                    <div>
                        <div class="logo">
                            <h3><a href="{{route('home')}}">ENGLISH SITE</a></h3>
                        </div>
                        <ul class="page-member">
                            <li><a href="about">About</a></li>
                            <li><a href="about">Contact</a></li>
                            <li><a href="about">Blog</a></li>
                        </ul>
                        <div class="phone">
                            <i class="fas fa-phone-alt"></i>
                            <span>093451323</span>
                        </div>

                    </div>
                    <div>
                        <div class="user-login">
                            <!-- <a href="login">Login</a>
                                    <i class="fas fa-power-off"></i> -->
                            <i class="fas fa-user-circle"></i>
                            <span>User name</span>
                            <ul class="user-info">
                                <li><a href="">Tài khoản</a></li>
                                <li><a href="">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="main-content" style="background:white">
        <div class="container bgr-white">
            <div class="main-head">
                <h2>Luyện nghe TOEIC: hiệu quả và vui như chơi game!</h2>
            </div>
            @foreach($posts as $post)
            <div class="container text-center one-question" data-question="{{$post->level}}" style="display:none">
                <h2 class="blue-color level-title py-5 text-info">Level {{$post->level}} ({{$topicName}}) - {{$post->title}}</h2>
                <h4 class="error-msg text-danger"></h4>
                <h4 class="success-msg text-success"></h4>
                <div class="text-block d-flex justify-content-center">
                    <div class="btn-play">
                        <a><img src="../uploads/image/audio_icon_blue.png" width="80" onclick="playSound('http://www.oxfordlearnersdictionaries.com/media/english/us_pron/b/bud/budge/budget__us_1.mp3')"></a>
                    </div>
                    <div class="texts-wrapper listening-answer" id="answer-{{$post->id}}">{{$post->answer}}</div>
                </div>
                <div class="btn-group" style="margin-top: 10px;"><button class="submit-btn oval-btn get-answer" value="answer-{{$post->id}}">Gửi câu trả lời <i class="fa fa-paper-plane"></i></button></div>
            </div>
            @endforeach
            <section class="feedback footer-links pb-5" style="margin-top: 120px;">
                <div class="recommended-articles d-flex">
                    <ul class="d-flex flex-wrap">
                        <li>
                            <h4>Cách chủ đề luyện nghe khác:</h4>
                        </li>
                        @foreach($topics as $topic)
                        <li><a href="https://tienganhmoingay.com/luyen-nghe-toeic/luyen-nghe-toeic-part-1/">
                                {{$topic->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
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
                            <h3 class="link-title active">• Về Tiếng Anh Mỗi Ngày <span class="icon icon-bt_up hidden-md hidden-lg"></span></h3>
                            <div class="wrap-link show">
                                <ul class="links">
                                    <li><a href="/about/?r=footer">Giới thiệu về Tiếng Anh Mỗi Ngày</a></li>
                                    <li>
                                        <a href="https://tienganhmoingay.com/ket-qua-thi-toeic-hoc-vien/?r=footer" title="Kết quả thi TOEIC của học viên">Kết quả thi TOEIC của học viên</a>
                                    </li>
                                    <li><a href="/jobs/?r=footer" title="Tuyển dụng">Tuyển dụng</a></li>
                                    <li><a href="/terms/?r=footer">Điều khoản sử dụng</a></li>
                                    <li><a href="/privacy-policy/?r=footer">Chính sách bảo mật</a></li>
                                    <li><a href="https://tienganhmoingay.com/huong-dan/chinh-sach-diem-thuong/?r=footer">Chính sách tặng điểm thưởng</a></li>
                                    <li><a href="https://tienganhmoingay.com/huong-dan/cac-chinh-sach-uu-dai-khac/?r=footer">Chính sách ưu đãi khi mua tài khoản</a></li>
                                    <li><a href="https://tienganhmoingay.com/huong-dan/chinh-sach-bao-luu-cong-them-ngay-dung/?r=footer" title="Chiến sách cộng thêm ngày sử dụng">Chính sách bảo lưu &amp; cộng thêm ngày sử dụng</a>
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
                                        <div class="fb-like fb_iframe_widget" data-href="https://tienganhmoingay.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=956108007815000&amp;container_width=246&amp;href=https%3A%2F%2Ftienganhmoingay.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"><span style="vertical-align: bottom; width: 134px; height: 20px;"><iframe name="f75a79518cde6" width="1000px" height="1000px" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.12/plugins/like.php?action=like&amp;app_id=956108007815000&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3f62dc3ec6f14c%26domain%3Dtienganhmoingay.com%26origin%3Dhttps%253A%252F%252Ftienganhmoingay.com%252Ff28b7f38b21596c%26relation%3Dparent.parent&amp;container_width=246&amp;href=https%3A%2F%2Ftienganhmoingay.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true" style="border: none; visibility: visible; width: 134px; height: 20px;" class=""></iframe></span></div>
                                    </li>
                                    <li>
                                        <a href="http://facebook.com/tienganhmoingayonline" target="_blank"><img src="../uploads/image/facebook_icon.png" alt="Tiếng Anh Mỗi Ngày Facebook Page"></a>
                                    </li>
                                    <li>
                                        <a href="http://youtube.com/tienganhmoingayonline" target="_blank"><img src="../uploads/image/youtube_icon.png" alt="Tiếng Anh Mỗi Ngày YouTube "></a>
                                    </li>
                                </ul>
                                <p class="intro-text">Like Page để học tiếng Anh hàng ngày</p>
                                <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/tienganhmoingayonline/" data-tabs="timeline" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=956108007815000&amp;container_width=246&amp;height=150&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftienganhmoingayonline%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline"><span style="vertical-align: bottom; width: 246px; height: 150px;"><iframe name="f100495a062a328" width="1000px" height="150px" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.12/plugins/page.php?adapt_container_width=true&amp;app_id=956108007815000&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df76fbd7eae0818%26domain%3Dtienganhmoingay.com%26origin%3Dhttps%253A%252F%252Ftienganhmoingay.com%252Ff28b7f38b21596c%26relation%3Dparent.parent&amp;container_width=246&amp;height=150&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftienganhmoingayonline%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline" style="border: none; visibility: visible; width: 246px; height: 150px;" class=""></iframe></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="../jquery-3.4.1.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/script.js "></script>
<script>
    $('document').ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.get-answer').on('click', function(event) {
            let answerId = '#' + event.target.value;
            let answer = $(answerId).text().trim().split(" ");
            let answerInput = $(answerId + ' > input').val().trim();
            answerId = answerId.slice(1);
            answer.splice(positionSpace[answerId], 1, answerInput);
            let postId = answerId.slice(7);
            if (answerInput == '') {
                alert('Nhập đáp án trước khi gửi câu trả lời !');
                return false;
            }
            $.ajax({
                type: "GET",
                url: `get-answer/${postId}`,
                dataType: "json",
                data: {
                    answer: answer.join(" ")
                },
                success: function(data) {
                    if (data.success) {
                        $(".error-msg").html('');
                        $(".success-msg").html(data.success + `<button class="btn-next-question" onclick="nextQuestion(${data.level})">Next Question</button>`);
                        console.log(data.level);
                    } else {
                        $(".success-msg").html('');
                        $(".error-msg").html(data.error);
                        // $(".display-error").css("display", "block");
                        console.log(data);
                    }
                }
            });
        });
        $('.success-msg').on('click', 'button', function() {
            $('.success-msg').html(' ');
            $('.btn-next-question').css('display', 'none');
        });
    })
</script>




</body>

</html>