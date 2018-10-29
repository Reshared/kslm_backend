<div class="nav">
    <div class="nav-container container clear">
        <a href="{{ url('/') }}" class="logo-container">
            <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo"/>
        </a>

        <nav class="nav-list clear fr">
            <li><a href="{{ url('/') }}" @if(isActive()) class="active" @endif data-locale="nav_item1">首页</a></li>
            <li><a href="{{ url('filter') }}" @if(isActive('filter')) class="active" @endif data-locale="nav_item2">科氏滤膜</a></li>
            <li><a href="{{ url('support') }}" @if(isActive('support')) class="active" @endif  data-locale="nav_item3">技术支持</a></li>
            <li><a href="{{ url('cooperative') }}" @if(isActive('cooperative')) class="active" @endif  data-locale="nav_item4">合作客户</a></li>
            <li><a href="{{ url('about') }}" @if(isActive('about')) class="active" @endif  data-locale="nav_item5">关于我们</a></li>
            <li><a href="{{ url('contact') }}" @if(isActive('contact')) class="active" @endif  data-locale="nav_item6">联系方式</a></li>
        </nav>
    </div>
</div>