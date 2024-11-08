<?php

namespace Onepix\BusrouteApiClient;

use Onepix\BusrouteApiClient\Service\DocumentService;
use Onepix\BusrouteApiClient\Service\OrderService;
use Onepix\BusrouteApiClient\Service\RouteService;
use Onepix\BusrouteApiClient\Service\StationService;
use Onepix\BusrouteApiClient\Service\TicketService;

class Api
{
    protected ApiClient $client;
    protected string $apiKey;
    private ?RouteService $routeService = null;
    private ?StationService $stationService = null;
    private ?OrderService $orderService = null;
    private ?TicketService $ticketService = null;
    private ?DocumentService $documentService = null;

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

    /**
     * @param OrderService|null $orderService
     *
     * @return self
     */
    public function setOrderService(?OrderService $orderService): self
    {
        $this->orderService = $orderService;

        return $this;
    }

    /**
     * @param StationService|null $stationService
     *
     * @return self
     */
    public function setStationService(?StationService $stationService): self
    {
        $this->stationService = $stationService;

        return $this;
    }

    /**
     * @param TicketService|null $ticketService
     *
     * @return self
     */
    public function setTicketService(?TicketService $ticketService): self
    {
        $this->ticketService = $ticketService;

        return $this;
    }

    public function getApiClient(): ApiClient
    {
        return new ApiClient(
            $this->apiKey
        );
    }

    /**
     * @return RouteService
     */
    public function route(): RouteService
    {
        if (is_null($this->routeService)) {
            $this->routeService = new RouteService($this->getApiClient());
        }

        return $this->routeService;
    }

    /**
     * @return StationService
     */
    public function station(): StationService
    {
        if (is_null($this->stationService)) {
            $this->stationService = new StationService($this->getApiClient());
        }

        return $this->stationService;
    }

    /**
     * @return OrderService
     */
    public function order(): OrderService
    {
        if (is_null($this->orderService)) {
            $this->orderService = new OrderService($this->getApiClient());
        }

        return $this->orderService;
    }

    /**
     * @return TicketService
     */
    public function ticket(): TicketService
    {
        if (is_null($this->ticketService)) {
            $this->ticketService = new TicketService($this->getApiClient());
        }

        return $this->ticketService;
    }

    /**
     * @return DocumentService
     */
    public function document(): DocumentService
    {
        if (is_null($this->documentService)) {
            $this->documentService = new DocumentService($this->getApiClient());
        }

        return $this->documentService;
    }
}
