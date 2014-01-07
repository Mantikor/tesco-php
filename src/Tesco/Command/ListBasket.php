<?php namespace Tesco\Command;

class ListBasket extends Command
{
    public function get($fast = true)
    {
        $request = $this->getRequestWithSession('listbasket');

        $request->getQuery()
            ->set('fast', ($fast) ? 'Y' : 'N');

        $response = $request->send();

        return $response->json();
    }
}