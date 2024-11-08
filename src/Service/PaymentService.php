<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\Payment\ConfirmPaymentParametersModel;
use Onepix\BusrouteApiClient\Model\Payment\ConfirmPaymentResponseModel;
use Onepix\BusrouteApiClient\Model\Payment\PaymentModel;

class PaymentService extends AbstractService
{
    /**
     * @param ConfirmPaymentParametersModel $data
     *
     * @return PaymentModel|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function confirmPayment(ConfirmPaymentParametersModel $data): ?PaymentModel
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = ConfirmPaymentResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getSingleReturn();
    }
}
