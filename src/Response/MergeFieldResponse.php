<?php

namespace MailChimp\Response;

/**
 * Class MergeFIeldResponse
 * @package MailChimp\Response
 */
class MergeFieldResponse
{
    /**
     * @var bool
     */
    protected $success = false;

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     * @return MergeFieldResponse
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }
}
