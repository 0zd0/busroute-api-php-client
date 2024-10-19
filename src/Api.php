<?php

namespace Onepix\BusrouteApiClient;

use GuzzleHttp\Client;
use Onepix\BusrouteApiClient\Service\OrderService;
use Onepix\BusrouteApiClient\Service\RouteService;
use Onepix\BusrouteApiClient\Service\StationService;

class Api
{
    protected HttpClient $client;
    protected string $apiKey;
    private ?RouteService $routeService = null;
    private ?StationService $stationService = null;
    private ?OrderService $orderService = null;

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

    /**
     * @return RouteService
     */
    public function route(): RouteService
    {
        if (is_null($this->routeService)) {
            $this->routeService = new RouteService($this->getClient());
        }

        return $this->routeService;
    }

    /**
     * @return StationService
     */
    public function station(): StationService
    {
        if (is_null($this->routeService)) {
            $this->stationService = new StationService($this->getClient());
        }

        return $this->stationService;
    }

    /**
     * @return OrderService
     */
    public function order(): OrderService
    {
        if (is_null($this->routeService)) {
            $this->orderService = new OrderService($this->getClient());
        }

        return $this->orderService;
    }
}
