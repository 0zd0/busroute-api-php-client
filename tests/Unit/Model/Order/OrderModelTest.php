<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Order;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Model\Order\OrderModel;
use Onepix\BusrouteApiClient\Model\Ticket\TicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class OrderModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(OrderModel::getClassName());
        $model = OrderModel::fromArray($json);
        $this::assertNull($model->getTransaction());
        $this::assertNull($model->getId());
        $this::assertNull($model->getAmount());
        $this::assertNull($model->getTassOrderId());
        $this::assertNull($model->getDateOfPurchase());
        $this::assertNull($model->getTickets());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OrderModel::getClassName());
        $model = OrderModel::fromArray($json);
        $this::assertSame("4791563", $model->getTransaction());
        $this::assertSame("231f324b6ed71f83ff51913d1301ee13", $model->getId());
        $this::assertSame(401.25, $model->getAmount());
        $this::assertSame("412498", $model->getTassOrderId());
        $this::assertEquals(new DateTime("31.01.2017"), $model->getDateOfPurchase());
        $this::assertContainsOnlyInstancesOf(TicketModel::class, $model->getTickets());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
