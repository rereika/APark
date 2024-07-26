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
function toggleAccordion(event) {
  event.preventDefault();
  let accordion = document.getElementById('accordionMenu');
  if (accordion.style.display === 'block') {
    accordion.style.display = 'none';
  } else {
    accordion.style.display = 'block';
  }
}


// レーダーチャートの作成
let radarConfig = {
  type: 'radar',
  data: {
    labels: ['類いない', '使用技術の正確性', '目新しさ', 'ストーリー性', 'わくわく'],
    datasets: [{
      label: 'Self',
      data: [0, 0, 0, 0, 0],
      backgroundColor: 'rgba(255, 136, 136, 0.3)',  // 赤色の透明な背景色
      borderColor: 'rgb(255, 136, 136)',  // 赤色の境界線
      borderWidth: 5
    }, {
      label: 'FB',
      data: [0, 0, 0, 0, 0],
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
};

// チャートの初期化
let RadarCtx = document.getElementsByName('feedBackRadarChart');
let radarCharts = [];

RadarCtx.forEach((r) => {
  radarCharts.push(new Chart(r, radarConfig));
});


// チャートの更新
function feedBackUpdateChart(event) {
  let forms = document.getElementsByName('feedBackChartForm');

  // 各チャートに対して対応するフォームデータを設定
  forms.forEach((form, index) => {
    let fbFormData = new FormData(form);

    let selfValues = [
      fbFormData.get('self_chart1'),
      fbFormData.get('self_chart2'),
      fbFormData.get('self_chart3'),
      fbFormData.get('self_chart4'),
      fbFormData.get('self_chart5')
    ].map(Number);

    let fbValues = [
      fbFormData.get('fb_chart1'),
      fbFormData.get('fb_chart2'),
      fbFormData.get('fb_chart3'),
      fbFormData.get('fb_chart4'),
      fbFormData.get('fb_chart5')
    ].map(Number);

    // チャートのデータを更新
    radarCharts[index].data.datasets[0].data = selfValues;
    radarCharts[index].data.datasets[1].data = fbValues;
    radarCharts[index].update();
  });
}
