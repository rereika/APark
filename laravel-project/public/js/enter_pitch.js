let RadarCtx = document.getElementById('radarChart');

//レーダーチャートの作成
let radarConfig = {
  type: 'radar',
  data: {
    labels: ['類いない', '使用技術の正確性', '目新しさ', 'ストーリー性', 'わくわく'],
    datasets: [{
      label: 'FB',
      data: [0, 0, 0, 0, 0],
      backgroundColor: 'rgba(255, 136, 136, 0.3)',  // 赤色の透明な背景色
      borderColor: 'rgb(255, 136, 136)',  // 赤色の境界線
      borderWidth: 5
    }],
  },
  options: {
    plugins: {
      legend: {
        display: false // レジェンド（ラベル）を非表示にする
      }
    },
    scales: {
      r: {
        suggestedMin: 0,
        suggestedMax: 5,
        ticks: {
        },
        pointLabels: {
          font: {
            size: 15
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

let radarChart = new Chart(RadarCtx, radarConfig);

// 画面幅に応じてラベルのフォントサイズを調整する関数
function adjustLabelSize() {
  let screenWidth = window.innerWidth;
  let fontSize;

  // メディアスクリーンのサイズに応じてフォントサイズを変更
  if (screenWidth <= 428) {
    fontSize = 9; // 小さい画面用のフォントサイズ
  } else if (screenWidth <= 768) {
    fontSize = 15; // タブレット用のフォントサイズ
  } else {
    fontSize = 18; // 大きな画面用のフォントサイズ
  }

  radarChart.options.scales.r.pointLabels.font.size = fontSize;
  radarChart.update(); // チャートを再描画して変更を反映
}

// 初期表示時にフォントサイズを調整
adjustLabelSize();

// ウィンドウサイズが変更されたときにフォントサイズを再調整
window.addEventListener('resize', adjustLabelSize);


//チャートの更新
function updateChart() {

  let form = document.getElementById('chartForm');
  let formData = new FormData(form);
  let values = [
    formData.get('self_chart1'),
    formData.get('self_chart2'),
    formData.get('self_chart3'),
    formData.get('self_chart4'),
    formData.get('self_chart5')
  ].map(Number);
  console.log(values);
  radarChart.data.datasets[0].data = values;
  radarChart.update();

}


// document.getElementById('chartForm').addEventListener('load', updateChart);
window.addEventListener('load', updateChart);


document.addEventListener('DOMContentLoaded', function () {
  const deleteButton = document.querySelector('button[name="action"][value="delete"]');
  deleteButton.addEventListener('click', function (event) {
    // event.preventDefault();
    if (confirm('削除してよろしいですか？')) {
      //   document.getElementById('chartForm').submit();
      // OKの場合、そのまま clickイベント → submitイベントを発生させる
    } else {
      event.stopPropagation();    // 親要素への伝播をキャンセル → form タグの action をキャンセル
      event.preventDefault();     // 削除ボタンの click イベント自体をキャンセル
    }
  });
});

function setupCharCounter(textareaId, counterId) {
  const textarea = document.getElementById(textareaId);
  const maxLength = textarea.getAttribute("maxlength");
  const charCounter = document.getElementById(counterId);

  charCounter.textContent = `0 / ${maxLength}`;

  textarea.addEventListener("input", () => {
    const currentLength = textarea.value.length;
    charCounter.textContent = `${currentLength} / ${maxLength}`;

    if (currentLength > maxLength) {
      charCounter.style.color = "red";
    } else {
      charCounter.style.removeProperty("color");
    }
  });
}

setupCharCounter("input_pitch1", "charCounter1");
setupCharCounter("input_pitch2", "charCounter2");
setupCharCounter("input_solution", "charCounter3");

// ロード画面を表示
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById('chartForm');
  const proceedButton = form.querySelector('.proceed');

  proceedButton.addEventListener('click', function (event) {
    // デフォルトのフォーム送信をキャンセル
    event.preventDefault();

    //フォームを送信
    form.submit();
    // ロード画面を表示
    document.getElementById('page_loading').style.display = 'block';


    // フォームを送信するまでの遅延を設定
    form.querySelector('input[name="proceed"]').value = "true";
    // form.submit(); // フォームを送信
  });
});


//テキストのカウントアップ+バーの設定
let bar = new ProgressBar.Line(page_loading_text, {//id名を指定
  easing: 'easeInOut',//アニメーション効果linear、easeIn、easeOut、easeInOutが指定可能
  duration: 2500,//時間指定(1000＝1秒)
  strokeWidth: 0.2,//進捗ゲージの太さ
  color: '#555',//進捗ゲージのカラー
  trailWidth: 0.2,//ゲージベースの線の太さ
  trailColor: '#bbb',//ゲージベースの線のカラー
  text: {//テキストの形状を直接指定
    style: {//天地中央に配置
      position: 'absolute',
      left: '50%',
      top: '50%',
      padding: '0',
      margin: '-30px 0 0 0',//バーより上に配置
      transform: 'translate(-50%,-50%)',
      'font-size': '1rem',
      color: '#fff',
    },
    autoStyleContainer: false //自動付与のスタイルを切る
  },
  step: function (state, bar) {
    bar.setText(Math.round(bar.value() * 100) + ' %'); //テキストの数値
  }
});

//アニメーションスタート
bar.animate(1.0, function () {//バーを描画する割合を指定します 1.0 なら100%まで描画します
  $("#page_loading").delay(500).fadeOut(800);//アニメーションが終わったら#page_loadingエリアをフェードアウト
});
