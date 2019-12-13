<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toeic</title>
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../font-anwesome/css/all.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .flip-clock {
            text-align: center;
            perspective: 400px;
            margin: 20px auto;
            background: #f9f9f9;
            width: 190px;
            height: 111px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            position: fixed;
            right: 0;
            bottom: 0;
            border-radius: 5px 0 0 0;
            padding-bottom: 12px;
            box-shadow: 9px 1px 1px 1px #b9b9b99e;
        }

        .flip-clock:after {
            content: "Thời gian còn lại";
            position: absolute;
            top: 6px;
        }

        .flip-clock *,
        .flip-clock *:before,
        .flip-clock *:after {
            box-sizing: border-box;
        }

        .flip-clock__piece {
            display: inline-block;
            margin: 0 5px;
        }

        .flip-clock__slot {
            font-size: 10px;
            color: #0c0c0b;
        }

        .card {
            display: block;
            position: relative;
            padding-bottom: 0.72em;
            font-size: 20px;
            line-height: 0.95;
        }

        .card__top,
        .card__bottom,
        .card__back::before,
        .card__back::after {
            display: block;
            height: 0.72em;
            color: #ccc;
            background: #222;
            padding: 0.25em 0.25em;
            border-radius: 0.15em 0.15em 0 0;
            overflow: hidden;
            transform-style: preserve-3d;
            width: 1.8em;
            transform: translateZ(0);
        }

        .card__bottom {
            color: #FFF;
            position: absolute;
            top: 50%;
            left: 0;
            border-top: solid 1px #000;
            background: #393939;
            border-radius: 0 0 0.15em 0.15em;
            pointer-events: none;
            overflow: hidden;
        }

        .card__bottom::after {
            display: block;
            margin-top: -0.72em;
        }

        .card__back::before,
        .card__bottom::after {
            content: attr(data-value);
        }

        .card__back {
            position: absolute;
            top: 0;
            height: 100%;
            left: 0%;
            pointer-events: none;
        }

        .card__back::before {
            position: relative;
            z-index: -1;
            overflow: hidden;
        }

        .flip .card__back::before {
            animation: flipTop 0.3s cubic-bezier(.37, .01, .94, .35);
            animation-fill-mode: both;
            transform-origin: center bottom;
        }

        .flip .card__back .card__bottom {
            transform-origin: center top;
            animation-fill-mode: both;
            animation: flipBottom 0.6s cubic-bezier(.15, .45, .28, 1);
        }

        @keyframes flipTop {
            0% {
                transform: rotateX(0deg);
                z-index: 2;
            }

            0%,
            99% {
                opacity: 0.99;
            }

            100% {
                transform: rotateX(-90deg);
                opacity: 0;
            }
        }

        @keyframes flipBottom {

            0%,
            50% {
                z-index: -1;
                transform: rotateX(90deg);
                opacity: 0;
            }

            51% {
                opacity: 0.99;
            }

            100% {
                opacity: 0.99;
                transform: rotateX(0deg);
                z-index: 5;
            }
        }
    </style>
