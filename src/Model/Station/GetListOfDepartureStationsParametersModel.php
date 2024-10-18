<?php

namespace Onepix\BusrouteApiClient\Model\Station;

use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetListOfDepartureStationsParametersModel extends AbstractModel
{
    use RequestModelTrait;

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
