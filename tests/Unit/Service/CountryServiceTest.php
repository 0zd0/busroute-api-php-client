<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Country\CountryModel;
use Onepix\BusrouteApiClient\Model\Country\GetListOfCountriesParametersModel;
use Onepix\BusrouteApiClient\Model\Country\GetListOfCountriesResponseModel;

class CountryServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetListOfCountries(): void
    {
        $this->setMockJsonModel(GetListOfCountriesResponseModel::getClassName(), true);

        $stations = $this->country->getListOfCountries(
            GetListOfCountriesParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetListOfCountriesParametersModel::getClassName())
            )
        );

        $this::assertContainsOnlyInstancesOf(CountryModel::class, $stations);
    }
}
