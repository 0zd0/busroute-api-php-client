<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetRouteSeatsParametersModel extends AbstractModel
{
    use RequestModelTrait;

    private const DEPARTURE_DATE_KEY    = 'departure_date';
    private const DEPARTURE_TIME_KEY    = 'departure_time';
    private const DEPARTURE_STATION_KEY = 'departure_station';
    private const ARRIVAL_STATION_KEY   = 'arrival_station';
    private const ROUTE_END_STATION_KEY = 'route_end_station';
    private const NUMBER_OF_SEATS_KEY   = 'number_of_seats';

    protected DateTime $departureDate;
    protected string $departureTime;
    protected string $departureStation;
    protected string $arrivalStation;
    protected ?string $routeEndStation;
    protected int $numberOfSeats;

    /**
     * @return int
     */
    public function getNumberOfSeats(): int
    {
        return $this->numberOfSeats;
    }

    /**
     * @return string
     */
    public function getDepartureStation(): string
    {
        return $this->departureStation;
    }

    /**
     * @return string|null
     */
    public function getRouteEndStation(): ?string
    {
        return $this->routeEndStation;
    }

    /**
     * @return string
     */
    public function getArrivalStation(): string
    {
        return $this->arrivalStation;
    }

    /**
     * @return DateTime
     */
    public function getDepartureDate(): DateTime
    {
        return $this->departureDate;
    }

    /**
     * @return string
     */
    public function getDepartureTime(): string
    {
        return $this->departureTime;
    }

    /**
     * @param int $numberOfSeats
     *
     * @return self
     */
    public function setNumberOfSeats(int $numberOfSeats): self
    {
        $this->numberOfSeats = $numberOfSeats;

        return $this;
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
     * @param string|null $routeEndStation
     *
     * @return self
     */
    public function setRouteEndStation(?string $routeEndStation): self
    {
        $this->routeEndStation = $routeEndStation;

        return $this;
    }

    /**
     * @param string $departureTime
     *
     * @return self
     */
    public function setDepartureTime(string $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    /**
     * @param DateTime $departureDate
     *
     * @return self
     */
    public function setDepartureDate(DateTime $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * @param string $arrivalStation
     *
     * @return self
     */
    public function setArrivalStation(string $arrivalStation): self
    {
        $this->arrivalStation = $arrivalStation;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public static function fromArray(array $response): static
    {
        $model = new static();

        $model
            ->setDepartureDate(new DateTime($response[self::DEPARTURE_DATE_KEY]))
            ->setDepartureTime($response[self::DEPARTURE_TIME_KEY])
            ->setDepartureStation($response[self::DEPARTURE_STATION_KEY])
            ->setArrivalStation($response[self::ARRIVAL_STATION_KEY])
            ->setRouteEndStation($response[self::ROUTE_END_STATION_KEY] ?? null)
            ->setNumberOfSeats($response[self::NUMBER_OF_SEATS_KEY]);

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
                    self::DEPARTURE_DATE_KEY         => $this->getDepartureDate()->format('d.m.Y'),
                    self::DEPARTURE_TIME_KEY         => $this->getDepartureTime(),
                    self::DEPARTURE_STATION_KEY         => $this->getDepartureStation(),
                    self::ARRIVAL_STATION_KEY         => $this->getArrivalStation(),
                    self::ROUTE_END_STATION_KEY         => $this->getRouteEndStation(),
                    self::NUMBER_OF_SEATS_KEY         => $this->getNumberOfSeats(),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
