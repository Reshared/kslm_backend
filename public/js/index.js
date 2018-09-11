$(function () {

  $('.weChart-item').on('mouseenter', function () {
    $('.weChart-arrow').addClass('fadeIn show-dom').removeClass('fadeOut hide');
    $('.weChart-img').addClass('fadeIn show-dom').removeClass('fadeOut hide');
  }).on('mouseleave', function () {
    $('.weChart-arrow').addClass('fadeOut hide').removeClass('fadeIn show-dom');
    $('.weChart-img').addClass('fadeOut hide').removeClass('fadeIn show-dom');
  })

  var Index = function () {
    this.init();
  }

  Index.prototype = {
    init: function () {
      this.swiper();
      this.eventBind();
    },
    swiper: function () {
      var mySwiper = new Swiper('.banner-swiper-container', {
        pagination : '.banner-swiper-pagination',
        observer: true,
        loop: true,
        autoplay: 3000
      });

      var newsSwiper = new Swiper('.news-swiper-container', {
        pagination: '.news-swiper-pagination',
        observer: true,
        loop: true,
        autoplay: 3000
      })
    },
    eventBind: function () {

      $('.langZh').on('click', function () {
        switchLang('zh_CN');
        $('.langEn').addClass('show-dom').removeClass('hide');
        $(this).addClass('hide').removeClass('show-dom');
      })
    
      $('.langEn').on('click', function () {
        switchLang('en');
        $('.langZh').addClass('show-dom').removeClass('hide');
        $(this).addClass('hide').removeClass('show-dom');
      })

      var _tabItem = $('main .tab').find('li');
      _tabItem.on('click', function () {
        _tabItem.removeClass('active');
        $(this).addClass('active');
      })
      
    }
  }

  var indexFun = new Index();
});