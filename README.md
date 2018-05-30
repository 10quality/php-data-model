# Data Model (PHP)

[![Latest Stable Version](https://poser.pugx.org/10quality/php-data-model/v/stable)](https://packagist.org/packages/10quality/php-data-model)
[![Total Downloads](https://poser.pugx.org/10quality/php-data-model/downloads)](https://packagist.org/packages/10quality/php-data-model)
[![License](https://poser.pugx.org/10quality/php-data-model/license)](https://packagist.org/packages/10quality/php-data-model)

PHP Library that provides generic and scalable Data Models (abstract model class) for any type of data handling.

This perfect and suitable for when developing MVC frameworks, Api clients, wrappets and/or any type of project that requires data handling.

*Models inspired by [Laravel](https://laravel.com/) and our very own [Wordpress MVC](https://www.wordpress-mvc.com/).*

## Requires

* PHP >= 5.4

## Usage

When defining your models, extend them from the `Model` abstract class.

In the following example, a `Product` data model will be created and will extend from the `Model` abstract class.
```php

use TenQuality\Data\Model;

class Product extends Model
{
}

```

Then instantiate your models like this:
```php
$product = new Product;
```

### Adding data

Very easy, simply add the data like an object property.
```php
// Set data
$product->price = 19.99;
$product->name = 'My product';
$product->brandName = '10 Quality';

// Get data
echo $product->price; // Will echo 19.99
echo $product->name; // Will echo My product
echo $product->brandName; // Will echo 10 Quality
```

### Creating aliases

Aliases are model properties that are set or get by class methods. This are defined in the model.

In the following example, an alias will be created in the model to display prices with currenty.

```php

use TenQuality\Data\Model;

class Product extends Model
{
    /**
     * Method for alias property `displayPrice`.
     * Return `price` property concatenated with the $ (dollar) symbol
     */
    protected function getDisplayPriceAlias()
    {
        return '$'.$this->price;
    }

    /**
     * Method for alias property `displayPrice`.
     * Sets a the price value if the alias is used.
     */
    protected function setDisplayPriceAlias($value)
    {
        $this->price = floatval(str_replace('$', '', $value));
    }
}

```

Then use it like this:
```php
$product->price = 19.99;

// Get alias property
echo $product->displayPrice; // Will echo $19.99

// Set alias property
$product->displayPrice = 29.99;

// Echo property
echo $product->price; // Will echo 29.99
echo $product->displayPrice; // Will echo $29.99
```

### Casting

Before using any casting options, the model needs to define which properties are visible and which are hidden. This is done by listing the visible ones like this:

```php

use TenQuality\Data\Model;

class Product extends Model
{
    protected $properties = [
        'name',
        'price',
        'displayPrice',
    ];
}

```

Notice that both properties and aliases can be listed. Following the samples above, property `brandName` will stay hidden from casting.

Cast the model like this:
```php
var_dump($model->toArray()); // To array
var_dump($model->__toArray()); // To array

echo (string)$model; // To json encoded string
```

## Guidelines

PSR-2 coding standards.

## Copyright and License

MIT License - (C) 2018 [10 Quality](https://www.10quality.com/).