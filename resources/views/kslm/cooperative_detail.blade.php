@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cooperativeDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/filterDetail.js') }}"></script>
@stop

@section('body')
    <article class="cooperative-detail">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 主要内容 -->
        <main class="text-container">
            <div class="container">
                <div class="title">
                    <h4 class="co-000">{{ $partner->name }}</h4>
                    <div class="notes co-666">
                        <span>{{ $partner->created_at }}</span>
                    </div>
                </div>
                <div class="content">
                    {!! $partner->content !!}
                </div>
                <div class="bottom">
                    @if ($pre)
                        <a href="{{ url('cooperative', ['id' => $pre->id]) }}"
                           class="co-999"><span>上一篇:</span>{{ $pre->name }}</a>
                    @else
                        <a href="javascript:;" class="co-999"><span>上一篇:</span>没有了</a>
                    @endif
                    @if ($next)
                        <a href="{{ url('cooperative', ['id' => $next->id]) }}"
                           class="fr co-999"><span>下一篇:</span>{{ $next->name }}</a>
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