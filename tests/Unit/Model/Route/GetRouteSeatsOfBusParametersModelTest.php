<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsOfBusParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetRouteSeatsOfBusParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetRouteSeatsOfBusParametersModel::getClassName());
        $model = GetRouteSeatsOfBusParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_ROUTE_SEATS_OF_BUS, $model->getAction());
        $this::assertSame('Москва АС Новоясеневская', $model->getDepartureStation());
        $this::assertEquals(new DateTime('21.11.2023'), $model->getDepartureDate());
        $this::assertEquals('08:15', $model->getDepartureTime());
        $this::assertSame('Рославль', $model->getArrivalStation());
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
        $json  = $this::getStubJsonModelWithAllFields(GetRouteSeatsOfBusParametersModel::getClassName());
        $model = GetRouteSeatsOfBusParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_ROUTE_SEATS_OF_BUS, $model->getAction());
        $this::assertSame('Москва АС Новоясеневская', $model->getDepartureStation());
        $this::assertEquals(new DateTime('21.11.2023'), $model->getDepartureDate());
        $this::assertEquals('08:15', $model->getDepartureTime());
        $this::assertSame('Рославль', $model->getArrivalStation());
        $this::assertSame('Рославль', $model->getRouteEndStation());
        $this::assertSame(1, $model->getNumberOfSeats());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
