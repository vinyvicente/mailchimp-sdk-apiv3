<?php

namespace MailChimp;

use MailChimp\Entity\ListManager;
use MailChimp\Response\ListResponse;

/**
 * Class Client
 * @package MailChimp
 */
class Client
{
    /**
     * @param ListManager $list
     * @return ListResponse
     */
    public function addList(ListManager $list)
    {
        return new ListResponse();
    }
}
