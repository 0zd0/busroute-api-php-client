<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\TicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class BookTicketsParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(BookTicketsParametersModel::getClassName());
        $model = BookTicketsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::BOOK_TICKETS, $model->getAction());
        $this::assertSame('4791563', $model->getTransaction());
        $this::assertSame('231f324b6ed71f83ff51913d1301ee13', $model->getId());
        $this::assertSame(2, $model->getNumberOfSeats());
        $this::assertSame('Москва АС Новоясеневская', $model->getDepartureStation());
        $this::assertContainsOnlyInstancesOf(TicketModel::class, $model->getTickets());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(BookTicketsParametersModel::getClassName());
        $model = BookTicketsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::BOOK_TICKETS, $model->getAction());
        $this::assertSame('4791563', $model->getTransaction());
        $this::assertSame('231f324b6ed71f83ff51913d1301ee13', $model->getId());
        $this::assertSame(2, $model->getNumberOfSeats());
        $this::assertSame('Москва АС Новоясеневская', $model->getDepartureStation());
        $this::assertContainsOnlyInstancesOf(TicketModel::class, $model->getTickets());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
