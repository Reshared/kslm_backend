<div class="banner-swiper-container swiper-container">
    <div class="banner-swiper-wrapper swiper-wrapper">
        @foreach($banners as $banner)
            @if($banner->url)
                <a class="swiper-slide" href="{{ $banner->url }}">
                    <div class="pos-ab">
                        <div class="container">
                            <h1>{{ $banner->title }}</h1>
                        </div>
                    </div>
                    <img src="{{ $banner->image }}" alt="{{ $banner->title }}">
                </a>
                @else
                <div class="swiper-slide">
                    <img src="{{ $banner->image }}" alt="{{ $banner->title }}">
                </div>
            @endif
        @endforeach
    </div>
    <div class="banner-swiper-pagination swiper-pagination"></div>
</div>