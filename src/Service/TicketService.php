<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsResponseModel;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingParametersModel;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingResponseModel;
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
     * @throws Exception
     */
    public function bookTickets(BookTicketsParametersModel $data): ?BookTicketsModel
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = BookTicketsResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getSingleReturn();
    }

    /**
     * @param RefundTicketsParametersModel $data
     *
     * @return RefundTicketsModel|null
     * @throws GuzzleException
     */
    public function refundTickets(RefundTicketsParametersModel $data): ?RefundTicketsModel
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = RefundTicketsResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getSingleReturn();
    }

    /**
     * @param CancelBookingParametersModel $data
     *
     * @return bool
     * @throws GuzzleException
     */
    public function cancelBooking(CancelBookingParametersModel $data): bool
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );

        $cancel = CancelBookingResponseModel::fromArray($response);

        $this->setLastResult($cancel);

        return $cancel->getError() === 0;
    }
}
