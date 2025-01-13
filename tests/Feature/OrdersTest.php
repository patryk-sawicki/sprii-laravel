<?php

namespace PatrykSawicki\SpriiTests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PatrykSawicki\SpriiApi\app\Classes\Sprii;
use PatrykSawicki\SpriiTests\TestCase;

class OrdersTest extends TestCase
{
//    use DatabaseTransactions;

    public function testSend()
    {
        $orders = ['orders' => [self::orderData()]];
        $result = Sprii::orders()->send($orders);

        $this->assertTrue($result, 'Error while sending orders');
    }

    public function testGetOrder()
    {
        $orderId = '5934-14';
        $result = Sprii::orders()->getOrder($orderId);

        $this->assertIsObject($result, 'Error while getting order');
    }
}
