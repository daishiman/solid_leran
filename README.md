# initial-setting-laravel(docker 🐳)

<img src="https://user-images.githubusercontent.com/35098175/145682384-0f531ede-96e0-44c3-a35e-32494bd9af42.png" alt="docker-laravel">


## Introduction

Build a simple laravel development environment with docker-compose. Compatible with Windows(WSL2), macOS(M1) and Linux.



## 使用方法

**詳細設定は [wiki](https://github.com/daishiman/initial-setting-laravel/wiki) 参照**

### クローンする

```bash
git clone git@github.com:daishiman/solid_leran.git
cd solid_leran
make create-project
```

### .env の作成
- アプリケーション名の変更

.env.example をコピーして .env とファイル名をを変更する

### プロジェクトを作成する

下記のコマンドでプロジェクトを作成する

```bash
make create-project
```

### ライブラリの導入

- [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- [friendsofphp/php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
- [nunomaduro/larastan](https://github.com/nunomaduro/larastan)
- [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights)
-

```bash
make install-recommend-packages
```

### 導入したライブラリを使用する

```bash
make quality
```

### Laravel ダッシュボードの確認

下記の URL を叩き、Laravel のダッシュボードに遷移するを確認する

http://localhost

## 参考

- Read this [Makefile](https://github.com/daishiman/initial-setting-laravel/blob/main/Makefile).
- Read this [Wiki](https://github.com/daishiman/initial-setting-laravel/wiki).

## コンテナ構造

```bash
├── mysql
├── nginx
└── php
```

### php コンテナ

- Base image
  - [php](https://hub.docker.com/_/php):8.1-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.2

### nginx コンテナ

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.22

### mysql コンテナ

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### mailhog コンテナ

- Base image
  - [mailhog/mailhog](https://hub.docker.com/r/mailhog/mailhog)
