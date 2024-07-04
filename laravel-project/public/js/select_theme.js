

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


document.getElementById('proceedCreateChartPage').addEventListener('click', function (event) {
  event.preventDefault(); // リンクのデフォルトの動作を防止します

  let form = document.getElementById('themeForm');
  form.submit(); // フォームを送信します
});
