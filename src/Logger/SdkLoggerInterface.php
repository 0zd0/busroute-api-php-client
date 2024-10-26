<?php

namespace Onepix\BusrouteApiClient\Logger;

interface SdkLoggerInterface
{
    /**
     * @param string|array|int|float $message
     * @param array $context
     *
     * @return mixed
     */
    public function debug($message, array $context = array());

    /**
     * @param string|array|int|float $message
     * @param array $context
     *
     * @return mixed
     */
    public function info($message, array $context = array());

    /**
     * @param string|array|int|float $message
     * @param array $context
     *
     * @return mixed
     */
    public function error($message, array $context = array());
}
