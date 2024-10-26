<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class RefundTicketsModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RefundTicketsModel::getClassName());
        $model = RefundTicketsModel::fromArray($json);
        $this::assertNull($model->getTransaction());
        $this::assertNull($model->getId());
        $this::assertNull($model->getRefundAmount());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RefundTicketsModel::getClassName());
        $model = RefundTicketsModel::fromArray($json);
        $this::assertSame('4792881', $model->getTransaction());
        $this::assertSame('dbfe4e8a497f5830db3086044c386f00', $model->getId());
        $this::assertSame(118.8, $model->getRefundAmount());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
