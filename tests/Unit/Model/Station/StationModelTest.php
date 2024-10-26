<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Station;

use Exception;
use Onepix\BusrouteApiClient\Model\Station\StationModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class StationModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(StationModel::getClassName());
        $model = StationModel::fromString($json);
        $this::assertSame("АС Новоясеневская", $model->getName());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(StationModel::getClassName());
        $model = StationModel::fromString($json);
        $this::assertSame("АС Новоясеневская", $model->getName());
    }
}
