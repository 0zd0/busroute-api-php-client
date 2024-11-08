<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Order\GetOrderParametersModel;
use Onepix\BusrouteApiClient\Model\Order\GetOrderResponseModel;
use Onepix\BusrouteApiClient\Model\Order\OrderModel;

class OrderServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetOrder()
    {
        $this->setMockJsonModel(GetOrderResponseModel::getClassName(), true);

        $order = $this->order->getOrder(
            (new GetOrderParametersModel())
                ->setTassOrderId(222)
        );

        $this::assertInstanceOf(GetOrderResponseModel::class, $this->order->getLastResult());

        $this::assertInstanceOf(OrderModel::class, $order);
    }
}
