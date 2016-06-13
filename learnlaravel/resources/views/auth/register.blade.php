@extends('app')
@section('content')
    <h1 class="text-center">注册页面</h1>
    <h6 class="text-right">我已经注册，现在就 <a href="/auth/login" class="text-right"><button><h5> 登录 </h5></button></a></h6>
    <hr>
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url'=>'/auth/register']) !!}
            <!--- Name Field --->
            <div class="form-group">
                {!! Form::label('username','用户名:') !!}
                {!! Form::text('username',null,['class'=> 'form-control']) !!}
            </div>
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
            <!--- Password_confirmation Field --->
            <div class="form-group">
                {!! Form::label('password_confirmation','确认密码:') !!}
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('马上注册',['class'=>'btn btn-primary form-control']) !!}

            {{--这里是表单验证代码--}}
            @include('errors.list');
        {!! Form::close() !!}



    </div>

@stop