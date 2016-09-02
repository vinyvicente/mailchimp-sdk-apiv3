<?php

namespace MailChimp\Entity\ListManager;
use MailChimp\Entity\ListManager\Member\Location;

/**
 * Class Member
 * @package MailChimp\Entity\ListManager
 */
class Member
{
    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $emailType = 'html';

    const STATUS_SUBSCRIBED = 'subscribed';
    const STATUS_UNSUBSCRIBED = 'unsubscribed';
    const STATUS_CLEANED = 'cleaned';
    const STATUS_PENDING = 'pending';

    /**
     * @var string
     */
    protected $status;

    /**
     * @var object
     */
    protected $interests;

    /**
     * @var string
     */
    protected $language = 'en';

    /**
     * @var array
     */
    protected $mergeFields = [];

    /**
     * @var bool
     */
    protected $vip = false;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var string
     */
    protected $ipSignUp;

    /**
     * @var string
     */
    protected $timestampSignUp;

    /**
     * @var string
     */
    protected $ipOpt;

    /**
     * @var string
     */
    protected $timestampOpt;

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     * @return Member
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailType()
    {
        return $this->emailType;
    }

    /**
     * @param string $emailType
     * @return Member
     */
    public function setEmailType($emailType)
    {
        $this->emailType = $emailType;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Member
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return object
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param object $interests
     * @return Member
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
        return $this;
    }

    /**
     * @return array
     */
    public function getMergeFields()
    {
        return $this->mergeFields;
    }

    /**
     * @param array $mergeFields
     * @return Member
     */
    public function setMergeFields($mergeFields)
    {
        $this->mergeFields = $mergeFields;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Member
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVip()
    {
        return $this->vip;
    }

    /**
     * @param boolean $vip
     * @return Member
     */
    public function setVip($vip)
    {
        $this->vip = $vip;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return Member
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpSignUp()
    {
        return $this->ipSignUp;
    }

    /**
     * @param string $ipSignUp
     * @return Member
     */
    public function setIpSignUp($ipSignUp)
    {
        $this->ipSignUp = $ipSignUp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimestampSignUp()
    {
        return $this->timestampSignUp;
    }

    /**
     * @param string $timestampSignUp
     * @return Member
     */
    public function setTimestampSignUp($timestampSignUp)
    {
        $this->timestampSignUp = $timestampSignUp;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpOpt()
    {
        return $this->ipOpt;
    }

    /**
     * @param string $ipOpt
     * @return Member
     */
    public function setIpOpt($ipOpt)
    {
        $this->ipOpt = $ipOpt;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimestampOpt()
    {
        return $this->timestampOpt;
    }

    /**
     * @param string $timestampOpt
     * @return Member
     */
    public function setTimestampOpt($timestampOpt)
    {
        $this->timestampOpt = $timestampOpt;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode([
            'email_address' => $this->emailAddress,
            'status' => $this->status,
            'merge_fields' => (object) $this->mergeFields
        ]);
    }
}
