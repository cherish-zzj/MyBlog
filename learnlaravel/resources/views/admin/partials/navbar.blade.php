<ul class="nav navbar-nav">
    {{--Blog home--}}
    <li><a href="/articles">博客首页</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/user*')) class="active" @endif>
            {{--Posts--}}
            <a href="/admin/user">用户管理</a>
        </li>
        <li @if (Request::is('admin/post*')) class="active" @endif>
            {{--Posts--}}
            <a href="/admin/post">文章管理</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="active" @endif>
            {{--Tags--}}
            <a href="/admin/tag">标签管理</a>
        </li>
        <li @if (Request::is('admin/upload*')) class="active" @endif>
            {{--Uploads--}}
            <a href="/admin/upload">文件上传</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        {{--Login--}}
        <li><a href="/auth/login">登录</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                {{ Auth::user()->username }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                {{--Logout--}}
                <li><a href="/auth/logout">退出</a></li>
            </ul>
        </li>
    @endif
</ul>