<?php

namespace MailChimp\Entity;

use MailChimp\Entity\ListManager\CampaignDefaults;
use MailChimp\Entity\ListManager\Contact;

/**
 * Class ListManager
 * @package MailChimp\Entity
 */
class ListManager
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var string
     */
    protected $permissionReminder;

    /**
     * @var bool
     */
    protected $useArchiveBar = false;

    /**
     * @var CampaignDefaults
     */
    protected $campaignDefaults;

    /**
     * @var string
     */
    protected $notifyOnSubscribe = '';

    /**
     * @var string
     */
    protected $notifyOnUnSubscribe = '';

    /**
     * @var string
     */
    protected $emailTypeOption = false;

    /**
     * @var string
     */
    protected $visibility = 'prv';

    const VISIBILITY_PRIVATE = 'prv';
    const VISIBILITY_PUBLIC = 'pub';

    public function __construct()
    {
        $this->contact = new Contact();
        $this->campaignDefaults = new CampaignDefaults();
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
     * @return ListManager
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return ListManager
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return string
     */
    public function getPermissionReminder()
    {
        return $this->permissionReminder;
    }

    /**
     * @param string $permissionReminder
     * @return ListManager
     */
    public function setPermissionReminder($permissionReminder)
    {
        $this->permissionReminder = $permissionReminder;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseArchiveBar()
    {
        return $this->useArchiveBar;
    }

    /**
     * @param boolean $useArchiveBar
     * @return ListManager
     */
    public function setUseArchiveBar($useArchiveBar)
    {
        $this->useArchiveBar = $useArchiveBar;
        return $this;
    }

    /**
     * @return CampaignDefaults
     */
    public function getCampaignDefaults()
    {
        return $this->campaignDefaults;
    }

    /**
     * @param CampaignDefaults $campaignDefaults
     * @return ListManager
     */
    public function setCampaignDefaults($campaignDefaults)
    {
        $this->campaignDefaults = $campaignDefaults;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotifyOnSubscribe()
    {
        return $this->notifyOnSubscribe;
    }

    /**
     * @param string $notifyOnSubscribe
     * @return ListManager
     */
    public function setNotifyOnSubscribe($notifyOnSubscribe)
    {
        $this->notifyOnSubscribe = $notifyOnSubscribe;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailTypeOption()
    {
        return $this->emailTypeOption;
    }

    /**
     * @param string $emailTypeOption
     * @return ListManager
     */
    public function setEmailTypeOption($emailTypeOption)
    {
        $this->emailTypeOption = $emailTypeOption;
        return $this;
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param string $visibility
     * @return ListManager
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotifyOnUnSubscribe()
    {
        return $this->notifyOnUnSubscribe;
    }

    /**
     * @param string $notifyOnUnSubscribe
     * @return ListManager
     */
    public function setNotifyOnUnSubscribe($notifyOnUnSubscribe)
    {
        $this->notifyOnUnSubscribe = $notifyOnUnSubscribe;
        return $this;
    }

    /**
     *
     */
    public function __toString()
    {
        return json_encode([
            'name' => $this->getName(),
            'contact' => [
                'company' => $this->getContact()->getCompany(),
                'address1' => $this->getContact()->getAddress1(),
                'address2' => $this->getContact()->getAddress2(),
                'city' => $this->getContact()->getCity(),
                'state' => $this->getContact()->getState(),
                'zip' => $this->getContact()->getZip(),
                'country' => $this->getContact()->getCountry(),
                'phone' => $this->getContact()->getPhone(),
            ],
            'permission_reminder' => $this->getPermissionReminder(),
            'use_archive_bar' => $this->isUseArchiveBar(),
            'campaign_defaults' => [
                'from_name' => $this->getCampaignDefaults()->getFromName(),
                'from_email' => $this->getCampaignDefaults()->getFromEmail(),
                'subject' => $this->getCampaignDefaults()->getSubject(),
                'language' => $this->getCampaignDefaults()->getLanguage(),
            ],
            'notify_on_subscribe' => $this->getNotifyOnSubscribe(),
            'notify_on_unsubscribe' => $this->getNotifyOnUnSubscribe(),
            'email_type_option' => $this->getEmailTypeOption(),
            'visibility' => $this->getVisibility(),
        ]);
    }
}
