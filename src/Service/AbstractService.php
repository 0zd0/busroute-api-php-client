<?php

namespace Onepix\BusrouteApiClient\Service;

use Onepix\BusrouteApiClient\Constants;
use Onepix\BusrouteApiClient\Enum\RouteEnum;
use Onepix\BusrouteApiClient\HttpClient;

abstract class AbstractService
{
    protected HttpClient $client;

    public function __construct(
        HttpClient $client
    ) {
        $this->client = $client;
    }

    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient
    {
        return $this->client;
    }

    public static function buildRoute(
        RouteEnum $route,
        string $version = Constants::VERSION_API
    ): string {
        return '/v' . $version . '/' . $route->value;
    }
}
