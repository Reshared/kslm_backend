@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/filterDetail.js') }}"></script>
@stop

@if ($post->seo_keywords)
@section('keywords'){{ $post->seo_keywords }} @stop
@endif

@if ($post->seo_description)
@section('description'){{ $post->seo_description }} @stop
@endif


@section('title')@if ($post->seo_title){{ $post->seo_title }}@else{{ $post->title }}@endif @stop

@section('body')
    <article class="support">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')

    <!-- 主要内容 -->
        <main class="text-container">
            <!-- tab切换 -->
            <ul class="tab bg-white tab">
                <a href="{{ url('support?type=0') }}">
                    <li @if($post->type == '技术支持') class="active" @endif>
                        技术支持
                    </li>
                </a>
                <a href="{{ url('support?type=1') }}">
                    <li @if($post->type == '服务与帮助') class="active" @endif>
                        服务与帮助
                    </li>
                </a>
                <a href="{{ url('support?type=2') }}">
                    <li @if($post->type == '行业动态') class="active" @endif>
                        行业动态
                    </li>
                </a>
            </ul>
            <div class="container">
                <div class="title">
                    <h3 class="co-000">{{ $post->title }}</h3>
                    <div class="notes co-666">
                        <span>{{ $post->created_at }}</span>
                        <span class="mar-l40">分类：{{ $post->type }}</span>
                    </div>
                </div>
                <div class="content bg-white-rgba">
                    {!! $post->content !!}
                </div>
                <div class="bottom">
                    @if ($pre)
                        <a href="{{ url('support', ['id' => $pre->id]) }}" class="co-999"><span>上一篇:</span>{{ $pre->title }}</a>
                    @else
                        <a href="javascript:;" class="co-999"><span>上一篇:</span>没有了</a>
                    @endif
                    @if ($next)
                        <a href="{{ url('support', ['id' => $next->id]) }}" class="fr co-999"><span>下一篇:</span>{{ $next->title }}</a>
                    @else
                        <a href="javascript:;" class="fr co-999"><span>下一篇:</span>没有了</a>
                    @endif

                </div>
            </div>
        </main>
        <!-- 浮窗 -->
    @include('kslm.layouts.window')
    <!-- 在线留言 -->
    @include('kslm.layouts.message')
    <!-- 底部 -->
        @include('kslm.layouts.footer')
    </article>
@stop