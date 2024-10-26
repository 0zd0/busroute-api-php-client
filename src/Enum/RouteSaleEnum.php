<?php

namespace Onepix\BusrouteApiClient\Enum;

enum RouteSaleEnum: int
{
    case ALLOWED     = 1;     // 1 - Sale is allowed
    case NOT_ALLOWED = 0; // 0 - Sale is not allowed
}
