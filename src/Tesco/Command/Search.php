<?php namespace Tesco\Command;

use Tesco\Exception\ClientException;

use Illuminate\Support\Collection;

class Search extends Command
{
    public function get($search, $page = 1)
    {
        $request = $this->getRequestWithSession('productsearch');

        $request->getQuery()
            ->set('searchtext', $search)
            ->set('page', $page);

        $response = $request->send()->json();

        if (0 !== $response['StatusCode'])
        {
            throw new ClientException($response['StatusInfo']);
        }

        return new Collection($response['Products']);
    }
}