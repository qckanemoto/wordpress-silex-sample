# wordpress-silex-sample

WordPress + Silex sample

## Installation

```bash
$ cd /path/to/DocumentRoot
$ git clone git@github.com:qckanemoto/wordpress-silex-sample.git
$ cd wordpress-silex-sample
$ mysql -u[user_name] -p
mysql> create database wordpress_silex_sample default character set utf8;
mysql> grant all privileges on wordpress_silex_sample.* to [user_name]@localhost
mysql> exit
$ mysql -u[user_name] -p wordpress_silex_sample < mysqldump.sql
$ cp wp-config-sample.php wp-config.php
$ vi wp-config.php  # tailor to your environment
```

## Usage

Just go to [http://localhost/wordpress-silex-sample](http://localhost/wordpress-silex-sample).
