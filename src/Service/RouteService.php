<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesResponseModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsOfBusParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsOfBusResponseModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsResponseModel;
use Onepix\BusrouteApiClient\Model\Route\RouteModel;
use Onepix\BusrouteApiClient\Model\Route\RouteSeatsModel;

class RouteService extends AbstractService
{
    /**
     * @param GetListOfRoutesParametersModel $data
     *
     * @return RouteModel[]|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function getListOfRoutes(GetListOfRoutesParametersModel $data): ?array
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetListOfRoutesResponseModel::fromArray($response)->getMultipleReturns();
    }

    /**
     * @param GetRouteSeatsParametersModel $data
     *
     * @return RouteSeatsModel|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function getRouteSeats(GetRouteSeatsParametersModel $data): ?RouteSeatsModel
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetRouteSeatsResponseModel::fromArray($response)->getSingleReturn();
    }

    /**
     * @param GetRouteSeatsOfBusParametersModel $data
     *
     * @return RouteSeatsModel|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function getRouteSeatsOfBus(GetRouteSeatsOfBusParametersModel $data): ?RouteSeatsModel
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetRouteSeatsOfBusResponseModel::fromArray($response)->getSingleReturn();
    }
}
