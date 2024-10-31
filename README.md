# アイデア補助輪アプリ APark(エーパーク)
![Mockup](documents/image/Mockup2024.09.23.png)
## 目次
1. [概要](#概要)
2. [開発の背景・思い](#開発の背景・思い)
3. [使用技術](#使用技術)
4. [ER図](#ER図)
5. [システム構成図](#システム構成図)
6. [機能一覧](#機能一覧)


## 概要
プログラミング初学者である[アプレンティス](https://apprentice.jp/lp)生を対象とした、 **"良いアイデア"** を整理できるアプリです。<br>

### “良いアイデア”とは？
* 競合と被らないもの<br>
* エンジニアになりたい理由とのストーリー性があるもの<br>
* 自分が楽しんで作成できるもの<br>
* 目新しさがあるもの<br>
* 実現可能なもの<br>

### キャッチコピー
「アプレンティス生が集まる公園、APark。それぞれがアイデアの補助輪に乗り、次なるアプレンティスシップの旅に出かけよう！」

### プロダクト概要
* アプレンティスのカリキュラムに沿った形式で、アイデアを分析・可視化できる
* AIがテキストベースでフィードバックを提供する
* 先輩や後輩のアイデアを簡単に参考にできる

さらに、このアプリはアプレンティス生専用のため、 **共通の課題や目標を持つ仲間同士で交流やフィードバックを行いやすい** 点も大きな特徴です。

リンク：[APark (エーパーク)](https://apark.click/)

## 開発の背景・思い
### なぜこのアプリを作ったのか
きっかけは、私自身がAParkを考える際に直面した困難でした。<br>
アプレンティスでは、チーム開発や個人開発を行う際にテーマ（「自分たちの役に立つものを開発せよ」など）は提供されるものの、 具体的なアイデアは自分たちで考える必要があります。<br>
その過程で、「良いアイデア」に仕上げる難しさに直面しました。<br>

未経験者にとって、アイデア出しは非常にハードルが高いものです。<br>
既存アプリとの差別化、実現可能性、モチベーションの維持など、多くの要素を考慮する必要があります。<br>

しかし！アイデアが決まらないと開発が進まず、ストレスを感じることに。。。<br>
さらに、ユーザーに響かないアイデアはドラフト指名（内定）を得られません。<br>
「え？右も左も分からないのに最初に転けたら終わり!?」――私だけでなく、同期のみんなも同じ悩みを抱えていました。<br>

そこで、アイデア出しの過程をサポートするアプリを作ることに決めました！

### どんな課題を解決したのか
解決したい課題は大きく３つありました。
- 良いアイデアにするために考慮すべき点が抜け落ちてしまう<br>
→ AIが項目ごとにアイデアを評価し、レーダーチャートを作成！<br>エレベーターピッチやアプリの機能を文章で伝えることで、良い点や改善すべき点をフィードバックしてくれます。<br><br>
- 先輩のアイデアを参考にするのに時間がかかる<br>
→  セレクトボックスを使って簡易的にアイデアの検索ができるようにしました！<br><br>
- 先輩・後輩の繋がる場がない<br>
→アプリを作ることで、オープンに繋がれる場を提供します！

### 解説記事
詳しくは以下の記事をご覧ください。<br>
URL：https://qiita.com/_reika0807/items/f8d7d7a4a1a3345fb2e4

## 使用技術
### フロントエンド
* HTML/CSS
* JavaScript (ES2023)
### バックエンド
* PHP 8.3.10
* Laravel Framework 11.11.0
### データベース
* mysql 8.0.39
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
### 静的解析ツール
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