</head>
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

                                <img src="../../uploads/image/{{  empty(Session::get('user')->avatar) ? 'user_icon.png' : Session::get('user')->avatar }}" style="width: 42px;height: 42px;border-radius: 50%;position: relative;left: -5px;top: -3px;" ; alt="">
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
    <div class="main-content" style="padding: 40px 139px;">
        <div class="container bgr-white pb-5">
            <div class="article-nav-wrapper px-5">
                <nav class="article-nav pt-4">
                    <ul class="text-center">
                        <li><a href='{{route("toeic-exam")}}'>Đề thi thử TOEIC</a>
                        </li>
                        <li class="current">Đề này</li>
                    </ul>
                </nav>
                <div class="full-toeic-test" style="padding:0 5rem">
                    <div>
                        <h1 class="test-name text-center">
                            Thi thử TOEIC
                            <br /> Đề ETS TOEIC 2019 TEST 1
                        </h1>
                        <div style="text-align: center;" class="pb-5">
                            <p style="font-size: 23px;">Thời gian làm bài: 120 phút</p>
                            <p class="orange-color">Đồng hồ ở góc dưới màn hình bạn nhé!</p>
                        </div>
                    </div>
                    <div class="toeic-listening">
                        <h2 class="text-center">LISTENING TEST</h2>
                        <p style="font-size: 18px; text-align:justify">In the Listening test, you will be asked to demonstrate how well you understand spoken English. The entire Listening test will last approximately 45 minutes. There are four parts, and directions are given for each part. You must mark your answers on the separate answer sheet. Do not write your answers in your test book.</p>
                        <div id="full-test-audio-wrapper" style="text-align:center" class="pt-5 mb-4">
                            <audio controls="" id="full-test-audio" class="full-test-audio text-center">
                                <source src="../../uploads/toeic/{{$exam->audio}}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <form action="{{route('toeic-get-result',['idExam' => $exam->id])}}" method="POST" id="getResult">
                            @csrf
                            @php
                            $i = 1;
                            @endphp
                            <div class="toeic-part-1">

                                <h3>PART 1</h3>
                                <span class="label direction">Directions:</span>
                                <span>For each question in this part, you will hear four statements about a picture in your test book. When you hear the statements, you must select the one statement that best describes what you see in the picture. Then find the number of the question on your answer sheet and mark your answer. The statements will not be printed in your test book and will be spoken only one time.</span>
                                <div class="example">
                                    <span class="label example">Example:</span>
                                    <div class="example-part1 text-center">
                                        <img src="../../uploads/image/sample_Ets_Toeic_2018.webp" alt="" width="300px">
                                    </div>
                                </div>
                                @if(!$partOne->isEmpty())
                                @foreach($partOne as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}. </span>
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">({{$question->A}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">({{$question->B}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">({{$question->C}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->D.$question->id}}" value="{{$question->D}}">
                                            <label for="{{$question->D.$question->id}}">({{$question->D}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 1</p>
                                @endif

                            </div>
                            <div class="toeic-part-2">
                                <h3>PART 2</h3>
                                <span class="label direction">Directions:</span>
                                <span>You will hear a question or statement and three responses spoken in English. They will not be printed in your test book and will be spoken only one time. Select the best response to the question or statement and mark the letter (A), (B), or (C) on your answer sheet.</span>
                                @if(!$partTwo->isEmpty())
                                @foreach($partTwo as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}. {{$question->content}}</span>
                                    @if(! empty($question->thumbnail))
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    @endif
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">({{$question->A}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">({{$question->B}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">({{$question->C}})</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 2</p>
                                @endif

                            </div>
                            <div class="toeic-part-3">

                                <h3>PART 3</h3>
                                <span class="label direction">Directions:</span>
                                <span>You will hear some conversations between two or more people. You will be asked to answer three questions about what the speakers say in each conversation. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The conversations will not be printed in your test book and will be spoken only one time.</span>
                                @if(!$partThree->isEmpty())
                                @foreach($partThree as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}. {{$question->content}}</span>
                                    @if(! empty($question->thumbnail))
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    @endif
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">(A) {{$question->A}}.</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">(B) {{$question->B}}.</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">(C) {{$question->C}}.</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->D.$question->id}}" value="{{$question->D}}">
                                            <label for="{{$question->D.$question->id}}">(D) {{$question->D}}.</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 3</p>
                                @endif

                            </div>
                            <div class="toeic-part-4">

                                <h3>PART 4</h3>
                                <span class="label direction">Directions:</span>
                                <span>You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The talks will not be printed in your test book and will be spoken only one time.</span>
                                @if(!$partFour->isEmpty())
                                @foreach($partFour as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}.{{$question->content}}</span>
                                    @if(!empty($question->thumbnail))
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    @endif
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">(A) {{$question->A}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">(B) {{$question->B}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">(C) {{$question->C}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->D.$question->id}}" value="{{$question->D}}">
                                            <label for="{{$question->D.$question->id}}">(D) {{$question->D}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 4</p>
                                @endif

                            </div>
                            <h2 class="text-center">READING TEST</h2>
                            <p style="font-size: 18px; text-align:justify; margin-bottom:50px">In the Reading test, you will read a variety of texts and answer several different types of reading comprehension questions. The entire Reading test will last 75 minutes. There are three parts, and directions are given for each part. You are encouraged to answer as many questions as possible within the time allowed.
                                You must mark your answers on the separate answer sheet. Do not write your answers in the test book.</p>
                            <div class="toeic-part-5">

                                <h3>PART 5</h3>
                                <span class="label direction">Directions:</span>
                                <span>A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then mark the letter (A), (B), (C), or (D) on your answer sheet.</span>
                                @if(!$partFive->isEmpty())
                                @foreach($partFive as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}.{{$question->content}}</span>
                                    @if(!empty($question->thumbnail))
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    @endif
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">(A) {{$question->A}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">(B) {{$question->B}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">(C) {{$question->C}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->D.$question->id}}" value="{{$question->D}}">
                                            <label for="{{$question->D.$question->id}}">(D) {{$question->D}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 5</p>
                                @endif

                            </div>
                            <div class="toeic-part-6">

                                <h3>PART 6</h3>
                                <span class="label direction">Directions:</span>
                                <span>Read the texts that follow. A word, phrase or sentence is missing in parts of each text. Four answer choices for each question are given below the text. Select the best answer to complete the text. Then mark the letter (A), (B), (C), or (D) on your answer sheet.</span>
                                <div class="example">
                                    <span class="label example">Example:</span>
                                    <div class="example-part1 text-center">
                                        <img src="../../uploads/toeic/" alt="" width="300px">
                                    </div>
                                </div>
                                @if(!$partSix->isEmpty())
                                @foreach($partSix as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}</span>
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">(A) {{$question->A}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">(B) {{$question->B}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">(C) {{$question->C}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->D.$question->id}}" value="{{$question->D}}">
                                            <label for="{{$question->D.$question->id}}">(D) {{$question->D}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 6</p>
                                @endif

                            </div>
                            <div class="toeic-part-7">

                                <h3>PART 7</h3>
                                <span class="label direction">Directions:</span>
                                <span>In this part you will read a selection of texts, such as magazine and newspaper articles, e-mails, and instant messages. Each text or set of texts is followed by several questions. Select the best answer for each question and mark the letter (A), (B), (C), or (D) on your answer sheet.</span>
                                @if(!$partSeven->isEmpty())
                                @foreach($partFive as $question)
                                <div class="one-question mt-3">
                                    <span style="display:block">{{$i}}</span>
                                    <div>
                                        <img class="pt-3 " src="../../uploads/toeic/{{$question->thumbnail}}" width="400px">
                                    </div>
                                    <div class="answer">
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->A.$question->id}}" value="{{$question->A}}">
                                            <label for="{{$question->A.$question->id}}">(A) {{$question->A}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->B.$question->id}}" value="{{$question->B}}">
                                            <label for="{{$question->B.$question->id}}">(B) {{$question->B}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->C.$question->id}}" value="{{$question->C}}">
                                            <label for="{{$question->C.$question->id}}">(C) {{$question->C}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" id="{{$question->D.$question->id}}" value="{{$question->D}}">
                                            <label for="{{$question->D.$question->id}}">(D) {{$question->D}}</label>
                                        </div>
                                        <div class="one-anwer">
                                            <input type="radio" name="{{$question->id}}" value="0_0" style="display:none" checked />
                                        </div>
                                    </div>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <p class="py-3" style="color:red">Hiện tại chưa có câu hỏi PART 7</p>
                                @endif

                            </div>
                            <div class="submit-answer">
                                <input class='btn btn-primary' type="submit" value="Nộp bài">
                            </div>

                        </form>

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
                                        <a href="http://facebook.com/tienganhmoingayonline" target="_blank">
                                            <../../uploads/toeic//uploads/image/facebook_icon.png" alt="Tiếng Anh Mỗi Ngày Facebook Page">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://youtube.com/tienganhmoingayonline" target="_blank">
                                            <../../uploads/toeic//uploads/image/youtube_icon.png" alt="Tiếng Anh Mỗi Ngày YouTube ">
                                        </a>
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
<script src="../../jquery-3.4.1.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../../js/script.js "></script>
<script>
    console.clear();


    function CountdownTracker(label, value) {

        var el = document.createElement('span');

        el.className = 'flip-clock__piece';
        el.innerHTML = '<b class="flip-clock__card card"><b class="card__top"></b><b class="card__bottom"></b><b class="card__back"><b class="card__bottom"></b></b></b>' +
            '<span class="flip-clock__slot">' + label + '</span>';

        this.el = el;

        var top = el.querySelector('.card__top'),
            bottom = el.querySelector('.card__bottom'),
            back = el.querySelector('.card__back'),
            backBottom = el.querySelector('.card__back .card__bottom');

        this.update = function(val) {
            val = ('0' + val).slice(-2);
            if (val !== this.currentValue) {

                if (this.currentValue >= 0) {
                    back.setAttribute('data-value', this.currentValue);
                    bottom.setAttribute('data-value', this.currentValue);
                }
                this.currentValue = val;
                top.innerText = this.currentValue;
                backBottom.setAttribute('data-value', this.currentValue);

                this.el.classList.remove('flip');
                void this.el.offsetWidth;
                this.el.classList.add('flip');
            }
        }

        this.update(value);
    }

    // Calculation adapted from https://www.sitepoint.com/build-javascript-countdown-timer-no-dependencies/

    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        return {
            'Hours': Math.floor((t / (1000 * 60 * 60)) % 24),
            'Minutes': Math.floor((t / 1000 / 60) % 60),
            'Seconds': Math.floor((t / 1000) % 60)
        };
    }

    function getTime() {
        var t = new Date();
        return {
            'Total': t,
            'Hours': t.getHours() % 12,
            'Minutes': t.getMinutes(),
            'Seconds': t.getSeconds()
        };
    }

    function Clock(countdown, callback) {

        countdown = countdown ? new Date(Date.parse(countdown)) : false;
        callback = callback || function() {};

        var updateFn = countdown ? getTimeRemaining : getTime;

        this.el = document.createElement('div');
        this.el.className = 'flip-clock';

        var trackers = {},
            t = updateFn(countdown),
            key, timeinterval;

        for (key in t) {
            if (key === 'Total') {
                continue;
            }
            trackers[key] = new CountdownTracker(key, t[key]);
            this.el.appendChild(trackers[key].el);
        }

        var i = 0;

        function updateClock() {
            timeinterval = requestAnimationFrame(updateClock);

            // throttle so it's not constantly updating the time.
            if (i++ % 10) {
                return;
            }

            var t = updateFn(countdown);
            if (t.Total < 0) {
                cancelAnimationFrame(timeinterval);
                for (key in trackers) {
                    trackers[key].update(0);
                }
                callback();
                return;
            }

            for (key in trackers) {
                trackers[key].update(t[key]);
            }
        }

        setTimeout(updateClock, 500);
    }

    var deadline = new Date(Date.parse(new Date()) + 2 * 60 * 60 * 1000);
    var c = new Clock(deadline, function() {
        alert('countdown complete')
    });
    Element.prototype.remove = function() {
        this.parentElement.removeChild(this);
    }
    NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
        for (var i = this.length - 1; i >= 0; i--) {
            if (this[i] && this[i].parentElement) {
                this[i].parentElement.removeChild(this[i]);
            }
        }
    }
    document.body.appendChild(c.el);
    setTimeout(function() {
        document.getElementsByClassName("flip-clock").remove();
        alert('Hết thời gian !')
        document.querySelector('#getResult').submit();
    }, 2 * 60 * 60 * 1000);
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