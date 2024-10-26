<?php

namespace Onepix\BusrouteApiClient\Model\Station;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class GetListOfDepartureStationsResponseModel extends AbstractResultModel
{
    public const RETURN_MODEL = StationModel::class;

    /**
     * @return StationModel[]|null
     */
    public function getMultipleReturns(): ?array
    {
        return parent::getMultipleReturns();
    }
}
