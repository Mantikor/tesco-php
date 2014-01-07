<?php namespace Tesco;

use Guzzle\Http\Client;

class Tesco
{
    public $devKey;
    public $appKey;
    
    protected $client;
    protected $baseUrl = "http://www.techfortesco.com/groceryapi/RESTService.aspx";

    public function __construct($devKey, $appKey)
    {
        $this->devKey = $devKey;
        $this->appKey = $appKey;

        $this->client = new Client($this->baseUrl);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getCommand($command)
    {
        $className = '\\Tesco\\Command\\' . $command;

        $args = func_get_args();
        array_shift($args);

        $class = $className($this);

        return call_user_func_array([$class, 'get'], $args);
    }
}