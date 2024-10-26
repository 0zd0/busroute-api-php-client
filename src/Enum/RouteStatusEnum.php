<?php

namespace Onepix\BusrouteApiClient\Enum;

enum RouteStatusEnum: int
{
    case SALE_ALLOWED = 0;     // Sale is allowed
    case SALE_STOPPED = 1;     // Sale is stopped
    case CANCELLED = 2;        // Route is cancelled
    case DISRUPTED = 3;        // Route is disrupted
    case DEPARTED = 4;         // Route has departed
}
