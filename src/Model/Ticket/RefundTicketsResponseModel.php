<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class RefundTicketsResponseModel extends AbstractResultModel
{
    public const ARRAY_MODELS = false;
    public const RETURN_MODEL = RefundTicketsModel::class;

    /**
     * @return RefundTicketsModel|null
     */
    public function getSingleReturn(): ?RefundTicketsModel
    {
        $return = parent::getSingleReturn();

        return $return instanceof RefundTicketsModel ? $return : null;
    }
}
