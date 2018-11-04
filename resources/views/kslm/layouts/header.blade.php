<!-- 移动端头部 -->
<header class="lm-header">
    <div class="lm-header-container lm-container clear">
        <a href="{{ url('/') }}" class="logo-container fl">
            <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo"/>
        </a>
        <div class="fr">
            <p><span class="pos-re">中文</span></p>
            <!-- <i class="lm-icon"></i> -->
            <img src="{{ asset('images/icon-lm-nav.png') }}">
        </div>
    </div>
</header>

<!-- PC端头部 -->
<header class="header">
    <div class="header-container container clear">
        <span data-locale="header_welcome_msg" class="welcome-msg fl pos-re animation-line">{{ $settings['top_words'] }}</span>

        <ul class="clear fr">
            <li class="fl lang langZh hide"><span class="animation-line">中文</span></li>
            <li class="fl lang langEn"><span class="animation-line">English</span></li>
            <li class="fl">
                <a href="{{ url('contact') }}"><i></i><span class="animation-line"
                                                            data-locale="header_contact_us">联系我们</span></a>
            </li>
            <li class="fl pos-re weChart-item">
                <p class="weChart-text"><i></i><span class="animation-line" data-locale="header_weChart">微信</span></p>
                <b class="weChart-arrow pos-ab animated"></b>
                <div class="weChart-img pos-ab animated">
                    <img src="{{ $settings['qrcode'] }}" alt="微信">
                </div>
            </li>
        </ul>
    </div>
</header>