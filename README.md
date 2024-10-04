# アイデア補助輪アプリ APark(エーパーク)

## 概要
プログラミング初学者であるAPPRENTICE生を対象とした、 **"良いアイデア"** を整理できるアプリです。<br>
このアプリを使えば、アイデア出しの補助輪に乗ることができ、ドラフトという名の旅に気持ち良く出発することができます。

### “良いアイデア”とは？
* 自分が楽しんで作成できる<br>
* エンジニアになりたい理由とのストーリーがあるもの<br>
* 目新しい<br>
* 具体的なプロダクトイメージができている<br>
* 実現可能なもの<br>
* 競合と被らない<br>

リンク：[APark (エーパーク)](https://apark.click/)

![Mockup](documents/image/Mockup2024.09.23.png)


## 解説記事


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
![ER](documents/image/ER2024.06.21.png)

## システム構成図
![Infrastructure](documents/image/Infrastructure2024.09.23.png)

## 機能一覧

| トップページ | アカウント登録、ログインページ |
| --- | --- |
| <img width="150%" alt="top" src="documents/image/top.png"> | <img width="150%" alt="top" src="documents/image/login.png"> |
| ・アプリの説明<br>・アイデアの作成方法 | ・登録したユーザーIDとパスワードのみでログインできます<br>・ユーザー登録はIDをパスワードの他に期生の設定を行います |


| アイデア一覧ページ | マイページ |
| --- | --- |
|<img width="150%" alt="top" src="documents/image/home3.png">|<img width="150%" alt="top" src="documents/image/my_page.png">|
|・投稿されたアイデアを閲覧できます<br>・セレクトボックスの値を変えると閲覧したいアイデアをテーマで絞ることができます<br>・マイページ、下書き、アイデアの新規作成の3つに遷移できます| ・エンジニアになりたい理由(Why engineer)を入力し、レーダーチャートの精度を上げます<br>・自分が投稿したアイデアを見ることができます<br>・アイデアをクリックすると詳細がモーダルウィンドウに表示されます<br>・ここでアイデアを削除することもできます |


## アップデート予定
## リリースノート
**ver 1.0.0**<br>
2024年8月12日<br>APark リリース
