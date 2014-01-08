Tesco API PHP
===

Usage
---

```php
$customer = Tesco::login($email, $password);

$jelly = Tesco::search('jelly')->first();

$customer->getBasket()->update($jelly, $quantity);
Tesco::getBasket()->remove($jelly);

$categories = Tesco::getCategories();

foreach ($categories as $category)
{
	$category->getProducts();
}
```