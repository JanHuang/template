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

use Dobee\Template\Template;

$template = new Template(true, array(
    'options' => array('cache' => __DIR__ . '/cache'),
    'paths' => array(__DIR__)
));

$engine = $template->getEngine('twig');

$engine->registerExtensions(array(
    'demo' => new Twig_SimpleFunction('demo', function () {
        return 'demo';
    })
));

$engine->registerGlobal(array(
    'get' => $_GET
));

echo $engine->render('index.html.twig', array('name' => 'janhuang'));
