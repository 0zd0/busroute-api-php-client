<?php

namespace Onepix\BusrouteApiClient\Service;

use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\RouteEnum;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfArrivalStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsParametersModel;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\StationModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsResponseModel;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\RefundTicketsResponseModel;

class TicketService extends AbstractService
{
    /**
     * @param BookTicketsParametersModel $data
     *
     * @return BookTicketsModel|null
     * @throws GuzzleException
     */
    public function bookTickets(BookTicketsParametersModel $data): ?array
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return BookTicketsResponseModel::fromArray($response)->getSingleReturn();
    }

    /**
     * @param RefundTicketsParametersModel $data
     *
     * @return RefundTicketsModel|null
     * @throws GuzzleException
     */
    public function refundTickets(RefundTicketsParametersModel $data): ?array
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return RefundTicketsResponseModel::fromArray($response)->getSingleReturn();
    }

    /**
     * @param CancelBookingParametersModel $data
     *
     * @return bool
     * @throws GuzzleException
     */
    public function cancelBooking(CancelBookingParametersModel $data): bool
    {
        $url = $this::buildRoute(RouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        return true;
    }
}
