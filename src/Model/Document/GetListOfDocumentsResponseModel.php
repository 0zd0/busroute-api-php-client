<?php

namespace Onepix\BusrouteApiClient\Model\Document;

use Onepix\BusrouteApiClient\Model\AbstractResultModel;

class GetListOfDocumentsResponseModel extends AbstractResultModel
{
    public const RETURN_MODEL = DocumentModel::class;

    /**
     * @return DocumentModel[]|null
     */
    public function getMultipleReturns(): ?array
    {
        return parent::getMultipleReturns();
    }
}
