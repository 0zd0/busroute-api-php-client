<?php

namespace Onepix\BusrouteApiClient\Service;

use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\RouteEnum;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesResponseModel;
use Onepix\BusrouteApiClient\Model\Route\RouteModel;

class RouteService extends AbstractService
{
    /**
     * @param GetListOfRoutesParametersModel $data
     *
     * @return RouteModel[]|null
     * @throws GuzzleException
     */
    public function getListOfRoutes(GetListOfRoutesParametersModel $data): ?array
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetListOfRoutesResponseModel::fromArray($response)->getMultipleReturns();
    }
}
