<?php

namespace PatrykSawicki\SpriiTests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        /*Add config from /src/config*/
        $this->app['config']->set('sprii', require __DIR__ . '/../src/config/sprii.php');
    }

    protected static function productData(): array
    {
        return [
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
    }

    protected static function orderData(): array
    {
        return [
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
    }
}