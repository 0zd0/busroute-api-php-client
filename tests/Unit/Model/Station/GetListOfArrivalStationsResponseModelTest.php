<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Station;

use Exception;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\StationModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfArrivalStationsResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetListOfArrivalStationsResponseModel::getClassName());
        $model = GetListOfArrivalStationsResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(GetListOfArrivalStationsResponseModel::getClassName());
        $model = GetListOfArrivalStationsResponseModel::fromArray($json);

        $this::assertContainsOnlyInstancesOf(StationModel::class, $model->getMultipleReturns());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
