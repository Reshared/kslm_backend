@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="https://cache.amap.com/lbs/static/main1119.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

    <script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.9&key=cbdfa6d4a7f45a793da8e217e70438b1"></script>
    <script type="text/javascript" src="https://cache.amap.com/lbs/static/addToolbar.js"></script>
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        var map = new AMap.Map('map', {
            resizeEnable: true,
            center: [116.314955, 39.675723],
            zoom: 16
        });
        var marker = new AMap.Marker({
            position: map.getCenter(),
            icon: 'https://webapi.amap.com/theme/v1.3/markers/n/mark_b1.png',
        });
        marker.setMap(map);
        // 设置鼠标划过点标记显示的文字提示
        marker.setTitle('科氏（北京）滤膜科技有限公司');

        // 设置label标签
        marker.setLabel({//label默认蓝框白底左上角显示，样式className为：amap-marker-label
            offset: new AMap.Pixel(-93, -48),//修改label相对于maker的位置
            content: "科氏（北京）滤膜科技有限公司"
        });

        var map1 = new AMap.Map('map1', {
            resizeEnable: true,
            center: [116.314955, 39.675723],
            zoom: 16
        });
        var marker1 = new AMap.Marker({
            position: map1.getCenter(),
            icon: 'https://webapi.amap.com/theme/v1.3/markers/n/mark_b1.png',
        });
        marker1.setMap(map1);
        // 设置鼠标划过点标记显示的文字提示
        marker1.setTitle('科氏（北京）滤膜科技有限公司');

        // 设置label标签
        marker1.setLabel({//label默认蓝框白底左上角显示，样式className为：amap-marker-label
            offset: new AMap.Pixel(-93, -48),//修改label相对于maker的位置
            content: "科氏（北京）滤膜科技有限公司"
        });
    </script>
@stop

@section('body')
    <article class="contact">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')

    <!-- 主要内容 -->
        <main class="bg-white">
            <div class="container">
                <div class="line">
                    <div id="map" class="map"></div>
                    <div class="loc-describe">
                        <div class="company">
                            <h4 class="co-000">北京总部——科氏（北京）滤膜科技有限公司</h4>
                            <div class="text co-666 font-16">科氏公司相关人员 将第一时间为您提供支持！</div>
                        </div>
                        <ul class="list">
                            <li>
                                <img src="./images/icon-server.png" alt="">
                                <span>统一服务热线：</span>400-158-1866
                            </li>
                            <li>
                                <img src="./images/icon-building.png" alt="">
                                <span>北京代表处：</span>010-66112915
                            </li>
                            <li>
                                <img src="./images/icon-email.png" alt="">
                                <span>邮箱：</span>koch@kochmembrane.cn
                            </li>
                            <li>
                                <img src="./images/icon-location.png" alt="">
                                <span>地址：北京市大兴区庆祥南路29号</span>
                            </li>
                        </ul>
                    </div>
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