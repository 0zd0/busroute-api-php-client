<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
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
     * @throws Exception
     */
    public function getListOfDepartureStations(GetListOfDepartureStationsParametersModel $data): ?array
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = GetListOfDepartureStationsResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getMultipleReturns();
    }

    /**
     * @param GetListOfArrivalStationsParametersModel $data
     *
     * @return StationModel[]|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function getListOfArrivalStations(GetListOfArrivalStationsParametersModel $data): ?array
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = GetListOfArrivalStationsResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getMultipleReturns();
    }
}
