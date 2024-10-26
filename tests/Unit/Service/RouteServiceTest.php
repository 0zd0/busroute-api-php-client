<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesResponseModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsOfBusParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsOfBusResponseModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsParametersModel;
use Onepix\BusrouteApiClient\Model\Route\GetRouteSeatsResponseModel;
use Onepix\BusrouteApiClient\Model\Route\RouteModel;
use Onepix\BusrouteApiClient\Model\Route\RouteSeatsModel;

class RouteServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetListOfRoutes()
    {
        $this->setMockJsonModel(GetListOfRoutesResponseModel::getClassName(), true);

        $routes = $this->route->getListOfRoutes(
            GetListOfRoutesParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetListOfRoutesParametersModel::getClassName())
            )
        );

        $this::assertContainsOnlyInstancesOf(RouteModel::class, $routes);
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetRouteSeats()
    {
        $this->setMockJsonModel(GetRouteSeatsResponseModel::getClassName(), true);

        $seats = $this->route->getRouteSeats(
            GetRouteSeatsParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetRouteSeatsParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(RouteSeatsModel::class, $seats);
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetRouteSeatsOfBus()
    {
        $this->setMockJsonModel(GetRouteSeatsOfBusResponseModel::getClassName(), true);

        $seats = $this->route->getRouteSeatsOfBus(
            GetRouteSeatsOfBusParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetRouteSeatsOfBusParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(RouteSeatsModel::class, $seats);
    }
}
