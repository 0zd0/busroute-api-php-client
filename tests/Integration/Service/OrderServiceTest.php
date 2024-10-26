<?php

namespace Integration\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Order\GetOrderParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\JsonDriverUnicode;
use Spatie\Snapshots\MatchesSnapshots;

class OrderServiceTest extends TestCase
{
    use MatchesSnapshots;

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetOrder()
    {
        $response = $this->api->order()->getOrder(
            (new GetOrderParametersModel())
                ->setTassOrderId(0)
        );

        $this->assertMatchesSnapshot(
            $response->toArray(),
            new JsonDriverUnicode()
        );
    }
}
