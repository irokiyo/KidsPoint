# どの箱をベースにするか
FROM php:8.3.4-fpm

#PHPの設定ファイルをコピー（カスタマイズ用）
COPY php.ini /usr/local/etc/php/

#ソフトのインストール(default-mysql-client mysqlのコマンド起動　zlib1g-dev zip関連で必要 libzip-dev PHPでzip機能を使うための開発用　unzip　zipファイルを展開する)
##PHPで使う追加オプションの設定(pdo_mysql LaravelがMySQLに接続するために必要 zip PHPでzipを扱えるようにする)
RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip \
    && apt-get clean

##composerのインストール方法（これでコマンドが簡略化される）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

##PHP起動したら/var/wwwが表示される、これがPHPの作業場所
WORKDIR /var/www
