<?php

namespace Onepix\BusrouteApiClient\Service;

use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\RouteEnum;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\StationModel;

class StationService extends AbstractService
{
    /**
     * @param GetListOfDepartureStationsParametersModel $data
     *
     * @return StationModel[]|null
     * @throws GuzzleException
     */
    public function getListOfDepartureStations(GetListOfDepartureStationsParametersModel $data): ?array
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetListOfDepartureStationsResponseModel::fromArray($response)->getMultipleReturns();
    }

    /**
     * @param GetListOfArrivalStationsParametersModel $data
     *
     * @return StationModel[]|null
     * @throws GuzzleException
     */
    public function getListOfArrivalStations(GetListOfArrivalStationsParametersModel $data): ?array
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetListOfArrivalStationsResponseModel::fromArray($response)->getMultipleReturns();
    }
}
