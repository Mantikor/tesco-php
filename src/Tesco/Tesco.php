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

    public function setSessionKey($sessionKey)
    {
        $this->sessionKey = $sessionKey;
    }

    public function getCommand($command)
    {
        $className = '\\Tesco\\Command\\' . ucfirst($command);

        $args = func_get_args();
        array_shift($args);

        $class = $className($this);

        return call_user_func_array([$class, 'get'], $args);
    }

    public function __call($method, $arguments)
    {
        return call_user_func_array([$this, 'getCommand'], array_merge(array($method), $arguments));
    }
}