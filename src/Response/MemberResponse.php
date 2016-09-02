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
    protected $id;

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
        return $this->id;
    }

    /**
     * @param string $id
     * @return MemberResponse
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}