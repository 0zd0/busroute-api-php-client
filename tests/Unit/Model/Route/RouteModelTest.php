<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\RouteSaleEnum;
use Onepix\BusrouteApiClient\Enum\RouteStatusEnum;
use Onepix\BusrouteApiClient\Model\Route\RouteModel;
use Onepix\BusrouteApiClient\Model\Route\RouteTicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class RouteModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RouteModel::getClassName());
        $model = RouteModel::fromArray($json);
        $this::assertNull($model->getRouteStartStation());
        $this::assertNull($model->getRouteEndStation());
        $this::assertNull($model->getDepartureStation());
        $this::assertNull($model->getArrivalStation());
        $this::assertNull($model->getDepartureDate());
        $this::assertNull($model->getDepartureTime());
        $this::assertNull($model->getArrivalDate());
        $this::assertNull($model->getArrivalTime());
        $this::assertNull($model->getOnTheWay());
        $this::assertNull($model->getAdult());
        $this::assertNull($model->getChild());
        $this::assertNull($model->getAvailableSeats());
        $this::assertNull($model->getBusModel());
        $this::assertNull($model->getBusCarrier());
        $this::assertNull($model->getBusCapacity());
        $this::assertNull($model->getSale());
        $this::assertNull($model->getStatus());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RouteModel::getClassName());
        $model = RouteModel::fromArray($json);
        $this::assertSame('Москва', $model->getRouteStartStation());
        $this::assertSame('Новозыбков', $model->getRouteEndStation());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());
        $this::assertSame('Обнинск', $model->getArrivalStation());
        $this::assertEquals(new DateTime('10.02.2017'), $model->getDepartureDate());
        $this::assertSame('08:30', $model->getDepartureTime());
        $this::assertEquals(new DateTime('10.02.2017'), $model->getArrivalDate());
        $this::assertSame('10:10', $model->getArrivalTime());
        $this::assertSame(' 1 ч 40 мин.', $model->getOnTheWay());
        $this::assertInstanceOf(RouteTicketModel::class, $model->getAdult());
        $this::assertInstanceOf(RouteTicketModel::class, $model->getChild());
        $this::assertSame(11, $model->getAvailableSeats());
        $this::assertSame('MERCEDES 18', $model->getBusModel());
        $this::assertSame('ИП Хомякова С.А.', $model->getBusCarrier());
        $this::assertSame(18, $model->getBusCapacity());
        $this::assertSame(RouteSaleEnum::ALLOWED, $model->getSale());
        $this::assertSame(RouteStatusEnum::SALE_ALLOWED, $model->getStatus());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
