# アプリケーションの概要
- 私がマネージャーを勤めるWebライター向けに開発したタスクマネジメントアプリです。
- 月毎のタスクの納期や執筆状況確認、請求ステータス確認、請求書発行などの一連の業務の抜け漏れを防ぎます。


# アプリケーション作成の背景
- 作家が月に抱える執筆の本数が30前後と非常に多く、それらを全て人力＋Excelで管理しており、度々抜け漏れが発生する問題がありました。
- 改善の為にTrelloやBacklogなどの既存のタスクマネジメントツールを導入するも、作家の好みに合わず定着しませんでした。
- そこで、作家の好みに合うよう機能や画面などを定義し、作成しました。


# デモシステムへのアクセス
- AWS上にデモ環境を用意しており、以下の情報でアクセス可能です。
- URL：http://52.206.180.61/

```
USER：test@test.com
PASS：test
```


# デモシステムの環境情報
- AWS
    - EC2（Amazon Linux2）
    - RDS
- PHP7.2
- MySQL5.7
- Apache2.4
- Laravel5.5
- Git/GitHub


# 機能と使用技術
- 認証関連
    - ログイン/ログアウト機能
    - 非認証アクセス時のリダイレクト機能

- タスクアイテム関連
    - タスク登録・編集・削除・複製機能
    - タスク一覧機能
    - タスク検索機能
    - 関連データとの連携機能

- 企業アイテム関連
    - 企業登録・編集・削除機能
    - 企業一覧機能

- 担当者アイテム関連
    - 担当者登録・編集・削除機能
    - 担当者一覧機能

- 売上関連
    - 売上一覧機能
    - 売上検索機能

- 請求関連
    - 請求一覧機能
    - 請求検索機能
    - 請求詳細表示機能
    - 請求書（PDF）発行機能（laravel-dompdf＆日本語対応フォントで実装）

- リマインドメール関連
    - 送信設定確認機能
    - テストメール送信機能
    - リマインドメール送信機能（artisanコマンド＆cronで実装）

- その他ビュー関連
    - バリデーションとエラー表示
    - レスポンスシブデザイン（グリッド）
    - リンク・フォーム生成（Laravel Corrective）


# 未対応の課題
- 各種アクション実行時に結果メッセージ表示機能が実装されていない
- 企業IDと担当者IDの整合性が取れなくなる場合がある
- 企業IDと担当者IDの整合性が取れなくなった場合、エラー画面になってしまう場合がある