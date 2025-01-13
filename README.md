# Sprii API Client

Sprii API client for laravel.

## Requirements

* PHP 8.2 or higher with json extensions.

## Installation

The recommended way to install is through [Composer](http://getcomposer.org).

```bash
composer require patryk-sawicki/sprii-laravel
```

## Backend Usage

Add to env:

```php
SPRII_API_KEY = 'your_key'
SPRII_CACHE_DEFAULT_TTL = 86400 // optional - default 86400 seconds
```

Import class:

```php
use PatrykSawicki\SpriiApi\app\Classes\Sprii;
```

### Products

Send products to sprii.

```php
Sprii::products()->send(array $data); // return bool.
```

Request:

```php
$data = [
            'id' => '1',
            'sku' => 'string',
            'name' => 'string',
            'price' => 0,
            'description' => 'string',
            'url' => 'string',
            'type' => 'simple',
            'status' => 'enabled',
            'image' => 'string',
            'alternativeImages' => [
                'string'
            ],
            'inventory' => 0,
            'manageStock' => true,
            'configurableOptions' => [
                [
                    'id' => 0,
                    'name' => 'string',
                    'position' => 0,
                    'values' => [
                        'string'
                    ]
                ]
            ],
            'variants' => [
                [
                    'id' => '2',
                    'sku' => 'string',
                    'name' => 'string',
                    'price' => 10,
                    'description' => 'string',
                    'url' => 'string',
                    'status' => 'enabled',
                    'image' => 'string',
                    'alternativeImages' => [
                        'string'
                    ],
                    'inventory' => 2,
                    'manageStock' => true,
                    'options' => [
                        [
                            'id' => 0,
                            'value' => 'string'
                        ]
                    ]
                ]
            ],
            'customAttributes' => 'string',
            'defaultQuantityToAdd' => 0,
            'test' => 0
        ];
```

Result:

```php
true // or false
```

### Orders

#### Send

Send orders to sprii.

```php
Sprii::orders()->send(array $data); // return bool.
```

Request:

```php
$data = [
            'spriiOrderNumber' => '1',
            'orderTotal' => 1,
            'id' => '1',
            'openForCheckout' => true,
            'items' => [
                [
                    'product_id' => '2',
                    'quantity' => 1,
                    'sku' => 'string',
                    'custom_attributes' => 'string',
                    'unitPrice' => 1
                ]
            ]
        ];
```

Result:

```php
true // or false
```

#### Get order

Get order from sprii.

```php
Sprii::orders()->get(string $id); // return object.
```

Request:

```php
$id = '1';
```

Result:

```php
object(stdClass)#1 (5) {
  ["order"] => object(stdClass)#2 (5) {
    ["id"] => string(1) "1"
    ["spriiOrderNumber"] => string(1) "1"
    ["orderTotal"] => int(1)
    ["openForCheckout"] => bool(true)
    ["items"] => array(1) {
      [0] => object(stdClass)#3 (5) {
        ["product_id"] => string(1) "2"
        ["quantity"] => int(1)
        ["sku"] => string(6) "string"
        ["custom_attributes"] => string(6) "string"
        ["unitPrice"] => int(1)
      }
    }
  }
}
```

## Changelog

Changelog is available [here](CHANGELOG.md).
