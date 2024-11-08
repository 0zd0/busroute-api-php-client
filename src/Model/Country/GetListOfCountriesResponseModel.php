<?php

namespace Onepix\BusrouteApiClient\Model\Country;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class GetListOfCountriesResponseModel extends AbstractResultModel
{
    public const RETURN_MODEL = CountryModel::class;

    /**
     * @return CountryModel[]|null
     */
    public function getMultipleReturns(): ?array
    {
        return parent::getMultipleReturns();
    }
}
