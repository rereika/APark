let RadarCtx = document.getElementById('feedBackRadarChart');

//レーダーチャートの作成
let radarConfig = {
  type: 'radar',
  data: {
    labels: ['類いない', '使用技術の正確性', '目新しさ', 'ストーリー性', 'わくわく'],
    datasets: [{
      label: 'Self',
      //データベースから引っ張ってきたい
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
            size: 25
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

//チャートの更新
function feedBackUpdateChart() {
  let form = document.getElementById('feedBackChartForm');
  let formData = new FormData(form);

  let selfValues = [
    formData.get('self_chart1'),
    formData.get('self_chart2'),
    formData.get('self_chart3'),
    formData.get('self_chart4'),
    formData.get('self_chart5')
  ].map(Number);

  let fbValues = [
    formData.get('fb_chart1'),
    formData.get('fb_chart2'),
    formData.get('fb_chart3'),
    formData.get('fb_chart4'),
    formData.get('fb_chart5')
  ].map(Number);

  radarChart.data.datasets[0].data = selfValues;
  radarChart.data.datasets[1].data = fbValues;
  radarChart.update();
}

window.addEventListener('load', feedBackUpdateChart);
document.getElementById('feedBackChartForm').addEventListener('change', feedBackUpdateChart);
