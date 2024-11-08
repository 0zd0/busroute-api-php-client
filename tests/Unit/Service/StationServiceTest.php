<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\StationModel;

class StationServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetListOfDepartureStations()
    {
        $this->setMockJsonModel(GetListOfDepartureStationsResponseModel::getClassName(), true);

        $stations = $this->station->getListOfDepartureStations(
            GetListOfDepartureStationsParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetListOfDepartureStationsParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(GetListOfDepartureStationsResponseModel::class, $this->station->getLastResult());

        $this::assertContainsOnlyInstancesOf(StationModel::class, $stations);
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetListOfArrivalStations()
    {
        $this->setMockJsonModel(GetListOfArrivalStationsResponseModel::getClassName(), true);

        $stations = $this->station->getListOfArrivalStations(
            GetListOfArrivalStationsParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetListOfArrivalStationsParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(GetListOfArrivalStationsResponseModel::class, $this->station->getLastResult());

        $this::assertContainsOnlyInstancesOf(StationModel::class, $stations);
    }
}
