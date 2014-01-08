<?php namespace Tesco\Command;

class ListBasket extends Command
{
    public function get()
    {
        $request = $this->getRequestWithSession('listproductcategories');

        $response = $request->send();

        return $response->json();
    }
}