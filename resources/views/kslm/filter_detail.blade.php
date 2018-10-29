@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/filterDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/filterDetail.js') }}"></script>
@stop

@if ($product['seo_keywords'])
@section('keywords'){{ $product['seo_keywords'] }}@stop
@endif

@if ($product['seo_description'])
@section('description'){{ $product['seo_description'] }}@stop
@endif

@section('title')@if ($product['seo_title']){{ $product['seo_title'] }}@else{{ $product['name'] }}@endif @stop

@section('body')
    <article class="filter-detail filter">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')

    <!-- 主要内容 -->
        <main class="bg-white">
            <div class="container">
                <!-- 面包屑 -->
                <div class="crumb clear">
                    <ol class="breadcrumb fl">
                        <li><a href="{{ url('/') }}">首页</a></li>
                        <li><a href="{{ url('filter') }}">科氏滤膜</a></li>
                        <li class="active">{{ $product['name'] }}</li>
                    </ol>
                </div>

                <!-- 侧边栏 -->
                <div class="side-bar">
                    <ul>
                        @foreach($categories as $k => $category)
                            <li class="clear @if($product['major_category_id'] == $category->id) active @endif"
                                data-index="{{ $k + 1 }}">
                                <a href="{{ url('filter?id='.$category->id) }}">
                                    <span>{{ $category->name }}</span>
                                    <i></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 详情内容 -->
                <section class="list-container detail-containter">
                    <div class="detail-header">
                        <div class="detail-swiper-container swiper-container">
                            <div class="detail-swiper-wrapper swiper-wrapper">
                                @foreach($product['image_group'] as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="detail-img pos-re" id="detailImg">
                            <img src="{{ $product['image'] }}">
                            <div class="lay pos-ab"></div>
                            <div class="pos-ab show-img">
                                <img src="{{ $product['image'] }}">
                            </div>
                        </div>
                        <div class="pic-group">
                            <span class="pic-prev pic-control">向上</span>
                            <div class="pic-group-swiper swiper-container">
                                <div class="pic-swiper-wrapper swiper-wrapper">
                                    @foreach($product['image_group'] as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ $image }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <span class="pic-next pic-control">向下</span>
                        </div>
                        <div class="detail-desc">
                            <p class="desc-title font-20 co-000">{{ $product['name'] }}</p>
                            {{ $product['description'] }}
                        </div>
                    </div>

                {!! $product['content'] !!}

                <!-- 相关资料下载 -->
                    <div class="block-container margin-bottom">
                        <div class="block-label">相关资料下载</div>
                        <div class="block-content">
                            <ul class="download-list">
                                @if($product['files'])
                                    @foreach($product['files'] as $url)
                                        <li class="clear"><a target="_blank" class="ellipsis" href="{{ $url }}">{{ url2Name($url) }}</a><a target="_blank" href="{{ $url }}"><img
                                                        src="{{ asset('images/download.jpg') }}" alt="点击下载"></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- 相关技术支持 -->
                    <div class="block-container margin-bottom">
                        <div class="block-label">相关技术支持</div>
                        <div class="block-content">
                            <ul class="technical-support clear">
                                @foreach($releases as $release)
                                    <li>
                                        <a href="{{ url('support', ['id' => $release->id]) }}">
                                            <p class="title">
                                                <span class="pos-re ellipsis">{{ $release->title }}</span>
                                                <i class="support-line"></i>
                                            </p>
                                            <p class="row-ellipsis">{{ $release->description }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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