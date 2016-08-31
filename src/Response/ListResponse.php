<?php

namespace MailChimp\Response;

/**
 * Class ListResponse
 * @package MailChimp\Response
 */
class ListResponse
{
    /**
     * @var string
     */
    protected $listId;

    /**
     * @var bool
     */
    protected $success = false;

    /**
     * @return string
     */
    public function getListId()
    {
        return $this->listId;
    }

    /**
     * @param string $listId
     * @return ListResponse
     */
    public function setListId($listId)
    {
        $this->listId = $listId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     * @return ListResponse
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }
}
