<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Psr7\Response;
use Onepix\BusrouteApiClient\Service\CountryService;
use Onepix\BusrouteApiClient\Service\DocumentService;
use Onepix\BusrouteApiClient\Service\OrderService;
use Onepix\BusrouteApiClient\Service\PaymentService;
use Onepix\BusrouteApiClient\Service\RouteService;
use Onepix\BusrouteApiClient\Service\StationService;
use Onepix\BusrouteApiClient\Service\TicketService;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class AbstractServiceHelper extends TestCase
{
    use StubTrait;

    protected OrderService $order;
    protected RouteService $route;
    protected StationService $station;
    protected TicketService $ticket;
    protected DocumentService $document;
    protected CountryService $country;
    protected PaymentService $payment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->order = $this->apiMock->order();
        $this->route = $this->apiMock->route();
        $this->station = $this->apiMock->station();
        $this->ticket = $this->apiMock->ticket();
        $this->document = $this->apiMock->document();
        $this->country = $this->apiMock->country();
        $this->payment = $this->apiMock->payment();
    }

    /**
     * @throws Exception
     */
    protected function setMockJsonModel(string $className, bool $allFields = false, bool $arrayModels = false): void
    {
        $json = $this::getStubJsonModelWithRequiredFields($className);
        if ($allFields) {
            $json = $this::getStubJsonModelWithAllFields($className);
        }
        if ($arrayModels) {
            $json = [$json, $json];
        }

        $this->clientMock
            ->method('request')
            ->willReturn(new Response(200, [], json_encode($json)));
    }
}
