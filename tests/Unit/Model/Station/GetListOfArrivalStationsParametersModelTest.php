<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Station;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfArrivalStationsParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetListOfArrivalStationsParametersModel::getClassName());
        $model = GetListOfArrivalStationsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_ARRIVAL_STATIONS, $model->getAction());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(GetListOfArrivalStationsParametersModel::getClassName());
        $model = GetListOfArrivalStationsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_ARRIVAL_STATIONS, $model->getAction());
        $this::assertSame('АС Новоясеневская', $model->getDepartureStation());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
