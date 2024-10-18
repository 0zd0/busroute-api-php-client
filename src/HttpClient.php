<?php

namespace Onepix\BusrouteApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Exception\MaxRetryAttemptsException;

class HttpClient
{
    public const POST_REQUEST            = 'POST';
    public const PUT_REQUEST             = 'PUT';
    public const GET_REQUEST             = 'GET';
    public const PATCH_REQUEST           = 'PATCH';
    public const DELETE_REQUEST          = 'DELETE';
    public const APPLICATION_JSON_HEADER = 'application/json';

    private int $retryCount    = 0;
    private int $maxRetryCount = 5;

    private string $apiKey;
    private string $baseUrl;

    private Client $client;

    public function __construct(
        string $apiKey,
        Client $client,
        string $baseUrl = Constants::BASE_URL_API
    ) {
        $this->apiKey         = $apiKey;
        $this->client         = $client;
        $this->baseUrl        = $baseUrl;
    }

    private static function getDefaultHeaders(
        string $apiKey
    ): array {
        return [
            'Authorization' => $apiKey
        ];
    }

    /**
     * @param string $baseUrl
     *
     * @return self
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function get(
        string $route,
        array $queryParams = [],
        array $headers = [],
        int $delayBetweenRetry = 1
    ): array {
        return $this->sendRequest(self::GET_REQUEST, $route, $queryParams, [], $headers, $delayBetweenRetry);
    }

    /**
     * @throws GuzzleException
     */
    public function post(
        string $route,
        array $body = [],
        array $queryParams = [],
        array $headers = [],
        int $delayBetweenRetry = 1
    ): array {
        return $this->sendRequest(self::POST_REQUEST, $route, $queryParams, $body, $headers, $delayBetweenRetry);
    }

    /**
     * @throws GuzzleException
     */
    public function sendRequest(
        string $method,
        string $route,
        array $queryParams = [],
        array $body = [],
        array $headers = [],
        int $delayBetweenRetry = 1
    ): array {
        $headers = array_merge($headers, self::getDefaultHeaders($this->apiKey));

        $options = [
            'query' => $queryParams,
            'headers' => $headers
        ];

        if ($method !== self::GET_REQUEST) {
            $options['json'] = $body;
        }

        while ($this->getRetryCount() < $this->getMaxRetryCount()) {
            try {
                $response = $this->client->request($method, $route, $options);

                $this->setRetryCount(0);

                return json_decode((string) $response->getBody(), true);
            } catch (GuzzleException $e) {
                if ($e->getCode() >= 500 && $this->getRetryCount() < $this->getMaxRetryCount()) {
                    $this->setRetryCount($this->getRetryCount() + 1);
                    $backoffDelay = $delayBetweenRetry * (2 ** ($this->getRetryCount() - 1));
                    sleep($backoffDelay);

                    continue;
                }

                throw $e;
            }
        }

        throw new MaxRetryAttemptsException("Max retry attempts reached");
    }

    /**
     * @param int $retryCount
     */
    public function setRetryCount(int $retryCount): void
    {
        $this->retryCount = $retryCount;
    }

    /**
     * @return int
     */
    public function getRetryCount(): int
    {
        return $this->retryCount;
    }

    /**
     * @return int
     */
    public function getMaxRetryCount(): int
    {
        return $this->maxRetryCount;
    }
}
