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
    private $engines = array();

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
    protected $environment;

    /**
     * @param string $env
     * @param array  $options
     * @param array  $extensions
     */
    public function __construct($env = 'dev', array $options = array(), array $extensions = array())
    {
        $this->environment = $env;

        $this->options = $options;

        $this->extensions = $extensions;
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
     * @throws TemplateEngineException
     */
    public function getEngine($engine)
    {
        if (!isset($this->mapped[$engine])) {
            throw new TemplateEngineException(sprintf('Template engine "%s" is undefined.', $engine));
        }

        if (!isset($this->engines[$engine])) {
            $templateEngine = new $this->mapped[$engine]($this->environment, $this->options, $this->extensions);
            $this->engines[$engine] = $templateEngine;
        }

        return $this->engines[$engine];
    }
}