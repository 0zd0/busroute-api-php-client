<?php

namespace Onepix\BusrouteApiClient\Service;

use Onepix\BusrouteApiClient\ApiClient;
use Onepix\BusrouteApiClient\Constants;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\AbstractResultModel;

abstract class AbstractService
{
    protected ApiClient $client;
    protected AbstractResultModel $lastResult;

    /**
     * @return AbstractResultModel
     */
    public function getLastResult(): AbstractResultModel
    {
        return $this->lastResult;
    }

    /**
     * @param AbstractResultModel $lastResult
     *
     * @return self
     */
    public function setLastResult(AbstractResultModel $lastResult): self
    {
        $this->lastResult = $lastResult;

        return $this;
    }

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
        ApiRouteEnum $route,
        string $version = Constants::VERSION_API
    ): string {
        return '/v' . $version . '/' . $route->value;
    }
}
