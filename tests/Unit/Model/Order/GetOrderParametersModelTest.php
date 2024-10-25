<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Order;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Order\GetOrderParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetOrderParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetOrderParametersModel::getClassName());
        $model = GetOrderParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_ORDER, $model->getAction());
        $this::assertSame(412498, $model->getTassOrderId());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetOrderParametersModel::getClassName());
        $model = GetOrderParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_ORDER, $model->getAction());
        $this::assertSame(412498, $model->getTassOrderId());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
