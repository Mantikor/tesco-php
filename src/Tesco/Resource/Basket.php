<?php namespace Tesco;

class Basket implements BasketInterface
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getDetails()
    {
        return [
            'total' => $this->data['BasketGuidePrice'],
            'savings' => $this->data['BasketGuideMultiBuySavings'],
            'quantity' => $this->data['BasketQuantity'],
            'clubcardPoints' => $this->data['BasketTotalClubcardPoints'],
        ];
    }

    public function getLines()
    {
        return $this->data['BasketLines'];
    }
}