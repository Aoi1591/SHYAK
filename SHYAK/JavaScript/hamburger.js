//変数定義
/*var navigationOpenFlag = false;
var navButtonFlag = true;
var focusFlag = false;
 
//ハンバーガーメニュー
    $(function(){
      // ハンバーガーメニューボタンがクリックされた時の処理
      $(document).on('click','.el_humburger',function(){
        if(navButtonFlag){
          spNavInOut.switch();
          //連続してボタンを押せないようにする.200ミリ秒の間にボタンが押されても無効とする.s
          setTimeout(function(){
            navButtonFlag = true;
          },200);
          navButtonFlag = false;
        }
      });
      // メニューの外をクリックした時の処理.今たぶん要素押してもメニュー閉じるだけになってる！
      $(document).on('click touchend', function(event) {
        if (!$(event.target).closest('.navi,.el_humburger').length && $('body').hasClass('js_humburgerOpen') && focusFlag) {
          focusFlag = false;
          //scrollBlocker(false);
          spNavInOut.switch();
        }
      });
    });
 
//ナビ開く処理
function spNavIn(){
  $('body').removeClass('js_humburgerClose');
  $('body').addClass('js_humburgerOpen');
  setTimeout(function(){
    focusFlag = true;
  },200);
  setTimeout(function(){
    navigationOpenFlag = true;
  },200);
}
 
//ナビ閉じる処理
function spNavOut(){
  $('body').removeClass('js_humburgerOpen');
  $('body').addClass('js_humburgerClose');
  setTimeout(function(){
    $(".uq_spNavi").removeClass("js_appear");
    focusFlag = false;
  },200);
  navigationOpenFlag = false;
}
 
//ナビ開閉コントロール
var spNavInOut = {
  switch:function(){
    if($('body.spNavFreez').length){
      return false;
    }
    if($('body').hasClass('js_humburgerOpen')){
     spNavOut();
    } else {
     spNavIn();
    }
  }
};*/
//ハンバーガーメニュー
function toggleNav() {
  const body = document.body;
  const hamburger = document.getElementById("js_hamburger");
  const overlay = document.getElementById("js_overlay");
  hamburger.addEventListener("click", function () {
    body.classList.toggle("nav_open"); //クラスが含まれていれば削除、含まれていなければ追加する
  });
  overlay.addEventListener("click", function () {
    body.classList.remove("nav_open"); //クラスを削除する
  });
}
toggleNav();