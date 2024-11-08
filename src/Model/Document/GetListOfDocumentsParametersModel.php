<?php

namespace Onepix\BusrouteApiClient\Model\Document;

use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetListOfDocumentsParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public function __construct()
    {
        $this->setAction(ActionEnum::GET_LIST_OF_DOCUMENTS);
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        return static::fromArrayRequest($response);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            $this->toArrayRequestData(),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
