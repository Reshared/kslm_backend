<header class="header">
    <div class="header-container container clear">
        <span data-locale="header_welcome_msg" class="welcome-msg fl pos-re animation-line">您好，欢迎进入科式滤膜网站</span>

        <ul class="clear fr">
            <li class="fl lang langZh hide"><span class="animation-line">中文</span></li>
            <li class="fl lang langEn"><span class="animation-line">English</span></li>
            <li class="fl">
                <a href="{{ url('contact') }}"><i></i><span class="animation-line"
                                                            data-locale="header_contact_us">联系我们</span></a>
            </li>
            <li class="fl pos-re weChart-item">
                <p class="weChart-text"><i></i><span class="animation-line"
                                                     data-locale="header_weChart">微信</span></p>
                <b class="weChart-arrow pos-ab animated"></b>
                <div class="weChart-img pos-ab animated">
                    <img src="{{ asset('images/weChat.png') }}" alt="微信">
                </div>
            </li>
        </ul>
    </div>
</header>