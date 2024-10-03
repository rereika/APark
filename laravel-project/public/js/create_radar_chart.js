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

  radarChart.data.datasets[0].data = values;
  radarChart.update();

}

window.addEventListener('load', updateChart);
document.getElementById('chartForm').addEventListener('change', updateChart);


$(function () {
  $('#openModal').click(function () {
    $('#modalArea').fadeIn();
  });
  $('#closeModal , #modalBg').click(function () {
    $('#modalArea').fadeOut();
  });
});
