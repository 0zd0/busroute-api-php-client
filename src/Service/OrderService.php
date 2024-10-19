<?php

namespace Onepix\BusrouteApiClient\Service;

use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\RouteEnum;
use Onepix\BusrouteApiClient\Model\Order\GetOrderParametersModel;
use Onepix\BusrouteApiClient\Model\Order\GetOrderResponseModel;
use Onepix\BusrouteApiClient\Model\Order\OrderModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\StationModel;

class OrderService extends AbstractService
{
    /**
     * @param GetOrderParametersModel $data
     *
     * @return OrderModel|null
     * @throws GuzzleException
     */
    public function getOrder(GetOrderParametersModel $data): ?OrderModel
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetOrderResponseModel::fromArray($response)->getSingleReturn();
    }
}
