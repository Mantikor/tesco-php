<?php namespace Tesco\Command;

use Tesco\Resource\Basket;
use Tesco\Exception\ClientException;

class GetBasket extends Command
{
    public function get($fast = true)
    {
        $request = $this->getRequestWithSession('listbasket');

        $request->getQuery()
            ->set('fast', ($fast) ? 'Y' : 'N');

        $response = $request->send()->json();

        if (0 !== $response['StatusCode'])
        {
            throw new ClientException($response['StatusInfo']);
        }

        return new Basket($response);
    }
}