<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
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
     * @throws Exception
     */
    public function getOrder(GetOrderParametersModel $data): ?OrderModel
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = GetOrderResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getSingleReturn();
    }
}
