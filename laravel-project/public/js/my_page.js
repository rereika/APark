// Slick Carouselの初期化
$(document).ready(function () {
  $('.slider').slick({
    autoplay: false, // 自動的に動き出すか。初期値はfalse。
    infinite: true, // スライドをループさせるかどうか。初期値はtrue。
    slidesToShow: 2, // スライドを画面に2枚見せる
    slidesToScroll: 1, // 1回のスクロールで1枚の写真を移動して見せる
    preletrow: '<div class="slick-prev"></div>', // 矢印部分PreviewのHTMLを変更
    nextArrow: '<div class="slick-next"></div>', // 矢印部分NextのHTMLを変更
    dots: true, // 下部ドットナビゲーションの表示
    responsive: [
      {
        breakpoint: 769, // モニターの横幅が769px以下の見せ方
        settings: {
          slidesToShow: 2, // スライドを画面に2枚見せる
          slidesToScroll: 2 // 1回のスクロールで2枚の写真を移動して見せる
        }
      },
      {
        breakpoint: 426, // モニターの横幅が426px以下の見せ方
        settings: {
          slidesToShow: 1, // スライドを画面に1枚見せる
          slidesToScroll: 1 // 1回のスクロールで1枚の写真を移動して見せる
        }
      }
    ]
  });
});


document.addEventListener('DOMContentLoaded', function () {
  // アイデア削除ボタンを取得
  const deleteButtons = document.querySelectorAll('#delete_button_open');

  // 各削除ボタンに対してイベントリスナーを設定
  deleteButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault(); // デフォルトの動作を防止

      // 確認ダイアログを表示
      const confirmation = window.confirm('このアイデアを削除してもよろしいですか？');

      if (confirmation) {
        // OKが押されたら削除フォームを送信
        const form = button.closest('form');  // ボタンの親フォームを取得
        form.submit();
      } else {
        // キャンセルが押されたら何もしない
        return false;
      }
    });
  });
});

$(function () {
  // リストアイテムをクリックしたときにモーダルを開く
  $('.idea-item').click(function () {
    // データ属性から情報を取得
    let theme = $(this).find('.theme').text(); // テーマを取得
    let elevator1 = $(this).data('elevator1');
    let elevator2 = $(this).data('elevator2');
    let how = $(this).data('how');
    let createdAt = $(this).find('span').last().text(); // 最後のspanから作成日時を取得

    // モーダルに内容を設定
    $('#modalTheme').text(theme);
    $('#modalElevator1').text(elevator1);
    $('#modalElevator2').text(elevator2);
    $('#modalHow').text(how);
    $('#modalCreatedAt').text(createdAt);

    // アイデアIDをモーダルに設定
    let ideaId = $(this).data('idea-id');
    $('#modalIdeaId').val(ideaId);

    // モーダルを表示
    $('#modalArea').fadeIn(200);
  });

  // モーダルを閉じる
  $('#closeModal, #modalBg, #cancel_delete_button').click(function () {
    $('#modalArea').fadeOut(200);
  });
});
