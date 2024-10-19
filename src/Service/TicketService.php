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
}
