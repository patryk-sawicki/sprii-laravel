<?php

namespace PatrykSawicki\SpriiTests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PatrykSawicki\SpriiApi\app\Classes\Sprii;
use PatrykSawicki\SpriiTests\TestCase;

class ProductsTest extends TestCase
{
//    use DatabaseTransactions;

    public function testSend()
    {
        $products = ['products' => [self::productData()]];
        $result = Sprii::products()->send($products);

        $this->assertTrue($result, 'Error while sending products');
    }
}
