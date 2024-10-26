<?php

namespace Integration\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Station\GetListOfDepartureStationsParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\JsonDriverUnicode;
use Spatie\Snapshots\MatchesSnapshots;

class StationServiceTest extends TestCase
{
    use MatchesSnapshots;

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetOrder()
    {
        $response = $this->api->station()->getListOfDepartureStations(
            (new GetListOfDepartureStationsParametersModel())
        );

        $this->assertMatchesSnapshot(
            array_map(fn($item) => $item->getName(), $response),
            new JsonDriverUnicode()
        );
    }
}
