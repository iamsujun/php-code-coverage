# PHP代码覆盖率

> 对于PHP代码，基于`php-code-coverage`、`phpcov`生成代码覆盖率报告：
>
> - `php-code-coverage`用来生成php代码覆盖率报告
> - `phpcov`用来合并多请求覆盖率结果，生成报告结果


## xdebug安装

```bash
pecl install xdebug
```

在php.ini配置文件中增加配置：

```ini
[XDebug]
xdebug.collect_params=on
xdebug.collect_return=on
xdebug.remote_autostart=on
```

## pacakge安装

```bash
composer install
```

## prepend.php文件引入

在代码执行时，提前引入`prepend.php`文件；为降低对业务仓库的侵入，可在nginx里面配置，也可在PHP.ini里面配置。

nginx配置方法：

```ini
fastcgi_param PHP_VALUE "auto_prepend_file=/data/www/php-code-coverage/prepend.php";
```

php.ini配置方法：

```ini
auto_prepend_file=/data/www/php-code-coverage/prepend.php
```

## 覆盖率报告生成

测试用例执行后，运行`bash build.sh`生成覆盖率报告。


---

参考文章：

- [PHP代码覆盖率](https://www.cnblogs.com/zhaoxd07/p/9049707.html)
- [TextUI frontend for php-code-coverage](https://packagist.org/packages/phpunit/phpcov)
- [Library that provides collection, processing, and rendering functionality for PHP code coverage information.](https://github.com/sebastianbergmann/php-code-coverage)