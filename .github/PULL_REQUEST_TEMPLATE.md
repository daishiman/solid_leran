## 概要

-

## やったこと(このプルリクで何をしたのか？)

-

## チェックリスト

### プルリク関連

- [ ] マージ先のブランチ名が正しいことを確認
- [ ] ユースケース図の修正
- [ ] クラス図の修正
- [ ] シーケンス図の修正

### コード関連

- [ ] 不要なコードが残っていないことを確認
- [ ] ERROR、WARNING が出ていないことを確認

### テスト関連（実施したものをチェック）

- [ ] composer dump-autoload新規エラー無し
- [ ] PHP-CS-Fixer の実行(make php-cs-fix)
- [ ] larastan の実行(make larastan)
- [ ] php insights の実行(make insights-fix)
- [ ] phpunit 確認(./vendor/bin/phpunit tests/Feature --group XXXXX --testdox)
- [ ] マイグレーションファイル更新時のロールバック動作確認
- [ ] フロントエンドと結合しての動作確認

## チケットへのリンク

- https://mtq-dev.atlassian.net/browse/STEP1-

## 対象のAPIのパス

- http://localhost:80/api/XXXXX/YYYYY

## やらないこと

-

## 動作確認(どのような動作確認を行ったのか？　結果はどうか？)

-

## 関連チケット(あれば)

-

## その他(レビュワーへの参考情報（実装上の懸念点や注意点などあれば記載）)

- 
