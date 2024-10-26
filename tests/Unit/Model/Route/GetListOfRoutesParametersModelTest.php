<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Enum\FullDataEnum;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfRoutesParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetListOfRoutesParametersModel::getClassName());
        $model = GetListOfRoutesParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_ROUTES, $model->getAction());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());
        $this::assertEquals(new DateTime('30.12.2017'), $model->getDepartureDate());
        $this::assertSame('Обнинск', $model->getArrivalStation());
        $this::assertSame(1, $model->getNumberOfSeats());
        $this::assertNull($model->getFullData());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetListOfRoutesParametersModel::getClassName());
        $model = GetListOfRoutesParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_ROUTES, $model->getAction());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());
        $this::assertEquals(new DateTime('30.12.2017'), $model->getDepartureDate());
        $this::assertSame('Обнинск', $model->getArrivalStation());
        $this::assertSame(1, $model->getNumberOfSeats());
        $this::assertSame(FullDataEnum::FULL, $model->getFullData());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
