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

$template = new Template('dev', array(
    'cache_path' => __DIR__ . '/cache',
    'paths' => array(__DIR__)
));

$template->setExtensions('path', new Twig_SimpleFunction('path', function ($path) {
    return $path;
}));

$template->setOptions(array('debug' => 1));

$twig = $template->getEngine('twig');

echo $twig->render('index.html.twig', array('name' => 'janhuang'));
