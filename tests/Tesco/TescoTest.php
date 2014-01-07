<?php

use Tesco\Tesco;

class TescoTest extends PHPUnit_Framework_TestCase
{
    protected $tesco;

    public function setUp()
    {
        $config = require __DIR__ . '/../config.php';

        $this->tesco = new Tesco($config['devKey'], $config['appKey']);
    }

    public function testBaseUrlExists()
    {
        $request = $this->tesco->getClient()->get();

        $response = $request->send();

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

    public function testServerDateTimeCommand()
    {
        $request = $this->tesco->getClient()->get();

        $request->getQuery()->set('command', 'serverdatetime');

        $json = $request->send()->json();

        $this->assertInternalType('array', $json);
        $this->assertArrayHasKey('ServerUTCDateTime', $json);
    }
}