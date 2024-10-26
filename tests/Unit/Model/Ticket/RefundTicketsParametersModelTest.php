<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class RefundTicketsParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(RefundTicketsParametersModel::getClassName());
        $model = RefundTicketsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::REFUND_TICKETS, $model->getAction());
        $this::assertSame('412492', $model->getTassOrderId());
        $this::assertSame(['1'], $model->getSeats());

        $this::assertNull($model->getOper());
        $this::assertNull($model->getMode());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(RefundTicketsParametersModel::getClassName());
        $model = RefundTicketsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::REFUND_TICKETS, $model->getAction());
        $this::assertSame('412492', $model->getTassOrderId());
        $this::assertSame(['1', '2'], $model->getSeats());
        $this::assertSame('1', $model->getOper());
        $this::assertSame('1', $model->getMode());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
