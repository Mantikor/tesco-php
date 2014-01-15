<?php

use Tesco\Command\Login;

class LoginTest extends AbstractCommandTest {

    public function setUp()
    {
        parent::setUp();

        $this->command = new Login($this->tesco);
    }

    public function testGet()
    {
    	$customer = $this->command->get('email', 'password');

    	$this->assertInstanceOf('\Tesco\Resource\Customer', $customer);
    }

    /**
     * @expectedException \Tesco\Exception\LoginException
     */
    public function testGetBadAuth()
    {
    	$customer = $this->command->get('bademail', 'badpassword');
    }

    /**
     * @expectedException \Tesco\Exception\LoginException
     */
    public function testGetBadResponseStatusThrowsException()
    {

    }

}