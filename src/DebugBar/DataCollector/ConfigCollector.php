<?php
/*
 * This file is part of the DebugBar package.
 *
 * (c) 2013 Maxime Bouroumeau-Fuseau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DebugBar\DataCollector;

/**
 * Collects array data
 */
class ConfigCollector extends DataCollector implements Renderable
{
    protected $name;

    protected $data;

    /**
     * @param array  $data
     * @param string $name
     */
    public function __construct(array $data = array(), $name = 'config')
    {
        $this->name = $name;
        $this->data = $data;
    }

    /**
     * Sets the data
     * 
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * {@inheritDoc}
     */
    public function collect()
    {
        $data = array();
        foreach ($this->data as $k => $v) {
            $data[$k] = $this->formatVar($v);
        }
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getWidgets()
    {
        $name = $this->getName();
        return array(
            "$name" => array(
                "widget" => "PhpDebugBar.Widgets.VariableListWidget", 
                "map" => "$name", 
                "default" => "{}"
            )
        );
    }
}
