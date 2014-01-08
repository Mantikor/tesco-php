<?php

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../tests/config.php';

$tesco = new Tesco\Tesco($config['devKey'], $config['appKey']);

$customer = $tesco->login($config['email'], $config['password']);

var_dump("Logged in as " . $customer->getName());

$basket = $tesco->getBasket();

var_dump($basket->getLines());

$products = $tesco->search("jelly strawberry");

$first = $products->first();

var_dump($first);

$tesco->updateBasketItem($first['BaseProductId'], 3, false, "API Test");

var_dump($tesco->getBasket());