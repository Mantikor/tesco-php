<?php

namespace Lsjroberts\Tesco;

use Guzzle\Http\Client;

class Tesco
{
	public function __construct()
	{
		$this->client = new Client("http://www.techfortesco.com/groceryapi/RESTService.aspx");
	}
}