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
 *@package Dobee\Template
 */
class Template
{
    /**
     * @var array
     */
    private $mapped = array(
        'twig' => 'Dobee\\Template\\TwigEngine\\Twig',
    );

    private $engines = array();

    private $provides = array();

    private $extension = array();

    private $options = array();

    public function setExtensions($name, $callable)
    {
        $this->extension[$name] = $callable;

        return $this;
    }

    public function getExtensions()
    {
        return $this->extension;
    }

    public function setProviderPath(array $provides = array())
    {
        $this->provides = $provides;

        return $this;
    }

    public function getProviderPath()
    {
        return $this->provides;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

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
            $templateEngine = new $this->mapped[$engine]($this->getOptions(), $this->getExtensions(), $this->getProviderPath());
            $templateEngine->setPaths($this->getProviderPath());
            $templateEngine->setExtension($this->getExtensions());
            $templateEngine->setOptions($this->getOptions());
            $this->setEngine($engine, $templateEngine);
        }

        return $this->engines[$engine];
    }

    /**
     * @param                         $engine
     * @param TemplateEngineInterface $templateEngineInterface
     * @return $this
     */
    public function setEngine($engine, TemplateEngineInterface $templateEngineInterface)
    {
        $this->engines[$engine] = $templateEngineInterface;

        return $this;
    }
}