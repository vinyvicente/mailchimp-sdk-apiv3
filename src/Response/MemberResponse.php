<?php

namespace MailChimp\Response;

/**
 * Class MemberResponse
 * @package MailChimp\Response
 */
class MemberResponse
{
    /**
     * @var bool
     */
    protected $success = false;

    /**
     * @var string
     */
    protected $memberId;

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     * @return MemberResponse
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->memberId;
    }

    /**
     * @param string $id
     * @return MemberResponse
     */
    public function setId($memberId)
    {
        $this->memberId = $memberId;
        return $this;
    }
}
