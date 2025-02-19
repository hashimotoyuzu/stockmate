# stockmate
PHPフレームワークLaravelを使用した、持物管理サイトです。

親しみやすさを込めて、仲間や友達を意味する「mate」を使用し、"stockmate"と命名しました。

自分自身が普段の生活の中で、購入した商品の消費期限や在庫数を忘れがちなため、このようなアプリがあったら便利だと思い、このテーマで作品を作りました。

食品や日用品、洋服などお好きなカテゴリーを作成し、カテゴリーに紐づいた持物の在庫数や消費期限（使用期限）などを管理することができます。

登録した持物は検索、変更、削除をすることができます。

カテゴリー登録時の入力文字列数の表示には、JavaScriptを使用しています。

登録した持物は、キーワード・カテゴリー・在庫数・消費期限（使用期限）で検索ができるようになっており、and 検索を採用しています。

## 技術要素

- 開発環境 AWS EC2(Amazon Linux 2), VSCode 
- PHP 8.2.23
- Laravel Framework 9.52.20
- HTML5/CSS3
- Boostrap
- MySQL 5.7.22
- node 14.19.0
- npm 8.19.4
- JavaScript
- バージョン管理 Git/GitHub
- デプロイ Heroku

## 機能一覧

- 新規会員登録・ログイン・ログアウト機能
- カテゴリー登録機能
- カテゴリー編集・削除機能
- 持物登録機能
- 持物一覧表示機能
- 持物編集・削除機能（削除は、論理削除を採用）
- 持物検索機能
- 各種フラッシュメッセージ表示機能
- 入力値に関するバリデーション機能

## ワイヤーフレーム

[ワイヤーフレーム（Figma）](https://www.figma.com/design/iJnFGX07f8EyDbWVIShJPN/%E3%83%9D%E3%83%BC%E3%83%88%E3%83%95%E3%82%A9%E3%83%AA%E3%82%AA?node-id=4-69&t=IwJGZ2IgZSDVdKx6-0)

## ER図

テーブルは users、categories、articles の3つで構成されています。

[![Image from Gyazo](https://i.gyazo.com/e02cd5e694872fd46ebfa06372a5efcc.png)](https://gyazo.com/e02cd5e694872fd46ebfa06372a5efcc)

## Herokuにデプロイしたアプリ

[stockmate](https://yuzu-stockmate-dc406c0104c6.herokuapp.com/)

## エピソード

オリジナルポートフォリオとして初めて作成しました。

現在は簡易的な持物管理サイトですが、日常的に使用しやすいように食品や日用品などは在庫が切れそうになると、メールなどに通知してくれる機能の追加など今後も改良が可能と考えております。

ご意見がありましたらお知らせいただけますと幸いです。

| 名前   | Email     |
| :-----: | :---------: |
| Yuzu Hashimoto | you.zoo.0318@gmail.com |

## 著者
2025/02/11 Yuzu Hashimoto