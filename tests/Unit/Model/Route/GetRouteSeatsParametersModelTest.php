<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetRouteSeatsParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetRouteSeatsParametersModel::getClassName());
        $model = GetRouteSeatsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_ROUTE_SEATS, $model->getAction());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());
        $this::assertEquals(new DateTime('10.02.2017'), $model->getDepartureDate());
        $this::assertEquals('08:30', $model->getDepartureTime());
        $this::assertSame('Обнинск', $model->getArrivalStation());
        $this::assertNull($model->getRouteEndStation());
        $this::assertSame(1, $model->getNumberOfSeats());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(GetRouteSeatsParametersModel::getClassName());
        $model = GetRouteSeatsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_ROUTE_SEATS, $model->getAction());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());
        $this::assertEquals(new DateTime('10.02.2017'), $model->getDepartureDate());
        $this::assertEquals('08:30', $model->getDepartureTime());
        $this::assertSame('Обнинск', $model->getArrivalStation());
        $this::assertSame('Обнинск', $model->getRouteEndStation());
        $this::assertSame(1, $model->getNumberOfSeats());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
