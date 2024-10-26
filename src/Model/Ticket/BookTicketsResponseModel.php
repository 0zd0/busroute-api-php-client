<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class BookTicketsResponseModel extends AbstractResultModel
{
    public const ARRAY_MODELS = false;
    public const RETURN_MODEL = BookTicketsModel::class;

    /**
     * @return BookTicketsModel|null
     */
    public function getSingleReturn(): ?BookTicketsModel
    {
        $return = parent::getSingleReturn();

        return $return instanceof BookTicketsModel ? $return : null;
    }
}
