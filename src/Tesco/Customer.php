<?php namespace Tesco;

class Customer implements CustomerInterface
{
    protected $session;

    public function setSession($session)
    {
        $this->session = $data;
    }

    public function getSession()
    {
        return $this->session;
    }
}