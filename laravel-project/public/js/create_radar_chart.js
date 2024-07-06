

let RadarCtx = document.getElementById('radarChart');

//レーダーチャートの作成
let radarConfig = {
  type: 'radar',
  data: {
    labels: ['類いない', '使用技術の正確性', '目新しさ', 'ストーリー性', 'わくわく'],
    datasets: [{
      label: 'FB',
      data: [2, 5, 3, 5, 4],
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
function updateChart() {
  let form = document.getElementById('chartForm');
  let formData = new FormData(form);
  let values = [
    formData.get('chart_form1'),
    formData.get('chart_form2'),
    formData.get('chart_form3'),
    formData.get('chart_form4'),
    formData.get('chart_form5')
  ].map(Number);

  radarChart.data.datasets[0].data = values;
  radarChart.update();

}

document.getElementById('chartForm').addEventListener('change', updateChart);


// 次へのリンククリック時の処理
document.getElementById('proceedPitchPage').addEventListener('click', function (event) {
  event.preventDefault();

  let form = document.getElementById('chartForm');
  let formData = new FormData(form);
  let ideaId = formData.get('idea_id'); // idea_idを取得

  fetch(`/ideas/update-chart/${ideaId}`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: formData
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log(data.message); // サーバーからのレスポンスを確認
      // 更新が成功したら次のページに遷移
      window.location.href = document.getElementById('proceedPitchPage').href;
    })
    .catch(error => {
      console.error('Error:', error);
    });
});
