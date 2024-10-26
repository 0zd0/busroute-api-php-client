<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Order\GetOrderParametersModel;
use Onepix\BusrouteApiClient\Model\Order\GetOrderResponseModel;
use Onepix\BusrouteApiClient\Model\Order\OrderModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsResponseModel;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingResponseModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsResponseModel;

class TicketServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testBookTickets()
    {
        $this->setMockJsonModel(BookTicketsResponseModel::getClassName(), true);

        $tickets = $this->ticket->bookTickets(
            BookTicketsParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(BookTicketsParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(BookTicketsModel::class, $tickets);
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testRefundTickets()
    {
        $this->setMockJsonModel(RefundTicketsResponseModel::getClassName(), true);

        $tickets = $this->ticket->refundTickets(
            RefundTicketsParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(RefundTicketsParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(RefundTicketsModel::class, $tickets);
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testCancelBooking()
    {
        $this->setMockJsonModel(CancelBookingResponseModel::getClassName(), true);

        $isBooking = $this->ticket->cancelBooking(
            CancelBookingParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(CancelBookingParametersModel::getClassName())
            )
        );

        $this::assertTrue($isBooking);
    }
}
