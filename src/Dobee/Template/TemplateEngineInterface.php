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
     * @param array $extensions
     * @return $this
     */
    public function setExtension(array $extensions);

    /**
     * @param array $paths
     * @return $this
     */
    public function setPaths(array $paths);

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options);

    /**
     * @param       $template
     * @param array $parameters
     * @return string
     */
    public function render($template, array $parameters = array());
}