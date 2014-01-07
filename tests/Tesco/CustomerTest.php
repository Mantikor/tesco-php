<?php

use Tesco\Tesco;
use Tesco\Customer;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    protected $tesco;

    public function setUp()
    {
        $this->config = require __DIR__ . '/../config.php';

        $this->tesco = new Tesco($this->config['devKey'], $this->config['appKey']);
    }

    public function testLogin()
    {
        $session = $this->tesco->getCommand('Login', $this->config['email'], $this->config['password']);

        $this->assertInternalType('array', $session);
        $this->assertArrayHasKey('SessionKey', $session);
    }
}