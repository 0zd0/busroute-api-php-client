<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use Exception;
use Onepix\BusrouteApiClient\Model\Route\RouteTicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class RouteTicketModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RouteTicketModel::getClassName());
        $model = RouteTicketModel::fromArray($json);
        $this::assertNull($model->getTariff());
        $this::assertNull($model->getCommission());
        $this::assertNull($model->getServiceCharge());
        $this::assertNull($model->getAgentCharge());
        $this::assertNull($model->getAmount());
        $this::assertNull($model->getInsurance());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RouteTicketModel::getClassName());
        $model = RouteTicketModel::fromArray($json);
        $this::assertSame(250, $model->getTariff());
        $this::assertSame(25, $model->getCommission());
        $this::assertSame(0, $model->getServiceCharge());
        $this::assertSame(19.25, $model->getAgentCharge());
        $this::assertSame(294.25, $model->getAmount());
        $this::assertSame(70, $model->getInsurance());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
