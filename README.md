Tesco PHP
===

- [API Documentation](https://secure.techfortesco.com/tescoapiweb/Tesco%20Grocery%20API%20Beta%201%20Edition%20-%20REST%20Reference%20Guide%201.0.0.26.pdf)

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

You can either get the basket from the previously selected customer:

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