<?php namespace Tesco;

use Exception;
use Guzzle\Http\Client;

class Tesco
{
    protected $devKey;
    protected $appKey;

    protected $client;
    protected $baseUrl = "http://www.techfortesco.com/groceryapi/RESTService.aspx";

    protected $sessionKey;

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

    public function getDevKey()
    {
        return $this->devKey;
    }

    public function getAppKey()
    {
        return $this->appKey;
    }

    public function setSessionKey($sessionKey)
    {
        $this->sessionKey = $sessionKey;
    }

    public function getSessionKey()
    {
        if (null === $this->sessionKey)
        {
            throw new Exception("Session key has not yet been set, user must be logged in first.");
        }

        return $this->sessionKey;
    }

    public function getCommand($command)
    {
        $className = '\\Tesco\\Command\\' . ucfirst($command);

        $args = func_get_args();
        array_shift($args);

        $class = new $className($this);

        return call_user_func_array([$class, 'get'], $args);
    }

    public function __call($method, $arguments)
    {
        return call_user_func_array([$this, 'getCommand'], array_merge(array($method), $arguments));
    }
}