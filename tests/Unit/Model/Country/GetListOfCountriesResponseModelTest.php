<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Country;

use Exception;
use Onepix\BusrouteApiClient\Model\Country\CountryModel;
use Onepix\BusrouteApiClient\Model\Country\GetListOfCountriesResponseModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfCountriesResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetListOfCountriesResponseModel::getClassName());
        $model = GetListOfCountriesResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(GetListOfCountriesResponseModel::getClassName());
        $model = GetListOfCountriesResponseModel::fromArray($json);

        $this::assertContainsOnlyInstancesOf(CountryModel::class, $model->getMultipleReturns());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
