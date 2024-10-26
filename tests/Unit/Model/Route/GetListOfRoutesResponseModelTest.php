<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use Exception;
use Onepix\BusrouteApiClient\Model\Route\GetListOfRoutesResponseModel;
use Onepix\BusrouteApiClient\Model\Route\RouteModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfRoutesResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetListOfRoutesResponseModel::getClassName());
        $model = GetListOfRoutesResponseModel::fromArray($json);

        $this::assertNull($model->getMultipleReturns());
        $this::assertArraysAreEqual($json, $model->toArray());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetListOfRoutesResponseModel::getClassName());
        $model = GetListOfRoutesResponseModel::fromArray($json);

        $this::assertContainsOnlyInstancesOf(RouteModel::class, $model->getMultipleReturns());
        $this::assertArraysAreEqual($json, $model->toArray());
    }
}
