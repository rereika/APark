// Slick Carouselの初期化
$(document).ready(function () {
  $('.slider').slick({
    autoplay: false, // 自動的に動き出すか。初期値はfalse。
    infinite: true, // スライドをループさせるかどうか。初期値はtrue。
    slidesToShow: 2, // スライドを画面に2枚見せる
    slidesToScroll: 1, // 1回のスクロールで1枚の写真を移動して見せる
    prevArrow: '<div class="slick-prev"></div>', // 矢印部分PreviewのHTMLを変更
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

document.addEventListener('DOMContentLoaded', () => {
  // モーダルを開く処理
  document.querySelectorAll('.js-modal-open').forEach(button => {
    button.addEventListener('click', function (event) {
      event.preventDefault(); // デフォルトの動作を防ぐ
      const modalId = this.getAttribute('data-modal-id'); // data-modal-id 属性を取得
      const targetModal = document.getElementById(modalId); // モーダルを取得
      if (targetModal) {
        targetModal.style.display = 'block'; // モーダルを表示
      }
    });
  });

  // モーダルを閉じる処理
  document.querySelectorAll('.js-modal-close').forEach(button => {
    button.addEventListener('click', function () {
      this.closest('.modal').style.display = 'none'; // 親のモーダルを非表示にする
    });
  });

  // モーダルの外をクリックで閉じる処理
  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('modal')) {
      event.target.style.display = 'none'; // モーダルの外をクリックで非表示にする
    }
  });
});
