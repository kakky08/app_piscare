<img width="1360" alt="top画像" src="https://user-images.githubusercontent.com/77216691/193933209-70b84b1a-66fa-47fc-ba49-0f939b2c4ace.png">

# 制作背景
サービスの概要は、魚を食べることを習慣にすることを目的とした「魚食習慣化アプリ」です。想定しているユーザーは、一人暮らしを始めて魚をあまり食べなくなってしまった人や健康を意識して魚食を取り入れていきたい方を想定しています。習慣化するには、出来るだけ行動の数を減らす必要があるので、記録やレシピの検索、お店の検索を一つのアプリで完結できるサービスを制作しました。解決したい課題として、「魚を食べる習慣をつけたい」という欲求の解決を目指して作成しました。
<br>
<br>
## URL

* http://piscare.net
* ゲストログインボタンで簡単にログインできます。
<br>
<br>

## ER図

![piscare_db](https://user-images.githubusercontent.com/77216691/193934636-3c197890-16bd-49ce-b167-f310f09193d7.jpg)
<br>
<br>
## インフラ構成図

![piscareインフラ構成図](https://user-images.githubusercontent.com/77216691/193934043-8fe384e1-dcc9-4229-8feb-89bc946102cf.jpg)
<br>
<br>

## 使用技術
* PHP 7.4
* Laravel 6.2
* Laravel ui 
* guzzle 7.4
* carbon 2.58
* rakuten-sdk 1.1
* aws-sdk-php-laravel 3.0
* Vue 2.5
* vuedraggable 2.24.3 
* vuejs-datepicker 1.6.2
* JavaScript
* CSS
* Rakuten API
* Hotpeper API
* インフラ: AWS
* DB : RDS(MySQL)
<br>
<br>

## 機能一覧

|      | 　　　　　　 機能　 　　　　 　　 |
| :--- | :-------------------------------- |
| １   　　| アカウント登録機能 　                   |
| ２   　　| ログイン機能 　                       |
| ３   　　| ゲストユーザーログイン機能 　　　　　　          |
| ４   　　| マルチログイン機能 　　                  |
| ５   　　| ログアウト機能　　　　　　　　                    |
| ６   　　|　　魚を食べた回数の記録機能 　             |
| ７   　　| レシピの検索機能 　                    |
| ８   　　| お店検索機能                        |
| ９   　　| レシピの投稿機能(CRUD)               |
| １０ 　　　　| 投稿内容変更機能(CRUD)  　            |
| １１ 　　　　| 投稿の削除機能(CRUD)  　              |
| １２ 　　　　|　　レシピのお気に入り追加機能              |
| １3 　　　　| ユーザーのフォロー機能                 |
| １4 　　　　| マイページ機能                       |

<br>
<br>

# 何ができるのか

### 1. トップページ

最初にトップページへアクセスすると画面が描画されます。
ゲストログインボタンを押すことで、ゲストログインができます。

<img width="1360" alt="top画像" src="https://user-images.githubusercontent.com/77216691/193933223-cd5a80a8-d454-474c-8706-3ab9c67395e4.png">
<br>
<br>

### 2. ユーザー認証
アカウント登録済みの場合は、フォームにEmailとPasswordを入力してログインできます。
ソーシャルで登録した場合は、ソーシャルログインすることができます。

<img width="1353" alt="login" src="https://user-images.githubusercontent.com/77216691/193933247-17521a51-091a-4078-89c1-4216b9bbb555.png">
<br>
<br>

### 3. ユーザー登録
アカウント未登録の場合は、フォームにニックネームとEmailとPasswordを入力して登録できます。
googleとGitHub アカウントを利用した登録をすることができます。

<img width="1344" alt="register" src="https://user-images.githubusercontent.com/77216691/193933238-df533be3-818c-408e-b8e9-4be3fc9944c9.png">

<br>
<br>

### 4. 記録機能
日付をクリックすると日付を選択出来ます。
魚のボタンをクリックすることで、1日に食べた回数を記録できます。
回数に応じてカレンダーに表示されるアイコンの色が変わります。
前の月、次の月のボタンをクリックすることで前後の月の記録を確認することができます。

<img width="1266" alt="スクリーンショット 2022-10-05 20 19 35" src="https://user-images.githubusercontent.com/77216691/194049370-202cb6a9-2f03-4752-a463-964b752c696e.png">

<br>
<br>

### 5. レシピの投稿
レシピを投稿ボタンをクリックでレシピ名の登録画面に遷移します。

<img width="977" alt="スクリーンショット 2022-10-05 20 19 57" src="https://user-images.githubusercontent.com/77216691/194049478-5672baf7-1dd6-43e9-8eb2-1c329d811133.png">

<br>

フォームにタイトルを入力。
登録ボタンをクリックするとレシピの投稿画面に遷移します。

<img width="1240" alt="スクリーンショット 2022-10-05 20 38 14" src="https://user-images.githubusercontent.com/77216691/194053151-dcd2a551-3ec1-4ba7-a427-e776bceff82c.png">

<br>

画像やコメント、調味料、手順を登録することができます。

### 5、お店一覧
東京都内のお魚が食べれるお店の一覧が表示されます。
地域やキーワードからお店を検索することができます。
お店詳細ボタンをクリックすると外部のサイトでお店の詳細を確認することができます。

<img width="1264" alt="スクリーンショット 2022-10-05 20 21 29" src="https://user-images.githubusercontent.com/77216691/194049527-8e0326cd-0703-4455-8457-f1d610449e00.png">

<br>
<br>

### 6. レシピ一覧
魚に関するレシピの一覧が表示されます。
キーワードやカテゴリを選ぶことでメニューを検索できます。
詳細ボタンをクリックすることで詳細情報を確認できます。

<img width="1345" alt="スクリーンショット 2022-10-05 20 21 50" src="https://user-images.githubusercontent.com/77216691/194049551-195f25d2-dbe5-4b4b-802d-6d58eea7b3d7.png">

<br>
<br>

### 7. 投稿レシピ一覧
投稿されたレシピの一覧が表示されます。
新着順、人気順のタグをクリックするとソートできます。

レシピ詳細ボタンをクリックすると詳細画面に遷移します。


### 8. 投稿レシピ詳細
投稿の詳細が確認できます。
ハートのアイコンをクリックすることで、レシピをお気に入り登録できます。
フォローボタンをクリックすることで、投稿者をフォローすることができます。
投稿者名をクリックすることで、投稿者のプロフィールを確認できます。

<img width="1272" alt="スクリーンショット 2022-10-05 20 22 14" src="https://user-images.githubusercontent.com/77216691/194049670-3cdc184c-6fb2-4589-9ba9-e99a05259e20.png">

<br>
<br>

投稿レシピが投稿した本人なら編集、削除ボタンが表示され、編集ボタンなら編集画面に遷移し、削除ボタンならレシピが削除されます。
投稿レシピが投稿した本人なら、フォローボタンは非表示になり、ハートのアイコンがクリックできないようになります。

<img width="1155" alt="スクリーンショット 2022-10-05 20 44 47" src="https://user-images.githubusercontent.com/77216691/194053060-476c442c-5e60-4e73-8762-475a7c88e332.png">

<br>
<br>

### 9. プロフィールの表示
フォローボタンを押すとフォローできます。
本人の場合は、フォローボタンは、非表示になります。
各タブをクリックすることで情報を切り替えることができます。

<img width="1322" alt="スクリーンショット 2022-10-05 20 22 42" src="https://user-images.githubusercontent.com/77216691/194049648-da51c8ff-31d6-46a0-8b10-67694a4d7c6b.png">

<br>
<br>

### 10. 工夫したところ
* エンジニアとしての自走力をつけるために発生したエラーはなるべく自分で解決するようにしました。
* チーム開発を意識してGitHubのIssueだしをしながら実装しました。

