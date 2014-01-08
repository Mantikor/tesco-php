<?php namespace Tesco\Command;

abstract class Command
{
    protected $tesco;

    public function __construct($tesco)
    {
        $this->tesco = $tesco;
    }

    public function getRequest($command)
    {
        $request = $this->tesco->getClient()->get();

        $request->getQuery()->set('command', $command);

        return $request;
    }

    public function getRequestWithKeys($command)
    {
        $request = $this->getRequest($command);

        $request->getQuery()
            ->set('developerkey', $this->tesco->getDevKey())
            ->set('applicationkey', $this->tesco->getAppKey());

        return $request;
    }

    public function getRequestWithSession($command)
    {
        $request = $this->getRequest($command);

        $request->getQuery()
            ->set('sessionkey', $this->tesco->getSessionKey());

        return $request;
    }
}