@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@stop

@section('body')
    <article class="home bg-f5">
    <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.carousel')
    <!-- 优秀服务 -->
        <section class="excellent-service bg-white">
            <div class="service-container container">
                <div class="section-label text-center font-24 pos-re">
                    <span>优秀服务</span>
                    <i class="slant-line"></i>
                    <span class="font-16 co-aaa text-en">EXCELLENT SERVICE</span>
                </div>
                <div class="service-content">
                    <ul class="service-list clear">
                        <li class="text-center">
                            <div>
                                <i class="icon icon1"></i>
                                <p class="font-24 content-label">售前咨询</p>
                                <p class="font-16 co-aaa">PRE-SALES ADVICE</p>
                                <div class="service-desc">
                                    <b class="desc-line"></b>
                                    <p class="font-16">全方位为客户<br>进行需求了解</p>
                                </div>
                            </div>
                        </li>
                        <li class="text-center">
                            <div>
                                <i class="icon icon2"></i>
                                <p class="font-24 content-label">专业选型</p>
                                <p class="font-16 co-aaa">PROFESSIONAL SELECTION</p>
                                <div class="service-desc">
                                    <b class="desc-line"></b>
                                    <p class="font-16">确定滤膜类别、 规格<br>型号、数量、排列方式</p>
                                </div>
                            </div>
                        </li>
                        <li class="text-center">
                            <div>
                                <i class="icon icon3"></i>
                                <p class="font-24 content-label">达成合作</p>
                                <p class="font-16 co-aaa">REACH COOPERATION</p>
                                <div class="service-desc">
                                    <b class="desc-line"></b>
                                    <p class="font-16">签署合同根据<br>需求按时发货</p>
                                </div>
                            </div>
                        </li>
                        <li class="text-center">
                            <div>
                                <i class="icon icon4"></i>
                                <p class="font-24 content-label">售后跟踪</p>
                                <p class="font-16 co-aaa">AFTER-SALES TRACKING</p>
                                <div class="service-desc">
                                    <b class="desc-line"></b>
                                    <p class="font-16">提供安装调试日<br>常维护技术支持</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 最新动态 -->
        <section class="latest-news">
            <div class="news-container container">
                <div class="news-label font-24 pos-re clear">
                    <span>最新动态</span>
                    <i class="slant-line"></i>
                    <span class="font-16 co-aaa text-en pos-re">LATEST NEWS</span>
                    <a class="label-more fr pointer" href="{{ url('support') }}">
                        <span class="font-20 co-333 ">MORE</span>
                        <b class="co-333 pos-re"></b>
                    </a>
                </div>
                <div class="news-content">
                    <div class="news-swiper-container swiper-container">
                        <div class="news-swiper-wrapper swiper-wrapper">
                            @foreach($posts as $k=>$post)
                                @if($k%3 == 0)
                                    <ul class="swiper-slide news-list clear">
                                        <li>
                                            <a href="{{ url('support', ['id' => $post['id']]) }}">
                                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}">
                                                <p class="new-item-tilte ellipsis">{{ $post['title'] }}</p>
                                                <p class="new-item-content row-ellipsis">{{ $post['description'] }}</p>
                                            </a>
                                        </li>
                                        @if (isset($posts[$k+1]))
                                            <li>
                                                <a href="{{ url('support', ['id' => $posts[$k+1]['id']]) }}">
                                                    <img src="{{ $posts[$k+1]['image'] }}"
                                                         alt="{{ $posts[$k+1]['title'] }}">
                                                    <p class="new-item-tilte ellipsis">{{ $posts[$k+1]['title'] }}</p>
                                                    <p class="new-item-content row-ellipsis">{{ $posts[$k+1]['description'] }}</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($posts[$k+2]))
                                            <li>
                                                <a href="{{ url('support', ['id' => $posts[$k+2]['id']]) }}">
                                                    <img src="{{ $posts[$k+2]['image'] }}"
                                                         alt="{{ $posts[$k+2]['title'] }}">
                                                    <p class="new-item-tilte ellipsis">{{ $posts[$k+2]['title'] }}</p>
                                                    <p class="new-item-content row-ellipsis">{{ $posts[$k+1]['description'] }}</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                        <div class="news-swiper-pagination swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 合作企业 -->
        <section class="joint-venture bg-white">
            <div class="joint-container container">
                <div class="joint-label text-center font-24 pos-re">
                    <span>合作企业</span>
                    <i class="slant-line"></i>
                    <span class="font-16 co-aaa text-en pos-re">JOINT VENTURE</span>
                </div>
                <div class="joint-content">
                    <ul class="join-list clear font-0">
                        @foreach($partners as $partner)
                            <li class="text-center">
                                <a href="{{ url('cooperative', ['id' => $partner->id]) }}">
                                    <img src="{{ $partner->image }}" alt="{{ $partner->name }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <!-- 浮窗 -->
        @include('kslm.layouts.window')
        <!-- 在线留言 -->
        @include('kslm.layouts.message')
        <!-- 底部 -->
        @include('kslm.layouts.footer')
    </article>
@stop