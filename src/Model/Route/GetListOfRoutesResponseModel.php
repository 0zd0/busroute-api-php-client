<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class GetListOfRoutesResponseModel extends AbstractResultModel
{
    public const RETURN_MODEL = RouteModel::class;

    /**
     * @return RouteModel[]|null
     */
    public function getMultipleReturns(): ?array
    {
        return parent::getMultipleReturns();
    }
}
