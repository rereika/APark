// function TextTypingAnime() {
//   $('.TextTyping').each(function () {
//     var elemPos = $(this).offset().top - 50;
//     var scroll = $(window).scrollTop();
//     var windowHeight = $(window).height();
//     var thisChild = "";
//     if (scroll >= elemPos - windowHeight) {
//       thisChild = $(this).children(); //spanタグを取得
//       //spanタグの要素の１つ１つ処理を追加
//       thisChild.each(function (i) {
//         var time = 100;
//         //時差で表示する為にdelayを指定しその時間後にfadeInで表示させる
//         $(this).delay(time * i).fadeIn(time);
//       });
//     } else {
//       thisChild = $(this).children();
//       thisChild.each(function () {
//         $(this).stop(); //delay処理を止める
//         $(this).css("display", "none"); //spanタグ非表示
//       });
//     }
//   });
// }
// // 画面をスクロールをしたら動かしたい場合の記述
// $(window).scroll(function () {
//   TextTypingAnime();/* アニメーション用の関数を呼ぶ*/
// });// ここまで画面をスクロールをしたら動かしたい場合の記述

// // 画面が読み込まれたらすぐに動かしたい場合の記述
// $(window).on('load', function () {
//   //spanタグを追加する
//   var element = $(".TextTyping");
//   element.each(function () {
//     var text = $(this).html();
//     var textbox = "";
//     text.split('').forEach(function (t) {
//       if (t !== " ") {
//         textbox += '<span>' + t + '</span>';
//       } else {
//         textbox += t;
//       }
//     });
//     $(this).html(textbox);

//   });

//   TextTypingAnime();/* アニメーション用の関数を呼ぶ*/
// });// ここまで画面が読み込まれたらすぐに動かしたい場合の記述




document.getElementById('about_apark').addEventListener('click', function (event) {
  event.preventDefault(); // デフォルトのリンク動作を無効化
  document.getElementById('whats_good_idea_section').scrollIntoView({
    behavior: 'smooth',  // スムーズなスクロール
    block: 'start'       // セクションの上部までスクロール
  });
});

document.getElementById('how_to_use').addEventListener('click', function (event) {
  event.preventDefault();
  document.getElementById('how_to_use_section').scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
});
