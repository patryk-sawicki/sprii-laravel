<?php

namespace PatrykSawicki\SpriiApi\app\Classes;

use GuzzleHttp\Client;

class Api
{
    protected string $apiKey;
    protected string $url;

    public function __construct()
    {
        $this->apiKey = config('sprii.api_key');
        $this->url = config('sprii.api_url');
    }

    /*
     * Send data to API.
     * @param string $route
     * @param array $data
     * @return array
     * */
    protected function postData(string $endpoint, array $data = []): object
    {
        /*Send data to url*/
        $client = new Client();

        $response = $client->request('POST', $this->url . $endpoint, [
            'headers' => $this->requestHeaders(),
            'body' => json_encode($data),
        ]);

        if ($response->getStatusCode() != 200) {
            abort(400, (string)$response->getBody());
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get data from API.
     *
     */
    protected function getData(string $endpoint, array $data = []): object
    {
        $client = new Client();

        $response = $client->request('GET', $this->url . $endpoint, [
            'headers' => $this->requestHeaders(),
            'body' => json_encode($data),
        ]);

        if ($response->getStatusCode() != 200) {
            abort(400, (string)$response->getBody());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * Get request headers.
     *
     * @return array
     */
    protected function requestHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ];
    }
}