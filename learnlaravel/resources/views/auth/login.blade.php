@extends('app')
@section('content')
    <h1 class="text-center">登录页面</h1>
    <hr>
    <div class="col-md-4 col-md-offset-4">

        {!! Form::open(['url'=>'/auth/login']) !!}
        <!--- field --->
        <div class="form-group">
            {!! Form::label('email','邮箱:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <!--- Password Field --->
        <div class="form-group">
            {!! Form::label('password','密码:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <input type="checkbox" name="remember" > 记住我
        </div>

        {!! Form::submit('登录',['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}

        {{--<h6 class="text-right"><a href="/auth/register" class="text-right">没有用户名？立即注册</a></h6>--}}

        {{--这里是表单验证代码--}}
        @include('errors.list')
    </div>
@stop