Tesco PHP
===

- [API Documentation](https://secure.techfortesco.com/tescoapiweb/Tesco%20Grocery%20API%20Beta%201%20Edition%20-%20REST%20Reference%20Guide%201.0.0.26.pdf)

Installation
---

Add `"lsjroberts/tesco-php": "dev-master"` to your `composer.json`. _Note: this is still in early development so there are not yet any tagged releases._

#### Laravel

Update your `config/app.php` with the service provider:

```php
'Tesco\TescoServiceProvider`,
```

and facade:

```php
'Tesco' => 'Tesco\Facades\Laravel\Tesco`
```

#### Standalone

```php
use Tesco\Tesco;

$tesco = new Tesco($devKey, $appKey);
```

If you wish to create an service provider / adapter for another framework please create a pull request or just create an issue and I'll look into it.


Usage
---

#### Log a user into their account

**Note:** the tesco api doesn't implement OAuth or similar and the endpoint doesn't have a valid SSL certificate (at the time of writing).

```php
$customer = Tesco::login($email, $password);
```

#### Search for a product

```php
$jellies = Tesco::search('jelly');
```

As with many of the commands in this package, this returns an instance of `Illuminate\Support\Collection` so you are able to call the usual methods. For example, to get the first result call:

```php
$jelly = Tesco::search('jelly')->first();
```

#### Get the customer's basket

You can either get the basket from a previously selected customer:

```php
$basket = $customer->getBasket();
```

Or by using the `Tesco` facade to get the basket belonging to the last customer you logged in:

```php
$basket = Tesco::getBasket();
```

#### Update the customer's basket

The `update()` method increases the quantity of a product in a basket. A negative quantity will reduce the number of that product in the basket.

```php
Tesco::getBasket()->update($jelly, $quantity);
```

The `remove()` method completely removes the product from the basket.

```php
Tesco::getBasket()->remove($jelly);
```

#### Get all product categories

```php
$categories = Tesco::getCategories();
```

You can then loop the categories to get the product collections:

```php
foreach ($categories as $category)
{
	$category->getProducts();
}
```

#### Get all current offers

```php
$tesco = Tesco::getOffers();
```