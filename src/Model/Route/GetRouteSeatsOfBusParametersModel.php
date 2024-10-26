<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use Onepix\BusrouteApiClient\Enum\ActionEnum;

class GetRouteSeatsOfBusParametersModel extends AbstractGetRouteSeatsParameters
{
    public function __construct()
    {
        $this->setAction(ActionEnum::GET_ROUTE_SEATS_OF_BUS);
    }
}
