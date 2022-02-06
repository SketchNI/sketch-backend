<?php

namespace App\Services;

use GuzzleHttp\Client;

class GraphQL {
    /**
     * GuzzleHttp Client
     * @var Client
     */
    private Client $client;

    /**
     * Endpoint URL
     *
     * @var string
     */
    private string $endpoint;

    /**
     * Service Authentication Token
     *
     * @var string
     */
    private string $service_token;

    /**
     * @param string $endpoint
     * @param string $service_token
     */
    public function __construct(string $endpoint, string $service_token)
    {
        $this->client = new Client();
        $this->endpoint = $endpoint;
        $this->service_token = $service_token;
    }

    /**
     * Perform the GraphQL query.
     *
     * @param string $query
     * @return string
     */
    public function query(string $query): string
    {
        $response = $this->client->post($this->endpoint, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->service_token),
                'Content-Type' => 'application/json',
            ],
            'json' => ['query' => $query]
        ]);

        return $response->getBody()->getContents();
    }
}
