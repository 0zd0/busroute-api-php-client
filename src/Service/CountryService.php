<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\Country\CountryModel;
use Onepix\BusrouteApiClient\Model\Country\GetListOfCountriesParametersModel;
use Onepix\BusrouteApiClient\Model\Country\GetListOfCountriesResponseModel;

class CountryService extends AbstractService
{
    /**
     * @param GetListOfCountriesParametersModel $data
     *
     * @return CountryModel[]|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function getListOfCountries(GetListOfCountriesParametersModel $data): ?array
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = GetListOfCountriesResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getMultipleReturns();
    }
}
