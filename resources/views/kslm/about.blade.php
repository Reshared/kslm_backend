@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        $(function () {
            // tab切换
            $('ul.tab').find('li').on('click', function () {
                $('ul.tab').find('li').removeClass('active')
                $('.container').find('.list-container').removeClass('show active').addClass('hide');

                var blockClass = $(this).attr('data-container');
                $(this).addClass('active');
                $(blockClass).addClass('show').removeClass('hide');
            })

            $('.container .honor-container').find('.honor-list li').on('click', function () {
                var imgSrc = $(this).find('img').attr('src');
                $('#explodedViewModal').find('img').attr({src: imgSrc});
                $('#explodedViewModal').modal('show');
            })
        })
    </script>
@stop

@section('body')
    <article class="about">
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
                <li class="active animation-line" data-container=".company-container">公司简介</li>
                <li class="animation-line" data-container=".honor-container">荣誉资质</li>
                <li class="animation-line" data-container=".factory-container">工厂实景图</li>
                <li class="animation-line" data-container=".job-container">人员招聘</li>
            </ul>
            <div class="container">
                <!-- 内容块 -->
                <section class="list-container clear company-container show">
                    <h3 class="co-000 text-center about-title">{{ $introduce->title }}</h3>
                    <div class="bg-white padding-30">
                        {!! $introduce->content !!}
                    </div>

                    <ul class="bottom-list">
                        <li class="text-center mar-5">
                            <img src="{{ asset("images/about1.png" ) }}" alt="">
                            <div class="text">性能稳定</div>
                        </li>
                        <li class="text-center mar-5">
                            <img src="{{ asset("images/about2.png" ) }}" alt="">
                            <div class="text">节约环保</div>
                        </li>
                        <li class="text-center">
                            <img src="{{ asset("images/about3.png" ) }}" alt="">
                            <div class="text">降低成本</div>
                        </li>
                    </ul>
                </section>

                <section class="list-container clear factory-container hide">
                    <h3 class="co-000 text-center about-title lm-title">{{ $image->title }}</h3>
                    {!! $image->content !!}
                </section>

                <section class="list-container clear honor-container hide">
                    <h3 class="text-center about-title">公司荣誉</h3>
                    <ul class="honor-list bg-white">
                        @foreach($honors as $honor)
                        <li class="text-center">
                            <img src="{{ $honor->image }}" alt="{{ $honor->name }}">
                        </li>
                        @endforeach
                    </ul>
                </section>

                <section class="list-container clear job-container hide">
                    <h3 class="text-center about-title">{{ $jobs->title }}</h3>
                    <div class="job-content bg-white">
                        {!! $jobs->content !!}
                    </div>
                </section>
            </div>
        </main>

        <!-- 图片展示框 -->
    <div class="modal fade exploded-view" tabindex="-1" role="dialog" id="explodedViewModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body pos-re">
            <span class="pos-ab close-icon" data-dismiss="modal" aria-label="Close"></span>
            <img src="./images/honor1.png" alt="">
          </div>
        </div>
      </div>
    </div>
        <!-- 浮窗 -->
    @include('kslm.layouts.window')
    <!-- 在线留言 -->
    @include('kslm.layouts.message')
    <!-- 底部 -->
        @include('kslm.layouts.footer')
    </article>
@stop