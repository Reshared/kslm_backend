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
@stop

@section('body')
    <article class="support">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')

    <!-- 主要内容 -->
        <main>
            <!-- tab切换 -->
            <ul class="tab bg-white tab">
                <a href="{{ url('support?type=0') }}">
                    <li class="@if($type == 0) active @endif animation-line pos-re">
                        技术支持
                    </li>
                </a>
                <a href="{{ url('support?type=1') }}">
                    <li class="@if($type == 1) active @endif animation-line pos-re">
                        服务与帮助
                    </li>
                </a>
                <a href="{{ url('support?type=2') }}">
                    <li class="@if($type == 2) active @endif animation-line pos-re">
                        行业动态
                    </li>
                </a>
            </ul>
            <div class="container">
                <!-- 内容块 -->
                <section class="list-container clear">
                    <ul class="list-content clear">
                        @foreach($posts as $post)
                            <li>
                                <a class="item" href="{{ url('support', ['id' => $post->id]) }}">
                                    <img width="200px" height="140px" src="{{ $post->image }}" alt="{{ $post->title }}">
                                    <div class="text">
                                        <div class="title">{{ $post->title }}</div>
                                        <p class="describe">{{ $post->description }}</p>
                                        <div class="item-footer clear font-14">
                                            <div class="co-999 fl"><span>分类：</span>
                                                <span class="co-main">{{ $post->type }}</span>
                                            </div>
                                            <span class="co-999 fr"><span>时间：</span>{{ $post->created_at }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- 分页 -->
                    <div aria-label="Page navigation" class="fr pagination-container">
                        <ul class="pagination">
                            @for($i = 1; $i <= $posts->lastPage(); $i++)
                                @if($posts->currentPage() == $i)
                                    <li class="active"><a
                                                href="{{ url('support?type='.$type.'&page='.$i) }}">{{ $i }}</a>
                                    </li>
                                @else
                                    <li><a href="{{ url('support?type='.$type.'&page='.$i) }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </section>
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