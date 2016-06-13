<!DOCTYPE html>
<html>
    <head>
        <title>Laravel5 欢迎界面</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                /*font-family: 'Lato';*/
                font-family: '微软雅黑';
                color: #eea236 ;

            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 68px;
            }
        </style>
    </head>
    <body background="/uploads/post-bg.jpg" style="background-position:center">
        <div class="container">
            <div class="content">
                <div class="title">Laravel5.2 zzj博客</div>
                {{--<h2 class="title"><a href="/articles">欢迎进入 Laravelzzj Blog</a></h2>--}}
                <h2 class="title"><a href="/articles">http://localhost:8000/articles</a></h2>
            </div>
        </div>
    </body>
</html>
