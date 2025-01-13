<?php

namespace PatrykSawicki\SpriiApi\app\Classes;

class Orders extends Api
{
    /**
     * Processes order in Sprii.
     * @param array $data
     * @return bool
     */
    public function send(array $data): bool
    {
        $response = $this->postData('/processOrders', $data);

        if (empty($response)) {
            abort(500, 'Error while sending orders to Sprii');
        }

        return true;
    }

    /**
     * Gets order from Sprii.
     * @param string $orderId
     * @return object
     */
    public function getOrder(string $orderId): object
    {
        $response = $this->getData('/orders/' . $orderId);

        if (empty($response)) {
            abort(500, 'Error while getting order from Sprii');
        }

        return $response;
    }
}