<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Ticket\CancelBookingParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class CancelBookingParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(CancelBookingParametersModel::getClassName());
        $model = CancelBookingParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::CANCEL_BOOKING, $model->getAction());
        $this::assertSame('44252', $model->getTransaction());
        $this::assertSame('1f263e877c53aeec912cced14a4544bf', $model->getId());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(CancelBookingParametersModel::getClassName());
        $model = CancelBookingParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::CANCEL_BOOKING, $model->getAction());
        $this::assertSame('44252', $model->getTransaction());
        $this::assertSame('1f263e877c53aeec912cced14a4544bf', $model->getId());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
