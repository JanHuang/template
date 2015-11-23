<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/11/23
 * Time: 下午11:04
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Template\Extensions\Filters;

use FastD\Template\Extensions\TemplateExtension;

abstract class TemplateFilter extends \Twig_SimpleFilter implements TemplateExtension
{
    public function __construct()
    {
        $name = $this->getExtensionName();
        $callable = $this->getExtensionContent();
        parent::__construct($name, $callable, []);
    }
}