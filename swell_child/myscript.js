//カスタマイズ用スクリプト
// 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
let vh = window.innerHeight * 0.01;
// カスタム変数--vhの値をドキュメントのルートに設定
document.documentElement.style.setProperty('--vh', `${vh}px`);

// ビューポートリサイズ
window.addEventListener('resize', () => {

  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});

//Adobe Fonts
(function(d) {
    var config = {
      kitId: 'pfo1hbz',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);

jQuery(function ($) {
  /*ヘッダーをスクロールで縮める必要あれば使う
  var header_menubtn = $('.l-header__menuBtn');
  var header_icon_border = $('.icon-menu-thin');
  var header = $('.l-header');
  */
  const scrollTime = 700;

  /* window scroll function start*/
  $(window).scroll(function () {
    /*ヘッダーをスクロールで縮める必要あれば使う
    if ($(this).scrollTop() > 100) {
      header_icon_border.addClass('scroll');
      header_menubtn.addClass('scroll');
	    header.addClass('scroll');
    } else {
      header_icon_border.removeClass('scroll');
      header_menubtn.removeClass('scroll');
	    header.removeClass('scroll');
    }
    */
  });
  /* window scroll function end*/

  /*トップへ戻るボタン スクロール*/
  $('#pagetop').on('click',function(){
      $("html").animate({scrollTop: 0}, { duration: scrollTime, easing: 'swing', });
  });
 /*トップへ戻るボタン スクロール*/

});
