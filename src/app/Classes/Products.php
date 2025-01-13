<?php

namespace PatrykSawicki\SpriiApi\app\Classes;

class Products extends Api
{
    /**
     * Processes products in Sprii.
     * @param array $data
     * @return bool
     */
    public function send(array $data): bool
    {
        $response = $this->postData('/products', $data);

        if (empty($response)) {
            abort(500, 'Error while sending products to Sprii');
        }

        return true;
    }
}