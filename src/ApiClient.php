<?php

namespace Onepix\BusrouteApiClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiClient
{
    public const POST_REQUEST            = 'POST';
    public const PUT_REQUEST             = 'PUT';
    public const GET_REQUEST             = 'GET';
    public const PATCH_REQUEST           = 'PATCH';
    public const DELETE_REQUEST          = 'DELETE';
    public const APPLICATION_JSON_HEADER = 'application/json';

    private int $maxRetries;
    private int $timeout;

    private string $apiKey;
    private GuzzleClient $client;

    public function __construct(
        string $apiKey,
        int $maxRetries = 5,
        int $timeout = 20
    ) {
        $this->apiKey     = $apiKey;
        $this->maxRetries = $maxRetries;
        $this->timeout    = $timeout;
        $this->client     = $this->createClient();
    }

    private function createClient(): GuzzleClient
    {
        $handlerStack = HandlerStack::create();

        $handlerStack->push(
            Middleware::retry(
                $this->retryDecider($this->getMaxRetries())
            )
        );

        return new GuzzleClient([
            'base_uri' => Constants::PROTOCOL . Constants::BASE_URL_API,
            'timeout'  => $this->timeout,
            'handler'  => $handlerStack,
            'headers'  => self::getDefaultHeaders($this->apiKey)
        ]);
    }

    /**
     * @param GuzzleClient $client
     *
     * @return self
     */
    public function setClient(GuzzleClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    private static function getDefaultHeaders(
        string $apiKey
    ): array {
        return [
            'Authorization' => $apiKey
        ];
    }

    /**
     * @throws GuzzleException
     */
    public function get(
        string $route,
        array $queryParams = [],
        array $headers = []
    ): array {
        return $this->sendRequest(self::GET_REQUEST, $route, $queryParams, [], $headers);
    }

    /**
     * @throws GuzzleException
     */
    public function post(
        string $route,
        array $body = [],
        array $queryParams = [],
        array $headers = []
    ): array {
        return $this->sendRequest(self::POST_REQUEST, $route, $queryParams, $body, $headers);
    }

    /**
     * @throws GuzzleException
     */
    public function sendRequest(
        string $method,
        string $route,
        array $queryParams = [],
        array $body = [],
        array $headers = []
    ): array {
        $headers = array_merge($headers, self::getDefaultHeaders($this->apiKey));

        $options = [
            'query'   => $queryParams,
            'headers' => $headers
        ];

        if ($method !== self::GET_REQUEST) {
            $options['json'] = $body;
        }

        $response = $this->client->request($method, $route, $options);

        return json_decode((string)$response->getBody(), true);
    }

    private function retryDecider(int $maxRetries): callable
    {
        return function (
            int $retries,
            RequestInterface $request,
            ResponseInterface $response = null,
            RequestException $exception = null
        ) use ($maxRetries) {
            if ($retries >= $maxRetries) {
                return false;
            }

            return $response && $response->getStatusCode() >= 500 || $exception instanceof RequestException;
        };
    }

    /**
     * @return int
     */
    public function getMaxRetries(): int
    {
        return $this->maxRetries;
    }
}
