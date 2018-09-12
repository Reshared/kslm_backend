$(function () {

    var FilterDetail = function () {
        this.init();
    }

    $('#preSelectModal').on('show.bs.modal', function () {
        loadCategory();
    });

    FilterDetail.prototype = {
        init: function () {
            this.swiper();
            this.eventBind();
            this.loadProducts();


            var _sideItemIndex;
            _sideItemIndex = this.getUrlVal();
            if (typeof _sideItemIndex === 'string') {
                $('.container .side-bar').find('li').removeClass('active');
                $('.container .side-bar').find('li:nth-child(' + Number(_sideItemIndex) + ')').addClass('active');
            }
        },
        getUrlVal: function () {
            var _res;
            var _url = window.location.search;
            if (_url.indexOf('?') !== -1) {
                _res = _url.substring(_url.indexOf('?') + 1);
                _res = _res.indexOf('&') > -1 ? _res.split('&') : _res.split('=');
            }
            return _res && _res[1];
        },
        swiper: function () {
            var picSwiper = new Swiper('.pic-group-swiper', {
                direction: 'vertical',
                slidesPerView: 'auto',
                autoplayDisableOnInteraction: false,
                mousewheelControl: true,
                autoHeight: true,
                grabCursor: true
            });
            $('.pic-prev').on('click', function () {
                picSwiper.slidePrev();
            })
            $('.pic-next').on('click', function () {
                picSwiper.slideNext();
            })

            var _sildeItem = $('.pic-group-swiper .swiper-slide').find('li');
            var _showPic = $('.detail-containter .detail-img').find('img');
            _sildeItem.on('click', function () {
                var _picSrc = $(this).find('img').attr('src');
                _showPic.attr({src: _picSrc});
            })
        },
        eventBind: function () {

            // 侧边栏
            var _sideBarItem = $('.container .side-bar').find('li');
            _sideBarItem.on('click', function () {
                _sideBarItem.removeClass('active');
                $(this).addClass('active');
                category_id = $(this).attr('data-id');
                loadProducts();
            });
        },
        loadProducts: function () {
            if (typeof category_id !== 'undefined') {
                loadProducts();
            }
        }
    }

    var filterDetail = new FilterDetail();
})

function loadNextCategory(obj) {
    var level = $(obj).parent('ul').attr('data-level');

    $('.recommend-list-container').find('ul').each(function () {
        if ($(this).attr('data-level') > level) {
            $(this).remove();
        }
    });

    level++;

    $.ajax({
        url: '/ajax/categories',
        method: 'get',
        data: {id: $(obj).attr('data-id')},
        success: function (res) {
            if (res.data.length > 0) {
                if ($('.level' + level).length === 0) {
                    var html = '<ul data-level="' + level + '" class="level' + level + '">';
                    for (var o in res.data) {
                        html += '<li data-id="' +
                            res.data[o].id + '" onclick="focusThis(this)">' +
                            res.data[o].name + '</li>';
                    }
                    html += '</ul>';
                    $(obj).parent('ul').after(html);
                } else {
                    var html = '';
                    for (var o in res.data) {
                        html += '<li data-id="' +
                            res.data[o].id + '" onclick="focusThis(this)">' +
                            res.data[o].name + '</li>';
                    }
                    $('.level' + level).html(html);
                }
            }
        }
    })
}

function loadCategory() {
    $.ajax({
        url: '/ajax/categories',
        method: 'get',
        data: {id: category_id},
        success: function (res) {
            var html = '<ul data-level="1" class="level1">';
            for (var o in res.data) {
                html += '<li data-id="' + res.data[o].id + '" onclick="focusThis(this)">' + res.data[o].name + '</li>';
            }
            html += '</ul>';
            $('.recommend-list-container').html(html);
        }
    })
}

function focusThis(item) {
    if (!$(item).hasClass('active')) {
        $(item).parent('ul').find('.active').removeClass('active');
        $(item).addClass('active');
        loadNextCategory(item)
    }
}

function loadNextProduct(p) {
    page = p;
    loadProducts();
}

function loadProducts() {
    $.ajax({
        url: '/ajax/products',
        method: 'get',
        data: {id: category_id, page: page},
        success: function (res) {
            var html = '';
            var pagination = '';
            for (var o in res.data) {
                var datum = res.data[o];
                var categories = '';
                for (var i in datum.categories) {
                    categories += datum.categories[i].name + ' '
                }
                html += '<li><div><a href="/filter/' + datum.id + '?from=' + category_id + '"><img src="' + datum.image + '"></a>' +
                    '<p class="font-14">' + datum.name + '</p>' +
                    '<p class="co-main font-12">' + categories + '</p>' +
                    '</div></li>';
            }

            $('.product-box>.list-content').html(html);
            if (res.last_page > 1) {
                for (o = 0; o < res.last_page; o++) {
                    if (page == o + 1) {
                        pagination += '<li class="active"><a href="javascript:;">' + (o + 1) + '</a></li>';
                    } else {
                        pagination += '<li><a onclick="loadNextProduct(' + (o + 1) + ')" href="javascript:;">' + (o + 1) + '</a></li>';
                    }
                }
                $('.pagination').html(pagination);
            } else {
                $('.pagination').html('');
            }
        }
    })
}