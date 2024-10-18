<?php

namespace Onepix\BusrouteApiClient\Model\Station;

use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetListOfDepartureStationsParameters extends AbstractModel
{
    use RequestModelTrait;

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        // TODO: Implement fromArray() method.
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
