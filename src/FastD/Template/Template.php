<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/6/30
 * Time: 下午12:13
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Template;

class Template extends \Twig_Environment
{
    const VERSION = 'v0.1.*-dev';

    public function __construct(array $paths = [], $options = [])
    {
        parent::__construct(new \Twig_Loader_Filesystem($paths), $options);
    }
}