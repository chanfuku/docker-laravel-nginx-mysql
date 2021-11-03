# LaravelのDocker環境

構成とバージョン。
- php (php-fpm) 7.4.1
  - composer 1.10.13
  - nodejs v12.18.4
  - npm 6.14.6
- php80 (php-fpm) 8.0.7
  - composer 2.1.3
  - nodejs v16.4.0
  - npm 7.18.1
- mysql 8.0 (5.7も可能)
  - パスワードなど初期設定をする。
- nginx 1.19.2
  - Laravel向けのconfを用意する。

## ディレクトリ構成
```sh
/project
├─ /docker    # コンテナ内のデータ保存先
|  ├─ /db
|  |  ├─ /data           # データベース保存先
|  |  ├─ /sql
|  |  └─ /my.conf        # mysqlの設定
|  ├─ /nginx
|  |  └─ /default.conf   # Nginxの設定
|  └─ /php
|     ├─ /Dockerfile     # phpコンテナの設定
|     └─ /php.ini        # phpの設定
├─ /web       # アプリケーションコード
└─ docker-compose.yml
``` 

## docker-composeのコマンド
ホスト側でよく使うコマンドです。

```sh
# コンテナ起動
$ docker-compose up -d
# http://localhost/ で確認できる。

## laravel .env

LaravelからDBに接続するための.envの設定。
```conf
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=docker
DB_PASSWORD=docker
```
