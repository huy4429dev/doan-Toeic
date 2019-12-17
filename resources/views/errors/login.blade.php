<!doctype html>
<html lang="en">
<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./font-anwesome/css/all.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Error 404: Page not found</title>
    <style>
        h1 {
            margin: 10px;
            color: #dc3545;
            font-size: 42px;
        }

        .text-center {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-height: calc(100vh - 110px);
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="text-center">
    <h1><i class="fa fa-exclamation-circle"></i> Error: Vui lòng đăng nhập!</h1>
    <p>please login!</p>
    <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
</div>
<script src="../asset/jquery-3.4.1.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../asset/js/script.js "></script>
</body>
</html>