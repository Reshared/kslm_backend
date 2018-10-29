@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cooperative.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@stop

@section('body')
    <article class="cooperative">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')

        <main class="bg-white">
            <!-- cooperative title -->
            <div class="en-title">
                <img src="{{ asset('images/wave-line.jpg') }}" alt="">
                <span>COOPERATIVE CUSTOMERS</span>
                <img src="{{ asset('images/wave-line.jpg') }}" alt="">
            </div>
            <div class="cn-title">合作客户</div>
            <div class="container">
                <!-- 内容块 -->
                <section class="list-container clear">
                    <ul class="list-content clear">
                        @foreach($partners as $partner)
                            <li>
                                <a href="{{ url('cooperative', ['id' => $partner->id]) }}" class="img-box">
                                    <img src="{{ $partner->image }}" alt="{{ $partner->name }}">
                                </a>
                                <div class="text">{{ $partner->name }}</div>
                            </li>
                        @endforeach
                    </ul>
                    <!-- 分页 -->
                    <div aria-label="Page navigation" class="fr pagination-container">
                        <ul class="pagination">
                            @for($i = 1; $i <= $partners->lastPage(); $i++)
                                @if($partners->currentPage() == $i)
                                    <li class="active"><a
                                                href="{{ url('cooperative?page='.$i) }}">{{ $i }}</a>
                                    </li>
                                @else
                                    <li><a href="{{ url('cooperative?page='.$i) }}">{{ $i }}</a>
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