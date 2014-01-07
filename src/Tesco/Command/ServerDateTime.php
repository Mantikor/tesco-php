<?php namespace Tesco\Command;

class ServerDateTime extends Command
{
    public function get()
    {
        $request = $this->getRequest('serverdatetime');

        $response = $request->send();

        return $response->json();
    }
}