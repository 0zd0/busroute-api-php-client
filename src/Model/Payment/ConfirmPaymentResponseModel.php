<?php

namespace Onepix\BusrouteApiClient\Model\Payment;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class ConfirmPaymentResponseModel extends AbstractResultModel
{
    public const RETURN_MODEL = PaymentModel::class;
    public const ARRAY_MODELS = false;

    /**
     * @return PaymentModel|null
     */
    public function getSingleReturn(): ?PaymentModel
    {
        $return = parent::getSingleReturn();

        return $return instanceof PaymentModel ? $return : null;
    }
}
