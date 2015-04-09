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
    /**
     * @var string
     */
    protected $rootPath = 'Views';

    /**
     * @param       $template
     * @param array $parameters
     * @return string
     */
    public function render($template, array $parameters = array())
    {
        if (false !== ($pos = strpos($template, ':'))) {

            list($bundle, $module, $template) = explode(':', $template);

            $template = implode(DIRECTORY_SEPARATOR, array(
                $bundle, $this->rootPath, $module, $template,
            ));
        }

        return parent::render($template, $parameters);
    }

    /**
     * @param bool  $debug
     * @param array $arguments
     */
    public function __construct($debug = true, array $arguments = array())
    {
        $loader = new \Twig_Loader_Filesystem($arguments['paths']);

        if ($debug) {
            $arguments['options']['debug'] = true;
            $arguments['options']['cache'] = false;
        }

        parent::__construct($loader, $arguments['options']);
    }

    /**
     * @param array $extension
     * @return void
     */
    public function registerExtensions(array $extension = array())
    {
        foreach ($extension as $name => $func) {
            if ($func instanceof \Twig_SimpleFunction) {
                $this->addFunction($name, $func);
            }
        }
    }

    /**
     * @param array $global
     * @return void
     */
    public function registerGlobal(array $global = array())
    {
        foreach ($global as $name => $value) {
            $this->addGlobal($name, $value);
        }
    }
}