<?php

namespace MailChimp\Entity\ListManager\Member;

/**
 * Class Location
 * @package MailChimp\Entity\ListManager\Member
 */
class Location
{
    /**
     * @var number
     */
    protected $latitude;

    /**
     * @var number
     */
    protected $longitude;

    /**
     * @var integer
     */
    protected $gmtOff;

    /**
     * @var integer
     */
    protected $dstOff;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @return number
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param number $latitude
     * @return Location
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return number
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param number $longitude
     * @return Location
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return int
     */
    public function getGmtOff()
    {
        return $this->gmtOff;
    }

    /**
     * @param int $gmtOff
     * @return Location
     */
    public function setGmtOff($gmtOff)
    {
        $this->gmtOff = $gmtOff;
        return $this;
    }

    /**
     * @return int
     */
    public function getDstOff()
    {
        return $this->dstOff;
    }

    /**
     * @param int $dstOff
     * @return Location
     */
    public function setDstOff($dstOff)
    {
        $this->dstOff = $dstOff;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return Location
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return Location
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }
}
