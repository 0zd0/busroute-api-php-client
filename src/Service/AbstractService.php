<?php

namespace Onepix\BusrouteApiClient\Service;

use Onepix\BusrouteApiClient\Constants;
use Onepix\BusrouteApiClient\Enum\RouteEnum;
use Onepix\BusrouteApiClient\ApiClient;

abstract class AbstractService
{
    protected ApiClient $client;

    public function __construct(
        ApiClient $client
    ) {
        $this->client = $client;
    }

    /**
     * @return ApiClient
     */
    public function getClient(): ApiClient
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
