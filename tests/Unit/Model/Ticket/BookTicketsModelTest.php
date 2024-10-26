<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\TicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class BookTicketsModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(BookTicketsModel::getClassName());
        $model = BookTicketsModel::fromArray($json);
        $this::assertNull($model->getTransaction());
        $this::assertNull($model->getId());
        $this::assertNull($model->getAmount());
        $this::assertNull($model->getTickets());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(BookTicketsModel::getClassName());
        $model = BookTicketsModel::fromArray($json);
        $this::assertSame('4791563', $model->getTransaction());
        $this::assertSame('231f324b6ed71f83ff51913d1301ee13', $model->getId());
        $this::assertSame(401.25, $model->getAmount());
        $this::assertContainsOnlyInstancesOf(TicketModel::class, $model->getTickets());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
