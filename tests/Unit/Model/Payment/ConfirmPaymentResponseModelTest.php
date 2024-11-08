<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Payment;

use Exception;
use Onepix\BusrouteApiClient\Model\Payment\ConfirmPaymentResponseModel;
use Onepix\BusrouteApiClient\Model\Payment\PaymentModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class ConfirmPaymentResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ConfirmPaymentResponseModel::getClassName());
        $model = ConfirmPaymentResponseModel::fromArray($json);

        $this::assertNull($model->getMultipleReturns());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ConfirmPaymentResponseModel::getClassName());
        $model = ConfirmPaymentResponseModel::fromArray($json);

        $this::assertInstanceOf(PaymentModel::class, $model->getSingleReturn());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
