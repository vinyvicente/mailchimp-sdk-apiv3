<?php

require_once '../vendor/autoload.php';

$client = new \MailChimp\Client('https://us1.api.mailchimp.com/3.0', '38ad002e0a972594097bfa507662545a-us1');

$myList = new \MailChimp\Entity\ListManager();
$myList->setName('Test List')
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

$list = $client->addList($myList);

var_dump($list);exit;
