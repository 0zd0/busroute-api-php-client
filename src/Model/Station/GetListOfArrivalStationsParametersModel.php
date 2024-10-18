<?php

namespace Onepix\BusrouteApiClient\Model\Station;

use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetListOfArrivalStationsParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public const DEPARTURE_STATION_KEY = 'departure_station';

    protected string $departureStation;

    /**
     * @return string
     */
    public function getDepartureStation(): string
    {
        return $this->departureStation;
    }

    /**
     * @param string $departureStation
     *
     * @return self
     */
    public function setDepartureStation(string $departureStation): self
    {
        $this->departureStation = $departureStation;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model->setDepartureStation($response[self::DEPARTURE_STATION_KEY] ?? null);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            array_merge(
                [
                    self::DEPARTURE_STATION_KEY => $this->getDepartureStation(),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
