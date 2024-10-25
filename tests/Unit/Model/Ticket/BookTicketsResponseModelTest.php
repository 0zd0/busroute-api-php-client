<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsModel;
use Onepix\BusrouteApiClient\Model\Ticket\BookTicketsResponseModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class BookTicketsResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(BookTicketsResponseModel::getClassName());
        $model = BookTicketsResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(BookTicketsResponseModel::getClassName());
        $model = BookTicketsResponseModel::fromArray($json);

        $this::assertInstanceOf(BookTicketsModel::class, $model->getSingleReturn());
        $this::assertArraysAreEqual($json, $model->toArray());
    }
}
