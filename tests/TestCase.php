<?php

namespace Onepix\BusrouteApiClient\Test;

use Onepix\BusrouteApiClient\Test\Util\HelperTrait;
use PHPUnit\Framework\MockObject\Exception;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use HelperTrait;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpConfig();
    }
}
