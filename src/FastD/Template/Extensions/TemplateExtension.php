<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/11/23
 * Time: 下午10:34
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Template\Extensions;

interface TemplateExtension
{
    public function getExtensionName();

    public function getExtensionContent();
}