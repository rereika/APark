
function confirmDelete() {
  if (confirm('アイデアを削除します。よろしいですか？')) {
    document.getElementById('deleteIdeaForm').submit();
    return false; // フォーム送信後にリンクのデフォルトの動作を防ぐ
  }
  return false;
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
  let buttons = document.querySelectorAll('.choice'); // 全ての.choice要素を取得
  const themeForm = document.getElementById('themeForm');
  const themeInput = document.getElementById('themeInput');
  const proceedButton = document.getElementById('proceedCreateChartPage');

  console.log('ああああ' + themeInput.value);

  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      buttons.forEach(function (btn) {
        btn.style.color = ''; // 全てのボタンの文字色をリセット
        btn.style.background = ''; // 全てのボタンの背景色をリセット
      });

      button.style.background = '#FF385C'; // クリックされたボタンの背景色を変更
      button.style.color = 'white'; // クリックされたボタンの文字色を変更

      themeInput.value = parseInt(this.getAttribute('data-theme'), 10); // テーマを整数として設定
      console.log('いいい' + themeInput.value);
    });
  });

  proceedButton.addEventListener('click', function (event) {
    event.preventDefault(); // デフォルトの動作を防止

    if (!themeInput.value) {
      alert("テーマを選択してください");
      return;
    }

    themeForm.submit(); // フォームを送信
  });
});
