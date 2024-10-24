<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class GetRouteSeatsOfBusResponseModel extends AbstractResultModel
{
    public const ARRAY_MODELS = false;
    public const RETURN_MODEL = RouteSeatsModel::class;

    /**
     * @return RouteSeatsModel|null
     */
    public function getSingleReturn(): ?RouteSeatsModel
    {
        $return = parent::getSingleReturn();

        return $return instanceof RouteSeatsModel ? $return : null;
    }
}
