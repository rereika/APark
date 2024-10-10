
function confirmDelete() {
  if (confirm('アイデアを削除します。よろしいですか？')) {
    document.getElementById('deleteIdeaForm').submit();
    return false; // フォーム送信後にリンクのデフォルトの動作を防ぐ
  }
  return false; // ユーザーがキャンセルした場合のデフォルト動作を防ぐ
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
  let buttons = document.querySelectorAll('.choice');
  const themeForm = document.getElementById('themeForm');
  const themeInput = document.getElementById('themeInput');

  buttons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault(); // デフォルトの動作を防止

      // クリックされたボタンのデータ属性からテーマを取得
      themeInput.value = parseInt(this.getAttribute('data-theme'), 10);

      // 全てのボタンの色をリセット
      buttons.forEach(function (btn) {
        btn.style.color = '';
        btn.style.background = '';
      });

      // クリックされたボタンのスタイルを変更
      button.style.background = '#FF385C';
      button.style.color = 'white';

      // フォームを送信
      themeForm.submit();
    });
  });
});
