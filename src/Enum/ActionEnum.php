<?php

namespace Onepix\BusrouteApiClient\Enum;

enum ActionEnum: string
{
    case GET_LIST_OF_ROUTES = 'getListOfRoutes';
    case GET_LIST_OF_DEPARTURE_STATIONS = 'getListOfDepartureStations';
    case GET_LIST_OF_ARRIVAL_STATIONS = 'getListOfArrivalStations';
    case BOOK_TICKETS = 'bookTickets';
    case CANCEL_BOOKING = 'cancelBooking';
    case CONFIRM_PAYMENT = 'confirmPayment';
    case REFUND_TICKET = 'refundTickets';
    case GET_ORDER = 'getOrder';
}
