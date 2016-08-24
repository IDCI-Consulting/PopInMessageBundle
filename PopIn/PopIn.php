<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\PopIn;

class PopIn implements PopInInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $rules;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $title
     * @param string $content
     * @param array  $rules
     */
    public function __construct($name, $title, $content, array $rules = array())
    {
        $this->name    = $name;
        $this->title   = $title;
        $this->content = $content;
        $this->rules   = $rules;
    }

    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @{inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @{inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @{inheritdoc}
     */
    public function getRules()
    {
        return $this->rules;
    }
}