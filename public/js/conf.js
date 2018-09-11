var LANG_CODE = 'zh_CN'; // 标识语言

function loadProperties (name, path, lang) {
  name = name || 'lang';
  path = path || './lang/'
  jQuery.i18n.properties({
    name: name, // 资源文件名称
    path: path, // 资源文件所在目录路径
    mode: 'map', // 模式： 变量或Map
    language: lang,
    encoding: 'UTF-8',
    callback: function () {
      // if ($('[data-locale]')) {
      //   $('[data-locale]').each(function (i, n) {
      //     if (i !== $('[data-locale]').length - 1) {
      //       $(this).html($.i18n.prop(decodeURI($(this).data('locale'))));
      //     }
      //   })
      // }
    }
  })
}

function switchLang () {
  LANG_CODE = LANG_CODE == 'zh_CN' ? 'en' : 'zh_CN';
  // sessionStorage.setItem('lang', LANG_CODE);
  // loadProperties('lang', 'lang/', LANG_CODE);
}

$(function () {
  // if (sessionStorage.getItem('lang') && sessionStorage.getItem('lang') === 'zh_CN') {
  //   $('.langZh').addClass('hide').removeClass('show-dom');
  //   $('.langEn').addClass('show-dom').removeClass('hide');
  // } else {
  //   $('.langZh').addClass('show-dom').removeClass('hide');
  //   $('.langEn').addClass('hide').removeClass('show-dom');
  // }

  // if (sessionStorage.getItem('lang')) {
  //   loadProperties('lang', 'lang/', sessionStorage.getItem('lang'));
  // } else {
  //   loadProperties('lang', 'lang/', LANG_CODE);
  // }
})