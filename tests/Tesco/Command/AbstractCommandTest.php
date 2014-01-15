<?php

use Tesco\Tesco;
use Guzzle\Tests\GuzzleTestCase;

abstract class AbstractCommandTest extends GuzzleTestCase {

    protected $tesco;
    protected $command;

    public function setUp()
    {
        $config = require __DIR__ . '/../../config.php';

        $this->tesco = new Tesco($config['devKey'], $config['appKey']);
    }

    public function tearDown()
    {
        Mockery::close();
    }

}