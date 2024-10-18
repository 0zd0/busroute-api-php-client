<?php

namespace Onepix\BusrouteApiClient;

use GuzzleHttp\Client;
use Onepix\BusrouteApiClient\Service\RouteService;

class Api
{
    protected HttpClient $client;
    protected string $apiKey;
    private ?RouteService $routeService = null;

    public function __construct(
        string $apiKey
    ) {
        $this->apiKey = $apiKey;
    }

    /**
     * @param RouteService|null $routeService
     *
     * @return self
     */
    public function setRouteService(?RouteService $routeService): self
    {
        $this->routeService = $routeService;

        return $this;
    }

    public function getClient(): HttpClient
    {
        return new HttpClient(
            $this->apiKey,
            new Client([
                'base_uri' => Constants::PROTOCOL . Constants::BASE_URL_API,
                'timeout' => 20
            ])
        );
    }

    public function route(): RouteService
    {
        if (is_null($this->routeService)) {
            $this->routeService = new RouteService($this->getClient());
        }

        return $this->routeService;
    }
}
