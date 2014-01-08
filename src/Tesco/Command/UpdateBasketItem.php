<?php namespace Tesco\Command;

use Tesco\Resource\Product;
use Tesco\Exception\ClientException;

class UpdateBasketItem extends Command
{
    public function get($product, $quantity, $substitution = false, $note = null)
    {
        $request = $this->getRequestWithSession('changebasket');

        $query = $request->getQuery();

        $query->set('productid', ($product instanceof Product) ? $product->getID() : $product)
              ->set('changequantity', $quantity)
              ->set('substitution', ($substitution) ? 'Yes' : 'No');

        if (null !== $note)
        {
            $query->set('noteforshopper', urlencode($note));
        }

        $response = $request->send()->json();

        if (0 !== $response['StatusCode'])
        {
            throw new ClientException($response['StatusInfo']);
        }

        var_dump($response);
    }
}