@extends('app')
@section('content')
    <div class="container" >
        <h1>{{ config('blog.title') }}</h1>
        <h5>记录生活和技术</h5>
    </div>

    {{--这里是验证用户是否登录--}}
    @include('articles._isnamenull')
    {{--<h3 class="text-left"><a href="/articles/create">添加文章</a></h3>--}}
    <hr>
    <ul>
    @foreach($articles as $article)
        <li>
        <a href="/articles/{{ $article->id }}" class="post-title pad"><h2>{{ $article->title }}</h2></a>

        发表时间：<em>{{ $article->published_at  }} </em>&nbsp;&nbsp;
        作者：<em>{{ $article->user_id }} </em>&nbsp;&nbsp;
        类型：[{{ $article->subtitle }}]&nbsp;&nbsp;

        <p></p>
        <p>
            @if( $article->page_image != null )
                <img src="/uploads/{{ $article->page_image }}" alt="">
                {{ str_limit($article->content) }}
            @else
                {{ str_limit($article->content) }}
            @endif
        </p>
        </li>
    @endforeach
    </ul>
    <hr>
    <h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
    {!! $articles->render() !!}
@stop

