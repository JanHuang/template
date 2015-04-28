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
class TemplateManager
{
    /**
     * @var array
     */
    private $mapped = array(
        'twig'      => 'Dobee\\Template\\TwigEngine\\Twig',
        'blade'     => '',
        'mustache'  => '',
        'smarty'    => '',
        'volt'      => '',
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

    private $config = array();

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
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

    public function registerGlobal()
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
     */
    public function getEngine($engine = null)
    {
        $engine = null === $engine ? $this->defaultEngine : $engine;

        if (!isset($this->mapped[$engine])) {
            throw new \UnexpectedValueException(sprintf('Template engine "%s" is undefined.', $engine));
        }

        if (!isset($this->engines[$engine])) {
            $this->engines[$engine] = new $this->mapped[$engine]($this->config);
        }

        return $this->engines[$engine];
    }
}