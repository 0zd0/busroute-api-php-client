<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Payment;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Payment\ConfirmPaymentParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class ConfirmPaymentParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(ConfirmPaymentParametersModel::getClassName());
        $model = ConfirmPaymentParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::CONFIRM_PAYMENT, $model->getAction());
        $this::assertSame('4792881', $model->getTransaction());
        $this::assertSame('dbfe4e8a497f5830db3086044c386f00', $model->getId());
        $this::assertSame(401.25, $model->getAmount());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(ConfirmPaymentParametersModel::getClassName());
        $model = ConfirmPaymentParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::CONFIRM_PAYMENT, $model->getAction());
        $this::assertSame('4792881', $model->getTransaction());
        $this::assertSame('dbfe4e8a497f5830db3086044c386f00', $model->getId());
        $this::assertSame(401.25, $model->getAmount());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
