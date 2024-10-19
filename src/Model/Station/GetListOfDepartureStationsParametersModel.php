<?php

namespace Onepix\BusrouteApiClient\Model\Station;

use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetListOfDepartureStationsParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public function __construct()
    {
        $this->setAction(ActionEnum::GET_LIST_OF_DEPARTURE_STATIONS);
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
        return $this->toArrayRequestData();
    }
}
