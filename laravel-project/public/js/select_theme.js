
function notdeleteMessage(event) {
  confirm("下書きに保存しますか？");
}

document.addEventListener('DOMContentLoaded', function () {
  let buttons = document.querySelectorAll('.choice'); // 全ての.choice要素を取得

  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      buttons.forEach(function (btn) {
        btn.style.color = ''; // 全てのボタンの文字色をリセット
      });

      button.style.background = '#FF385C'; // クリックされたボタンの文字色を変更
      button.style.color = 'white'; // クリックされたボタンの文字色を変更
    });
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.choice');
  const themeForm = document.getElementById('themeForm');
  const themeInput = document.getElementById('themeInput');
  const proceedButton = document.getElementById('proceedCreateChartPage');

  buttons.forEach(button => {
    button.addEventListener('click', function () {
      themeInput.value = this.getAttribute('data-theme');

      fetch(themeForm.action, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
          theme: themeInput.value
        })
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            proceedButton.click(); // 成功時に次のページへのリンクをクリック
          }
        })
        .catch(error => {
          console.error('Error:', error); // エラーが発生してもアラートは表示しない
        });
    });
  });
});
