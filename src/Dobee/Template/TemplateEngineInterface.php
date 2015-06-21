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

namespace FastD\Template;

/**
 * Interface TemplateEngineInterface
 *
 * @package FastD\Template
 */
interface TemplateEngineInterface
{
    /**
     * @param array $config
     */
    public function __construct(array $config);

    /**
     * @param       $template
     * @param array $parameters
     * @return string
     */
    public function render($template, array $parameters = array());

    /**
     * @param array $extension
     * @return void
     */
    public function registerExtensions(array $extension = array());

    /**
     * @param array $global
     * @return void
     */
    public function registerGlobal(array $global = array());
}