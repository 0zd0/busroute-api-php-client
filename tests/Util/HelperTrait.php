<?php

namespace Onepix\BusrouteApiClient\Test\Util;

use GuzzleHttp\Client;
use Onepix\BusrouteApiClient\Api;
use Onepix\BusrouteApiClient\ApiClient;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Yosymfony\Toml\Toml;

trait HelperTrait
{
    /**
     * Config from config.dev.toml
     *
     * @var array $devConfig
     */
    protected array $devConfig;

    protected Api $api;
    protected Api|MockObject $apiMock;
    protected Client|MockObject $clientMock;
    protected ApiClient|MockObject $apiClientMock;

    /**
     * @throws Exception
     */
    protected function setUpConfig(): void
    {
        $this->devConfig = Toml::ParseFile('config.dev.toml');

        $this->clientMock = $this->createMock(Client::class);

        $this->apiClientMock = new ApiClient('');
        $this->apiClientMock->setClient($this->clientMock);

        $this->apiMock = $this->getMockBuilder(Api::class)
                              ->setConstructorArgs([''])
                              ->onlyMethods(['getApiClient'])
                              ->getMock();
        $this->apiMock
            ->method('getApiClient')
            ->willReturn($this->apiClientMock);

        $this->api = new Api(
            $this->devConfig['api']['key'],
        );
    }
}
