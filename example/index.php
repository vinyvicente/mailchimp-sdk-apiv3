<?php

require_once '../vendor/autoload.php';

$client = new \MailChimp\Client('https://us1.api.mailchimp.com', '[YOUR-TOKEN]');

$myList = new \MailChimp\Entity\ListManager();
$myList->setName('Test List' . rand())
    ->setPermissionReminder('Test from permission reminder for user')
    ->getContact()->setCompany('Company Test')
        ->setCountry('Brazil')
        ->setCity('Sao Paulo')
        ->setState('SP')
        ->setAddress1('Rua Tal, 600')
        ->setZip('060000000');

$myList->getCampaignDefaults()
    ->setFromEmail('teste@test.com')
    ->setFromName('Test User');
