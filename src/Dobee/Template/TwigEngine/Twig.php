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
    protected $rootPath = 'Resources/views';

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
     * @param       $env
     * @param array $options
     * @param array $extensions
     */
    public function __construct($env = null, array $options = array(), array $extensions = array())
    {
        if (null === $env) {
            $env = 'prod';
        }

        if (in_array($env, array('test', 'dev'))) {
            unset($options['cache']);
        }

        if (isset($options['root_path'])) {
            $this->rootPath = $options['root_path'];
        }

        parent::__construct(new \Twig_Loader_Filesystem(isset($options['paths']) ? $options['paths'] : __DIR__), $options);

        foreach ($extensions as $name => $function) {
            if ($function instanceof \Twig_SimpleFunction) {
                $this->addFunction($name, $function);
            }
        }
    }
}