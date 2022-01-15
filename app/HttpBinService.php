<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class HttpBinService
{
    private Client $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function ok(): string
    {
        $request = new Request('GET', 'status/200');
        $response = $this->httpClient->send($request);

        return $response->getBody()->getContents();
    }

    public function timeout(): string
    {
        $request = new Request('GET', 'status/504');
        $response = $this->httpClient->send($request);

        return $response->getBody()->getContents();
    }
}