# initial-setting-laravel(docker ð³)

<img src="https://user-images.githubusercontent.com/35098175/145682384-0f531ede-96e0-44c3-a35e-32494bd9af42.png" alt="docker-laravel">


## Introduction

Build a simple laravel development environment with docker-compose. Compatible with Windows(WSL2), macOS(M1) and Linux.



## ä½¿ç¨æ¹æ³

**è©³ç´°è¨­å®ã¯ [wiki](https://github.com/daishiman/initial-setting-laravel/wiki) åç§**

### ã¯ã­ã¼ã³ãã

```bash
git clone git@github.com:daishiman/solid_leran.git
cd solid_leran
make create-project
```

### .env ã®ä½æ
- ã¢ããªã±ã¼ã·ã§ã³åã®å¤æ´

.env.example ãã³ãã¼ãã¦ .env ã¨ãã¡ã¤ã«åããå¤æ´ãã

### ãã­ã¸ã§ã¯ããä½æãã

ä¸è¨ã®ã³ãã³ãã§ãã­ã¸ã§ã¯ããä½æãã

```bash
make create-project
```

### ã©ã¤ãã©ãªã®å°å¥

- [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- [friendsofphp/php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
- [nunomaduro/larastan](https://github.com/nunomaduro/larastan)
- [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights)
-

```bash
make install-recommend-packages
```

### å°å¥ããã©ã¤ãã©ãªãä½¿ç¨ãã

```bash
make quality
```

### Laravel ããã·ã¥ãã¼ãã®ç¢ºèª

ä¸è¨ã® URL ãå©ããLaravel ã®ããã·ã¥ãã¼ãã«é·ç§»ãããç¢ºèªãã

http://localhost

## åè

- Read this [Makefile](https://github.com/daishiman/initial-setting-laravel/blob/main/Makefile).
- Read this [Wiki](https://github.com/daishiman/initial-setting-laravel/wiki).

## ã³ã³ããæ§é 

```bash
âââ mysql
âââ nginx
âââ php
```

### php ã³ã³ãã

- Base image
  - [php](https://hub.docker.com/_/php):8.1-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.2

### nginx ã³ã³ãã

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.22

### mysql ã³ã³ãã

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### mailhog ã³ã³ãã

- Base image
  - [mailhog/mailhog](https://hub.docker.com/r/mailhog/mailhog)
