function TextTypingAnime() {
  $('.TextTyping').each(function () {
    let elemPos = $(this).offset().top - 50;
    let scroll = $(window).scrollTop();
    let windowHeight = $(window).height();
    let thisChild = "";
    if (scroll >= elemPos - windowHeight) {
      thisChild = $(this).children(); // spanタグを取得
      // spanタグの要素の1つ1つ処理を追加
      thisChild.each(function (i) {
        let time = 100;
        // 時差で表示するためにdelayを指定しその時間後にfadeInで表示させる
        $(this).delay(time * i).fadeIn(time);
      });
    } else {
      thisChild = $(this).children();
      thisChild.each(function () {
        $(this).stop(); // delay処理を止める
        $(this).css("display", "none"); // spanタグ非表示
      });
    }
  });
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  TextTypingAnime(); // アニメーション用の関数を呼ぶ
});

// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  // spanタグを追加する
  let element = $(".TextTyping");
  element.each(function () {
    let text = $(this).html();
    let textbox = "";
    text.split('').forEach(function (t) {
      if (t !== " ") {
        textbox += '<span>' + t + '</span>';
      } else {
        textbox += t;
      }
    });
    $(this).html(textbox);
  });

  TextTypingAnime(); // アニメーション用の関数を呼ぶ
});

// Slick Carouselの初期化
$(document).ready(function () {
  $('.slider').slick({
    autoplay: true, // 自動的に動き出すか。初期値はfalse。
    infinite: true, // スライドをループさせるかどうか。初期値はtrue。
    slidesToShow: 5, // スライドを画面に5枚見せる
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

// アコーディオンメニューの作成
function toggleAccordion(event, id) {
  event.preventDefault();
  let accordion = document.getElementById(id);
  if (accordion.style.display === 'block') {
    accordion.style.display = 'none';
  } else {
    accordion.style.display = 'block';
  }
}


// 変更後 home.js
// レーダーチャートの作成
function createRadarChart(ctx, selfValues, fbValues) {
  return new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ['類いない', '使用技術の正確性', '目新しさ', 'ストーリー性', 'わくわく'],
      datasets: [{
        label: 'Self',
        data: selfValues,
        backgroundColor: 'rgba(255, 136, 136, 0.3)',  // 赤色の透明な背景色
        borderColor: 'rgb(255, 136, 136)',  // 赤色の境界線
        borderWidth: 5
      }, {
        label: 'FB',
        data: fbValues,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',  // 青色の透明な背景色
        borderColor: 'rgba(54, 162, 235, 1)',  // 青色の境界線
        borderWidth: 5
      }],
    },
    options: {
      plugins: {
        legend: {
          display: false // レジェンド（ラベル）を非表示にする
        },
        tooltip: {
          callbacks: {
            label: function (tooltipItem) {
              let datasetLabel = tooltipItem.dataset.label;
              if (datasetLabel === 'FB') {
                let commentId = 'comment' + (tooltipItem.dataIndex + 1);
                let comment = document.getElementById(commentId).innerText;
                return comment;
              } else {
                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
              }
            }
          }
        }
      },
      scales: {
        r: {
          suggestedMin: 0,
          suggestedMax: 5,
          ticks: {},
          pointLabels: {
            font: {
              size: 10
            }
          }
        }
      },
      layout: {
        padding: {
          top: 1,
          bottom: 1,
        }
      }
    }
  });
}

// チャートの初期化
window.addEventListener('load', () => {
  const RadarCtx = document.getElementsByClassName('feedBackRadarChart');
  Array.from(RadarCtx).forEach((ctx) => {
    const selfValues = [
      ctx.dataset.selfChart1,
      ctx.dataset.selfChart2,
      ctx.dataset.selfChart3,
      ctx.dataset.selfChart4,
      ctx.dataset.selfChart5
    ].map(Number);

    const fbValues = [
      ctx.dataset.fbChart1,
      ctx.dataset.fbChart2,
      ctx.dataset.fbChart3,
      ctx.dataset.fbChart4,
      ctx.dataset.fbChart5
    ].map(Number);

    createRadarChart(ctx, selfValues, fbValues);
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
