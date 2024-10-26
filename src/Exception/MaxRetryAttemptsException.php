<?php

namespace Onepix\BusrouteApiClient\Exception;

use GuzzleHttp\Exception\GuzzleException;

final class MaxRetryAttemptsException extends \RuntimeException implements GuzzleException
{
}
