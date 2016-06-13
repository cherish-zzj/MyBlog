@if(Auth::user()!= null)
    <h3 class="text-right"> 欢迎 {{ Auth::user()->username }} 登录！ <a href="/admin/post">博客后台  </a> <a href="/auth/logout">退出</a></h3>
@else
    <h3 class="text-right"><a href="/auth/login">您好，请登录！</a></h3>
@endif
