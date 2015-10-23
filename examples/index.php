<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/3/12
 * Time: 下午2:38
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

include __DIR__ . '/../vendor/autoload.php';

//error_reporting(E_ALL);

echo ini_get('error_reporting');


use FastD\Template\Template;

/*
 * [0] => Array
        (
            [0] => /Users/janhuang/Documents/htdocs/me/fastd/framework/fastD/app/config/../views
            [1] => /Users/janhuang/Documents/htdocs/me/fastd/framework/fastD/app/config/../../src
            [2] => /Users/janhuang/Documents/htdocs/me/fastd/framework/fastD/src
            [3] => /Users/janhuang/Documents/htdocs/me/fastd/framework/fastD/vendor/fastd/swoole-bundle/src
        )

    [1] => Array
        (
            [cache] => /Users/janhuang/Documents/htdocs/me/fastd/framework/fastD/app/config/../storage/templates
        )
 * */

$template = new Template([
    __DIR__,
], [
    'cache' => __DIR__ . '/cache'
]);

echo $template->render('index.html.twig');
