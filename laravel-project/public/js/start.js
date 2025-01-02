
//AParkとは？をクリックしたらwhats_good_idea_sectionクラスまで自動スクロール
document.getElementById('about_apark').addEventListener('click', function (event) {
  event.preventDefault();
  document.getElementById('whats_good_idea_section').scrollIntoView({
    behavior: 'smooth',  // スムーズなスクロール
    block: 'start'       // セクションの上部までスクロール
  });
});

//使い方をクリックしたらhow_to_use_sectionクラスまで自動スクロール
document.getElementById('how_to_use').addEventListener('click', function (event) {
  event.preventDefault();
  document.getElementById('how_to_use_section').scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
});
