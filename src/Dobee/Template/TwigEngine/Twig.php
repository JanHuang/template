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
class Twig implements TemplateEngineInterface
{
    private $twig;

    /**
     * @param       $template
     * @param array $parameters
     * @return string
     */
    public function render($template, array $parameters = array())
    {
        return $this->twig->render($template, $parameters);
    }

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $loader = new \Twig_Loader_Filesystem($config['paths']);

        $this->twig = new \Twig_Environment($loader, $config['options']);

        if (isset($config['extensions']) && is_array($config['extensions'])) {
            $this->registerExtensions($config['extensions']);
        }

        if (isset($config['global']) && is_array($config['global'])) {
            $this->registerGlobal($config['global']);
        }
    }

    /**
     * @param array $extension
     * @return void
     */
    public function registerExtensions(array $extension = array())
    {
        foreach ($extension as $name => $func) {
            if ($func instanceof \Twig_SimpleFunction) {
                $this->twig->addFunction($name, $func);
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
            $this->twig->addGlobal($name, $value);
        }
    }
}