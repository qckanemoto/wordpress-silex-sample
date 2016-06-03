# wordpress-silex-sample

WordPress + Silex sample

## Installation

```bash
$ cd /path/to/DocumentRoot
$ git clone git@github.com:ttskch/wordpress-silex-sample.git
$ cd wordpress-silex-sample
$ composer install
$ mysql -u[user_name] -p
mysql> create database wordpress_silex_sample default character set utf8;
mysql> grant all privileges on wordpress_silex_sample.* to [user_name]@localhost
mysql> exit
$ mysql -u[user_name] -p wordpress_silex_sample < mysqldump.sql
$ cp wp-config-sample.php wp-config.php
$ vi wp-config.php  # tailor to your environment
```

## Usage

* Browse website on [http://localhost/wordpress-silex-sample](http://localhost/wordpress-silex-sample)
* Browse dashboard on [http://localhost/wordpress-silex-sample/wp-admin](http://localhost/wordpress-silex-sample/wp-admin) (user: `sample`, pass: `sample`)

## See also

* [WordPress+Silex | QUARTET Engineers' Blog](http://tech.quartetcom.co.jp/collection/wordpresssilex)
* [WordPress+Silex 〜静的サイトにブログ機能を足して楽に管理したかった〜 // Speaker Deck](https://speakerdeck.com/ttskch/wordpress-plus-silex-jing-de-saitoniburoguji-neng-wozu-sitele-niguan-li-sitakatuta)
