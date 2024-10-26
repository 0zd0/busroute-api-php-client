<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetRouteSeatsParametersModel extends AbstractGetRouteSeatsParameters
{
    public function __construct()
    {
        $this->setAction(ActionEnum::GET_ROUTE_SEATS);
    }
}
