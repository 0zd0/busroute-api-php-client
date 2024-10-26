<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Route;

use Exception;
use Onepix\BusrouteApiClient\Model\Route\RouteSeatsModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class RouteSeatsModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RouteSeatsModel::getClassName());
        $model = RouteSeatsModel::fromArray($json);
        $this::assertNull($model->getTransaction());
        $this::assertNull($model->getId());
        $this::assertNull($model->getNumberOfSeats());
        $this::assertNull($model->getAvailableSeats());
        $this::assertNull($model->getRegPD());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RouteSeatsModel::getClassName());
        $model = RouteSeatsModel::fromArray($json);
        $this::assertSame('4791053', $model->getTransaction());
        $this::assertSame('a01e973ba26f39bb4d04c124e2de5b48', $model->getId());
        $this::assertSame(2, $model->getNumberOfSeats());
        $this::assertSame(
            ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18'],
            $model->getAvailableSeats()
        );
        $this::assertSame(1, $model->getRegPD());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
