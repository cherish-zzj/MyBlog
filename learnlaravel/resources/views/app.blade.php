<!DOCTYPE html>
<html>
<head>
    <title>Laravelzzj Blog</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href="/css/bootstrap.min.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>
</head>
<body>
{{--@yield表示区域--}}
@include('flash::message')
{{--@include('partials.flash')--}}

<div class="container">
    <section class="content">
        <div class="pad group">
            @yield('content')
        </div>
    </section>
</div>

<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

  @yield('footer')
</body>
<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#flash-overlay-modal').modal();
    // $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
</html>