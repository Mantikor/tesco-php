<?php namespace Tesco\Command;

class ListBasket extends Command
{
    public function get()
    {
        $request = $this->getRequestWithSession('listproductoffers');

        $response = $request->send();

        return $response->json();
    }
}