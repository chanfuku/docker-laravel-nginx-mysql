# LaravelDocker環境

```sh
# コンテナ起動
docker-compose up -d
# phpコンテナに入る
docker-compose exec php bash
# 必要なパッケージをインストール
cd /var/www/laravel && composer install
# マイグレーション実行
cd /var/www/laravel && php artisan migrate
# テストデータ投入
cd /var/www/laravel && php artisan db:seed
# コンテナやネットワークを全削除したい時
docker-compose down --rmi all --volumes
# メモ取得APIを実行
curl localhost/api/note/1
# メモ登録APIを実行
curl -X POST -H "Content-Type: application/json" -d '{"title":"あああ", "body":"いいい\nううう"}' localhost/api/note
```

## laravel .env
DBに接続するための.envの設定。
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=mysql
DB_USERNAME=mysql
DB_PASSWORD=mysql
```
