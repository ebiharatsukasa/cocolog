## サービス概要
悩み続けてしまう人に、<br>
自分の考えをアウトプットすることで頭を整理する機会を提供する、<br>
日記投稿サービスです。
<br>
<br>
<img width="1200" src="https://i.gyazo.com/3c9108aa205def34a98ce6d5cac955cf.png">
<br>
## アプリURL
https://cocolog-67ffa5d743e2.herokuapp.com/  
<br>
## 使用技術  
- PHP 8.2
- Laravel 10.3
- MySQL 8.0
- Javascript
- Tailwind CSS
- Laravel Blade
- Nginx
- Heroku
- AWS S3
- Docker
## メインのターゲットユーザー  
考えるよりも悩んでしまう人  
文字を書くことで心を身軽に保ちたい人
<br>
## ユーザーが抱える課題  
自分の思考をアウトプットする習慣をつけたいけど、日頃使っているメモアプリを使うと煩雑になってしまう。　　
悩んでいても何も変わらないのはわかっていても行動できない。<br>
自分が何に悩んでいるのか自分でもわからないけど、なんとなく気が重い。
<br>
## 解決方法  
- ユーザーは自分の日記を書くことが自分の心を客観的に見ることができる
- 書いた日記の文面から客観的な心理状態を把握することができる。
- メタ認知力が上がり、メンタルヘルスが向上する。
<br><br>
## 実装機能  
- 未ログインユーザー  
	- トップページを表示できる
	- ログインできる  
		- メールアドレスとパスワードでログインできる     
  		- パスワードを再発行できる  
	- 会員登録できる  
		- ユーザーネーム、メールアドレス、パスワードで会員登録できる   
  <br>
- ログインユーザー  
	- トップページを表示できる
        - 最近のメンタルヘルスの推移を見ることができる
	- 自分の日記一覧を見ることができる  
		- タイトル / 本文のフリーワード検索ができる  
  		- それぞれの日記をクリックすることで日記の詳細ページに遷移できる  
	- 日記を書くことができる
   		- 写真を添付することができる  
	- マイページでユーザーに関する情報を見ることができる  
  		- プロフィールを編集、削除できる
  <br>
- 管理ユーザー  
	- ユーザーの一覧、編集、削除、検索ができる  
<br><br>
## なぜこのサービスを作りたいのか？
自分は今回の転職活動において、自分のキャリアにおいて大切なことについて深く考える機会を得ることができました。  
同時に、頭で考えていることをアウトプットすることでやるべきことが明確になり、身軽に行動できるようになるということを学びました。  
このような体験を後押しするサービスを作りたいと思い、cocologを作ることにしました。
<br>
## スケジュール<br>
PHP/Laravel, Docker等　キャッチアップ：11/17-11/24
<br>
メイン機能実装：11/25-11/29

## 課題の要件の達成状況
### 要件1. 必須機能
- [x] 認証機能
- [x] CRUD処理
- [x] 検索機能
- [x] フロントエンド
    - [x] デザインを整える（TailWindCSS）
    - [x] bladeを利用
### 要件2. 下記のうちいずれか1つを選択
- [ ] AWSを使用した本番公開
- [ ] 外部APIを利用した機能
- [x] Dockerでの環境構築
- [x] S3を利用した画像のupload機能
- [ ] CSVのインポート/ダウンロード機能

