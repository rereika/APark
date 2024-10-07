# アイデア補助輪アプリ APark(エーパーク)

## 概要
プログラミング初学者であるAPPRENTICE生を対象とした、 **"良いアイデア"** を整理できるアプリです。<br>
このアプリを使えば、アイデア出しの補助輪に乗ることができ、ドラフトという名の旅に気持ち良く出発することができます。

### “良いアイデア”とは？
* 自分が楽しんで作成できる<br>
* エンジニアになりたい理由とのストーリーがあるもの<br>
* 目新しい<br>
* 実現可能なもの<br>
* 競合と被らない<br>

リンク：[APark (エーパーク)](https://apark.click/)

![Mockup](documents/image/Mockup2024.09.23.png)


## 解説記事
なぜそれを解決したいのか？、どうやって解決するのか？などはブログにまとめました。<br>ぜひ読んでいただけると嬉しいです。

URL：https://qiita.com/_reika0807/items/f8d7d7a4a1a3345fb2e4

## 使用技術
### フロントエンド
* HTML/CSS
* Javascript
### バックエンド
* PHP 8.3.10
* Laravel Framework 11.11.0
### データベース
* mysql  Ver 8.0.39
### ライブラリ
* jQuery
* Slick Carousel
* Chart.js
### インフラ(AWS)
* EC2
* RDS
* ALB
* Route53
* ACM 他...
### バージョン管理
* Git/GitHub
### CI/CD
* PHP Code Sniffer
* PHP Stan
### その他
* OpenAI API

## ER図
![ER](documents/image/ER2024.10.04.png)

## システム構成図
![Infrastructure](documents/image/Infrastructure2024.09.23.png)

## 機能一覧

| トップページ | アカウント登録、ログインページ |
| --- | --- |
| <img width="150%" alt="top" src="documents/image/top3.png"> | <img width="150%" alt="top" src="documents/image/login2.png"> |
| ・アプリの説明兼、作成者の思い<br>・アプリの使い方 | ・登録したユーザーIDとパスワードでログインできます<br>・ユーザー登録はIDとパスワードの他に期生の設定を行います |


| アイデア一覧ページ | マイページ |
| --- | --- |
|<img width="150%" alt="top" src="documents/image/home3.png">|<img width="150%" alt="top" src="documents/image/my_page3.png">|
|・投稿されたアイデアを閲覧できます<br>・最新のアイデアのセレクトボックスの値を変えると、テーマで絞ることができます<br>・マイページ、下書き、アイデア作成の3つに遷移できます| ・エンジニアになりたい理由(Why engineer)を入力し、レーダーチャートの精度(ストーリー性の部分)を上げます<br>・自分が投稿したアイデアを見ることができます<br>・アイデアをクリックすると詳細がモーダルウィンドウに表示されます<br>・アイデアを削除することもできます |

| アイデア作成ページ①② | アイデア作成ページ③④ |
| --- | --- |
| <img width="150%" alt="top" src="documents/image/create1.png">|<img width="150%" alt="top" src="documents/image/feedback.png"> |
| ①アプレンティス独自のテーマを選択します<br>②作成するアイデアの理想のチャートを数値で設定します<br>②ストーリー性の下の「ストーリー性とは？」からマイページに飛んで「Why engineer」を入力することが出来ます  | ③アイデアの詳細をOpenAI APIを使用してAIに渡します<br>④OpenAI APIから評価コメントと評価のチャートが返ってきます<br>④そのまま投稿してもよし、評価を見て修正したかったらエレベーターピッチの修正へ遷移できます。また、一旦下書き保存することも可能です。 |


## アップデート予定
## リリースノート
**ver 1.0.0**<br>
2024年8月12日<br>APark リリース
