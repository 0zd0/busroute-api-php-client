<?php

namespace Onepix\BusrouteApiClient\Model\Order;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class GetOrderResponseModel extends AbstractResultModel
{
    public const RETURN_MODEL = OrderModel::class;
    public const ARRAY_MODELS = false;

    /**
     * @return OrderModel|null
     */
    public function getSingleReturn(): ?OrderModel
    {
        $return = parent::getSingleReturn();

        return $return instanceof OrderModel ? $return : null;
    }
}
