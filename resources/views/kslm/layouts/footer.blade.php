<footer class="footer">
    <div class="container">
        <div class="top clear">
            <ul class="fl co-fff">
                <li><img src="{{ asset('images/icon-call.png') }}" alt=""><span class="label">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话</span>:<span
                            class="text">{{ $settings['contact']['统一服务热线'] }}</span></li>
                <li><img src="{{ asset('images/icon-loc.png') }}" alt=""><span class="label">联系地址</span>:<span
                            class="text">{{ $settings['contact']['地址'] }}</span>
                </li>
                <li><img src="{{ asset('images/icon-link.png') }}" alt=""><span class="label">友情链接</span>:<a
                            class="text"
                            href="#">http://kochmembrane.cn/</a>
                </li>
            </ul>
            <div class="wechart-img fr bg-white">
                <img src="{{ $settings['qrcode'] }}" alt="微信">
            </div>
        </div>
        <div class="bottom text-center co-999 font-12">&copy;2014-2044科氏滤膜公司官网 保留一切权利.京ICP备14024044号-1</div>
    </div>
</footer>