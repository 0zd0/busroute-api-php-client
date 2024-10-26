<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Station;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfDepartureStationsParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetListOfDepartureStationsParametersModel::getClassName());
        $model = GetListOfDepartureStationsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_DEPARTURE_STATIONS, $model->getAction());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetListOfDepartureStationsParametersModel::getClassName());
        $model = GetListOfDepartureStationsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_DEPARTURE_STATIONS, $model->getAction());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
