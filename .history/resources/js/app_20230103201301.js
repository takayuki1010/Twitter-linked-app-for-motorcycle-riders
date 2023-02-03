import './bootstrap';

//  // #jumpをクリックした際の設定
// $('.jumpbutton').click(function () {
//     $('body,html').animate({
//         scrollTop: 0//ページトップまでスクロール
//     }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
//     return false;//リンク自体の無効化
// });

//スクロールした際の動きを関数でまとめる
function PageTopAnime() {
	var scroll = $(window).scrollTop();
	if (scroll >= 200){//上から200pxスクロールしたら
		$('.top-jump').removeClass('DownMove');//#page-topについているDownMoveというクラス名を除く
		$('.top-jump').addClass('UpMove');//#page-topについているUpMoveというクラス名を付与
	}else{
		if($('.top-jump').hasClass('UpMove')){//すでに#page-topにUpMoveというクラス名がついていたら
			$('.top-jump').removeClass('UpMove');//UpMoveというクラス名を除き
			$('.top-jump').addClass('DownMove');//DownMoveというクラス名を#page-topに付与
		}
	}
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
	PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// #page-topをクリックした際の設定
$('.top-jump a').click(function () {
    $('body,html').animate({
        scrollTop: 0//ページトップまでスクロール
    }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
    return false;//リンク自体の無効化
});

