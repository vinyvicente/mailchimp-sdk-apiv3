<?php

namespace MailChimp\Entity\ListManager\MergeFields;

/**
 * Class Options
 * @package MailChimp\Entity\ListManager\MergeFields
 */
class Options
{
    /**
     * @var int
     */
    protected $defaultCountry;

    /**
     * @var string
     */
    protected $phoneFormat;

    /**
     * @var string
     */
    protected $dateFormat;

    /**
     * @var array
     */
    protected $choices = [];

    /**
     * @var integer
     */
    protected $size;

    /**
     * @return int
     */
    public function getDefaultCountry()
    {
        return $this->defaultCountry;
    }

    /**
     * @param int $defaultCountry
     * @return Options
     */
    public function setDefaultCountry($defaultCountry)
    {
        $this->defaultCountry = $defaultCountry;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneFormat()
    {
        return $this->phoneFormat;
    }

    /**
     * @param string $phoneFormat
     * @return Options
     */
    public function setPhoneFormat($phoneFormat)
    {
        $this->phoneFormat = $phoneFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     * @return Options
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * @param array $choices
     * @return Options
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Options
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }
}
