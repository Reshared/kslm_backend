@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/filterDetail.js') }}"></script>
    <script type="text/javascript">
        var category_id = 0;
        var major_category_id = {{ $id }};
        var page = 1;
    </script>
@stop

@section('body')
    <article class="filter">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')
    <!-- 精准选型 -->
        <div class="modal fade precision-select" tabindex="-1" role="dialog" id="preSelectModal">
            <div class="modal-dialog" role="document" style="overflow-x: auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="co-main text-center">产品选型精准推荐</h3>
                        <div class="recommend-container">
                            <div class="recommend-list-container" style="min-width:100%">
                                <div class="recommend-select">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 99%;">
                        <button type="button" class="btn btn-primary" id="confirm_filter">确认</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 主要内容 -->
        <main class="bg-white">
            <div class="container">
                <!-- 面包屑 -->
                <div class="crumb clear">
                    <ol class="breadcrumb fl">
                        <li><a href="{{ url('/') }}">首页</a></li>
                        <li class="active">科氏滤膜</li>
                    </ol>
                    <div class="fr pos-re">
                        <button class="btn" type="button" data-toggle="modal" data-target="#preSelectModal">
                            <span>精准选型</span> <span class="glyphicon glyphicon-menu-down"></span>
                        </button>
                    </div>
                </div>

                <!-- 侧边栏 -->
                <div class="side-bar">
                    <ul>
                        @foreach($majorCategories as $k => $category)
                            <li data-id="{{ $category->id }}" class="clear @if($id == $category->id) active @endif"
                                data-index="{{ $k + 1 }}">
                                <a>
                                    <span>{{ $category->name }}</span>
                                    <i></i>
                                </a>
                            </li>
                        @endforeach
                        <li class="btn-group">
                            <button class="btn" type="button" data-toggle="modal" data-target="#preSelectModal">
                                <span>精准选型</span> <span class="glyphicon glyphicon-menu-down"></span>
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- 列表 -->
                <section class="list-container product-box clear">
                    <ul class="list-content clear"></ul>
                    <!-- 分页 -->
                    <div aria-label="Page navigation" class="fr pagination-container">
                        <ul class="pagination"></ul>
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