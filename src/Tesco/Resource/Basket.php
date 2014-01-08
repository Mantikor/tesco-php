<?php namespace Tesco;

class Basket
{
    protected $data;

    public function __construct($data)
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