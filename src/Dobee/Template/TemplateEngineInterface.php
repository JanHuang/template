<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/2/5
 * Time: 上午12:47
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Template;

/**
 * Interface TemplateEngineInterface
 *
 * @package Dobee\Template
 */
interface TemplateEngineInterface
{
    /**
     * @param       $env
     * @param array $options
     * @param array $extensions
     */
    public function __construct($env, array $options = array(), array $extensions = array());

    /**
     * @param       $template
     * @param array $parameters
     * @return string
     */
    public function render($template, array $parameters = array());
}