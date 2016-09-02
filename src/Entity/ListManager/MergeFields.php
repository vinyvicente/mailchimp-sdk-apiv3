<?php

namespace MailChimp\Entity\ListManager;
use MailChimp\Entity\ListManager\MergeFields\Options;

/**
 * Class MergeFields
 * @package MailChimp\Entity\ListManager
 */
class MergeFields
{
    /**
     * @var string
     */
    protected $tag = '';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $required = false;

    /**
     * @var string
     */
    protected $defaultValue;

    /**
     * @var bool
     */
    protected $public = false;

    /**
     * @var int
     */
    protected $displayOrder = 0;

    /**
     * @var Options
     */
    protected $options;

    /**
     * @var string
     */
    protected $helpText = '';

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     * @return MergeFields
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return MergeFields
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MergeFields
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     * @return MergeFields
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @param string $defaultValue
     * @return MergeFields
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @param boolean $public
     * @return MergeFields
     */
    public function setPublic($public)
    {
        $this->public = $public;
        return $this;
    }

    /**
     * @return int
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    /**
     * @param int $displayOrder
     * @return MergeFields
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
        return $this;
    }

    /**
     * @return Options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Options $options
     * @return MergeFields
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function getHelpText()
    {
        return $this->helpText;
    }

    /**
     * @param string $helpText
     * @return MergeFields
     */
    public function setHelpText($helpText)
    {
        $this->helpText = $helpText;
        return $this;
    }

    public function __toString()
    {
        return json_encode(
            [
                'name' => $this->getName(),
                'type' => $this->getType(),
                'tag' => $this->tag,
            ]
        );
    }
}
