let RadarCtx = document.getElementById('feedBackRadarChart');

// レーダーチャートの作成
let radarConfig = {
  type: 'radar',
  data: {
    labels: ['類いない', '使用技術の正確性', '目新しさ', 'ストーリー性', 'わくわく'],
    datasets: [{
      label: 'Self',
      data: [3, 4, 2, 5, 3],  // 例: 実際のデータを設定
      backgroundColor: 'rgba(255, 136, 136, 0.3)',  // 赤色の透明な背景色
      borderColor: 'rgb(255, 136, 136)',  // 赤色の境界線
      borderWidth: 5
    }, {
      label: 'FB',
      data: [4, 2, 3, 5, 4],  // 例: 実際のデータを設定
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
        usePointStyle: true,
        callbacks: {
          // label: function (tooltipItem) {
          //   let datasetLabel = tooltipItem.dataset.label;
          //   if (datasetLabel === 'FB') {
          //     let commentId = 'comment' + (tooltipItem.dataIndex + 1);
          //     let comment = document.getElementById(commentId).innerText;
          //     return comment || 'No comment';
          //   } else {
          //     return datasetLabel + ': ' + tooltipItem.raw;
          //   }
          // }
        },
        bodyFont: {
          size: 15, // フォントサイズ
          weight: 'normal'
        },
        padding: 20, // ツールチップの内側のパディングを設定
        boxPadding: 20, // ボックス内のパディング
        position: 'nearest',
        // 最大幅を設定するカスタム関数
        custom: function (tooltip) {
          if (!tooltip) return;
          // 最大幅を指定
          tooltip.width = 50; // ここで適宜調整
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

// チャートの更新
function feedBackUpdateChart() {
  let fbForm = document.getElementById('feedBackChartForm');
  let fbFormData = new FormData(fbForm);

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

  radarChart.data.datasets[0].data = selfValues;
  radarChart.data.datasets[1].data = fbValues;
  radarChart.update();
}

window.addEventListener('load', feedBackUpdateChart);
document.getElementById('feedBackChartForm').addEventListener('change', feedBackUpdateChart);
