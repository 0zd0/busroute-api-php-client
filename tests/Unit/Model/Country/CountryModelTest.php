<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Country;

use Exception;
use Onepix\BusrouteApiClient\Model\Country\CountryModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class CountryModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CountryModel::getClassName());
        $model = CountryModel::fromString($json);
        $this::assertSame("АФГАНИСТАН", $model->getName());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CountryModel::getClassName());
        $model = CountryModel::fromString($json);
        $this::assertSame("АФГАНИСТАН", $model->getName());
    }
}
