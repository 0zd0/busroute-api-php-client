<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Payment\ConfirmPaymentParametersModel;
use Onepix\BusrouteApiClient\Model\Payment\ConfirmPaymentResponseModel;
use Onepix\BusrouteApiClient\Model\Payment\PaymentModel;

class PaymentServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testConfirmPayment(): void
    {
        $this->setMockJsonModel(ConfirmPaymentResponseModel::getClassName(), true);

        $payment = $this->payment->confirmPayment(
            ConfirmPaymentParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(ConfirmPaymentParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(ConfirmPaymentResponseModel::class, $this->payment->getLastResult());

        $this::assertInstanceOf(PaymentModel::class, $payment);
    }
}
