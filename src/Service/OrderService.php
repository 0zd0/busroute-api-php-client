<?php

namespace Onepix\BusrouteApiClient\Service;

use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\Order\GetOrderParametersModel;
use Onepix\BusrouteApiClient\Model\Order\GetOrderResponseModel;
use Onepix\BusrouteApiClient\Model\Order\OrderModel;

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
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return GetOrderResponseModel::fromArray($response)->getSingleReturn();
    }
}
