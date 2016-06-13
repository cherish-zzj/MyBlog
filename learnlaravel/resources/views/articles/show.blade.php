@extends('app')
@section('content')

    <h1 class="text-center">文章详情</h1>

    {{--这里是验证用户是否登录--}}
    @include('articles._isnamenull')
    <h3 class="text-left"><a href="/articles">返回首页</a></h3>
    <hr>
    <div class="container">
    <h1>{{ $article->title }}</h1>
    <h5>{{ $article->published_at }}</h5>
    <br>
        @if( $article->page_image != null )
            <img src="/uploads/{{ $article->page_image }}" alt="">
            {{ str_limit($article->content) }}
        @else
            {{ str_limit($article->content) }}
        @endif
        <p></p>关键字词：<em>{{ $article->tags->lists('tag') }} </em>
    <hr>
    </div>
    {{--<a href="/articles/{{ $article->id }}/edit"><button class="btn btn-primary" >编辑文章</button></a>--}}
    {{--@if($articles->lastPage())--}}
    <a href="/articles/{{ ($article->id)-1 }}"><button class="btn btn-primary" >上一篇</button></a>
    <a href="/articles/{{ ($article->id)-1 }}"><button class="btn btn-primary" >下一篇</button></a>

@stop

