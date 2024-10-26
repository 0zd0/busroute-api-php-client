<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Order;

use Exception;
use Onepix\BusrouteApiClient\Model\Order\GetOrderResponseModel;
use Onepix\BusrouteApiClient\Model\Order\OrderModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetOrderResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetOrderResponseModel::getClassName());
        $model = GetOrderResponseModel::fromArray($json);
        $this::assertNull($model->getSingleReturn());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(GetOrderResponseModel::getClassName());
        $model = GetOrderResponseModel::fromArray($json);
        $this::assertInstanceOf(OrderModel::class, $model->getSingleReturn());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
