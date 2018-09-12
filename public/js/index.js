$(function () {

  $('.weChart-item').on('mouseenter', function () {
    console.log('qwe');
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

      // 复选框选择
      var _product = [];
      var _appArea = [];
      $('#olForm ul').find('li').on('click', function () {
        var _this = $(this);
        var _parent = _this.parent('ul').attr('id');
        if (_this.hasClass('active')) {
          _this.removeClass('active');
          if (_parent === 'formProduct') {
            _product = _product.filter(function (item) {
              return item !== _this.find('span').html()
            })
          } else {
            _appArea = _appArea.filter(function (item) {
              return item !== _this.find('span').html()
            })
          }
        } else {
          _this.addClass('active');
          if (_parent === 'formProduct') {
            _product.push(_this.find('span').html());
          } else {
            _appArea.push(_this.find('span').html());
          }
        }
      })

      // 表单重置
      $('#formReset').on('click', function () {
        var _items = $('#olForm .form-group');

        for (var i = 0; i < _items.length; i++) {
          var _item = $(_items[i]);
          _item.find('.form-control').val('');
          _item.find('p').addClass('hide').removeClass('show-dom');
          _item.find('.form-control').removeClass('error');
        }
        var _li = $('#olForm ul').find('li');
        for (var i = 0; i < _li.length; i++) {
          $(_li[i]).removeClass('active');
        }
        _product = [];
        _appArea = [];
        $('.app-area-error').addClass('hide').removeClass('show-dom');
        $('.product-error').addClass('hide').removeClass('show-dom');
      })

      // 提交表单
      $('#submitForm').on('click', function () {
        var _items = $('#olForm .form-group');
        // var _items = $('#olForm .form-group[data-require]');
        var _valid = true
        // 输入框
        for (var i = 0; i < _items.length; i++) {
          var _item = $(_items[i]);
          var _domMust = _item.attr('data-require');
          // 值
          var _val = _item.find('.form-control').val();
          // 属性名
          var _name = _item.find('.form-control').attr('name');
          _item.find('p').addClass('hide').removeClass('show-dom');
          _item.find('.form-control').removeClass('error');
          switch (_name) {
            case 'username':
            // 20
              if ((_val.length <= 0 || _val.length > 20) && _domMust) {
                console.log('请输入姓名在20个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入姓名在20个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
              break;
            case 'company':
            // 50
              if (_val.length > 50 && !_domMust) {
                console.log('请输入公司名称在50个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入公司名称在50个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
              break;
            case 'address':
            // 100
              if (_val.length > 100 && !_domMust) {
                console.log('请输入地址在50个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入地址在50个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
              break;
            case 'phone':
              if ((_val.length <= 0 || _val.length > 50) && _domMust) {
                console.log('请输入电话在50个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入电话在50个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
            // 20
              break;
            case 'email':
              if ((_val.length <= 0 || _val.length > 100) && _domMust) {
                console.log('请输入邮箱在100个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入邮箱在100个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
            // 100
              break;
            case 'job':
              if (_val.length > 100 && !_domMust) {
                console.log('请输入职位在100个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入职位在100个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
              break;
            case 'message':
              if ((_val.length <= 0 || _val.length > 500) && _domMust) {
                console.log('请输入留言信息在500个字符以内');
                _item.find('.form-control').addClass('error');
                _item.find('p').html('请输入留言信息在500个字符以内').addClass('show-dom').removeClass('hide');
                _valid = false;
              }
              break;
          }
        }
        if (!_product.length) {
          $('.product-error').html('请选择一个感兴趣的产品').addClass('show-dom').removeClass('hide');
          _valid = false;
        } else {
          $('.product-error').addClass('hide').removeClass('show-dom');
        }
        if (!_appArea.length) {
          $('.app-area-error').html('请选择一个应用领域').addClass('show-dom').removeClass('hide');
          _valid = false;
        } else {
          $('.app-area-error').addClass('hide').removeClass('show-dom');
        }
        if (_valid) {
          var name = $('#formUserName').val();
          var company = $('#formCompany').val();
          var address = $('#formAddress').val();
          var mobile = $('#formTelephone').val();
          var email = $('#formEmail').val();
          var job = $('#formJob').val();
          var content = $('#formMessage').val();
          $.ajax({
            url: '/message',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
              name: name,
              company: company,
              address: address,
              mobile: mobile,
              email: email,
              job: job,
              content: content,
              interest: _product.join(','),
              area: _appArea.join(',')
            },
            method: 'post',
            success: function(res) {
              alert('留言成功！');
              $('#olMessageModal').modal('hide');
            },
            error: function() {
              alert('留言失败，请重试');
            }
          });
        } else {
          console.log('验证失败');
        }
      })      

    }
  }

  var indexFun = new Index();
});