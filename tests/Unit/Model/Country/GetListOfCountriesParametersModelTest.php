<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Country;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Country\GetListOfCountriesParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfCountriesParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetListOfCountriesParametersModel::getClassName());
        $model = GetListOfCountriesParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_COUNTRIES, $model->getAction());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetListOfCountriesParametersModel::getClassName());
        $model = GetListOfCountriesParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_COUNTRIES, $model->getAction());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
