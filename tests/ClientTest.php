<?php

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function testInstance()
    {
        $instance = new \MailChimp\Client();

        $this->assertInstanceOf('\\MailChimp\\Client', $instance);
    }
}
