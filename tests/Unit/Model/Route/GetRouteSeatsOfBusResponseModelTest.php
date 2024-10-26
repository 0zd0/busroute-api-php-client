<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use Exception;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsOfBusResponseModel;
use Onepix\BusrouteApiClient\Model\Route\RouteSeatsModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetRouteSeatsOfBusResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetRouteSeatsOfBusResponseModel::getClassName());
        $model = GetRouteSeatsOfBusResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetRouteSeatsOfBusResponseModel::getClassName());
        $model = GetRouteSeatsOfBusResponseModel::fromArray($json);

        $this::assertInstanceOf(RouteSeatsModel::class, $model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }
}
