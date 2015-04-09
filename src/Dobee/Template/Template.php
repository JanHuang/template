<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/3/6
 * Time: 上午11:26
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Template;

/**
 * Class Template
 *
 * @package Dobee\Template
 */
class Template
{
    /**
     * @var array
     */
    private $mapped = array(
        'twig' => 'Dobee\\Template\\TwigEngine\\Twig',
    );

    /**
     * @var array
     */
    protected $engines = array();

    /**
     * @var array
     */
    private $extensions = array();

    /**
     * @var array
     */
    private $options = array();

    /**
     * @var string
     */
    private $defaultEngine = 'twig';

    /**
     * @var bool
     */
    private $debug;

    /**
     * @param bool   $debug
     * @param array  $options
     * @param string $defaultEngine
     */
    public function __construct($debug = true, array $options = array(), $defaultEngine = 'twig')
    {
        $this->debug = $debug;

        $this->options = $options;

        $this->defaultEngine = $defaultEngine;
    }

    /**
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param $name
     * @param $callable
     * @return $this
     */
    public function setExtensions($name, $callable)
    {
        $this->extensions[$name] = $callable;

        return $this;
    }

    /**
     * @return array
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @return array
     */
    public function registerExtensions()
    {
        return array();
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $engine
     * @return TemplateEngineInterface
     * @throws TemplateException
     */
    public function getEngine($engine = null)
    {
        if (!isset($this->mapped[$engine])) {
            throw new TemplateException(sprintf('Template engine "%s" is undefined.', $engine));
        }

        $engine = null === $engine ? $this->defaultEngine : $engine;

        if (!isset($this->engines[$engine])) {
            $templateEngine = new $this->mapped[$engine]($this->debug, $this->options);
            $this->engines[$engine] = $templateEngine;
        }

        return $this->engines[$engine];
    }
}