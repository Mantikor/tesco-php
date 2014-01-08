<?php namespace Tesco\Command;

use Tesco\Basket;

class GetBasket extends Command
{
    public function get($fast = true)
    {
        $request = $this->getRequestWithSession('listbasket');

        $request->getQuery()
            ->set('fast', ($fast) ? 'Y' : 'N');

        $response = $request->send();

        return new Basket($response->json());
    }
}