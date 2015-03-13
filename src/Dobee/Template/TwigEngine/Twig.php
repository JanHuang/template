<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/2/5
 * Time: 上午12:48
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Template\TwigEngine;

use Dobee\Template\TemplateEngineInterface;

/**
 * Template Engine: Twig
 *
 * Class Twig
 *
 * @package Dobee\Template\TwigEngine
 */
class Twig extends \Twig_Environment implements TemplateEngineInterface
{
    public function __construct(array $options = array(), array $extensions = array(), array $paths = array())
    {
        parent::__construct(new \Twig_Loader_Filesystem($paths), $options);

        foreach ($extensions as $name => $function) {
            $this->addFunction($name, $function);
        }
    }

    /**
     * @param       $template
     * @param array $parameters
     * @return string|ResponseInterface
     */
    public function render($template, array $parameters = array())
    {
        if (false !== ($pos = strpos($template, ':'))) {

            list($bundle, $module, $template) = explode(':', $template);

            $template = implode(DIRECTORY_SEPARATOR, array(
                $bundle, 'Resources/views', $module, $template,
            ));
        }

        return parent::render($template, $parameters);
    }

    /**
     * @param array $extensions
     * @return $this
     */
    public function setExtension(array $extensions)
    {
        // TODO: Implement setExtension() method.
    }

    /**
     * @param array $paths
     * @return $this
     */
    public function setPaths(array $paths)
    {
        // TODO: Implement setPaths() method.
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        // TODO: Implement setOptions() method.
    }
}