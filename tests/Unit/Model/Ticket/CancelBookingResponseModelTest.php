<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingResponseModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class CancelBookingResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(CancelBookingResponseModel::getClassName());
        $model = CancelBookingResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(CancelBookingResponseModel::getClassName());
        $model = CancelBookingResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }
}
