# LaravelDocker環境

```sh
# コンテナ起動
$ docker-compose up -d
# http://localhost/ で確認できる。
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
