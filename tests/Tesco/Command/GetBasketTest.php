<?php

class GetBasketTest extends AbstractCommandTest {

    public function setUp()
    {
        parent::setUp();

        // $this->command = new GetBasket($this->tesco);
        $this->command = Mockery::mock('\Tesco\Command\GetBasket');
    }

    public function testGet()
    {
        $this->command->shouldReceive('getRequestWithSession')->andReturn();

        $basket = $this->command->get();

        $this->assertInstanceOf('\Tesco\Resource\Basket', $basket);
    }

    public function testGetNotFast()
    {
        $basket = $this->command->get();

        $this->assertInstanceOf('\Tesco\Resource\Basket', $basket);
    }

    /**
     * @expectedException \Tesco\Exception\ClientException
     */
    public function testGetBadResponseStatusThrowsException()
    {

    }

}