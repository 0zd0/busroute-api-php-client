<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsResponseModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class RefundTicketsResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RefundTicketsResponseModel::getClassName());
        $model = RefundTicketsResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RefundTicketsResponseModel::getClassName());
        $model = RefundTicketsResponseModel::fromArray($json);

        $this::assertInstanceOf(RefundTicketsModel::class, $model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }
}