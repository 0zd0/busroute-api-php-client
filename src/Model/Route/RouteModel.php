<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Model\AbstractModel;

class RouteModel extends AbstractModel
{
    public const ROUTE_START_STATION_KEY = 'route_start_station';
    public const ROUTE_END_STATION_KEY   = 'route_end_station';
    public const DEPARTURE_STATION_KEY   = 'departure_station';
    public const ARRIVAL_STATION_KEY     = 'arrival_station';
    public const DEPARTURE_DATE_KEY      = 'departure_date';
    public const DEPARTURE_TIME_KEY      = 'departure_time';
    public const ARRIVAL_DATE_KEY        = 'arrival_date';
    public const ARRIVAL_TIME_KEY        = 'arrival_time';
    public const ON_THE_WAY_KEY          = 'on_the_way';
    public const ADULT_KEY               = 'adult';
    public const CHILD_KEY               = 'child';
    public const AVAILABLE_SEATS_KEY     = 'available_seats';
    public const BUS_MODEL_KEY           = 'bus_model';
    public const BUS_CARRIER_KEY         = 'bus_carrier';
    public const BUS_CAPACITY_KEY        = 'bus_capacity';
    public const SALE_KEY                = 'sale';
    public const STATUS_KEY              = 'status';

    private ?string $routeStartStation = null;
    private ?string $routeEndStation = null;
    private ?string $departureStation = null;
    private ?string $arrivalStation = null;
    private ?DateTime $departureDate = null;
    private ?string $departureTime = null;
    private ?DateTime $arrivalDate = null;
    private ?string $arrivalTime = null;
    private ?string $onTheWay = null;
    private ?RouteTicketModel $adult = null;
    private ?RouteTicketModel $child = null;
    private ?int $availableSeats = null;
    private ?string $busModel = null;
    private ?string $busCarrier = null;
    private ?int $busCapacity = null;
    private ?int $sale = null;
    private ?int $status = null;

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getArrivalStation(): ?string
    {
        return $this->arrivalStation;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalDate(): ?DateTime
    {
        return $this->arrivalDate;
    }

    /**
     * @return string|null
     */
    public function getDepartureStation(): ?string
    {
        return $this->departureStation;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDate(): ?DateTime
    {
        return $this->departureDate;
    }

    /**
     * @return RouteTicketModel|null
     */
    public function getAdult(): ?RouteTicketModel
    {
        return $this->adult;
    }

    /**
     * @return string|null
     */
    public function getArrivalTime(): ?string
    {
        return $this->arrivalTime;
    }

    /**
     * @return int|null
     */
    public function getAvailableSeats(): ?int
    {
        return $this->availableSeats;
    }

    /**
     * @return int|null
     */
    public function getBusCapacity(): ?int
    {
        return $this->busCapacity;
    }

    /**
     * @return string|null
     */
    public function getBusCarrier(): ?string
    {
        return $this->busCarrier;
    }

    /**
     * @return string|null
     */
    public function getBusModel(): ?string
    {
        return $this->busModel;
    }

    /**
     * @return RouteTicketModel|null
     */
    public function getChild(): ?RouteTicketModel
    {
        return $this->child;
    }

    /**
     * @return string|null
     */
    public function getDepartureTime(): ?string
    {
        return $this->departureTime;
    }

    /**
     * @return string|null
     */
    public function getOnTheWay(): ?string
    {
        return $this->onTheWay;
    }

    /**
     * @return string|null
     */
    public function getRouteEndStation(): ?string
    {
        return $this->routeEndStation;
    }

    /**
     * @return string|null
     */
    public function getRouteStartStation(): ?string
    {
        return $this->routeStartStation;
    }

    /**
     * @return int|null
     */
    public function getSale(): ?int
    {
        return $this->sale;
    }

    /**
     * @param int|null $status
     *
     * @return self
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param string|null $arrivalStation
     *
     * @return self
     */
    public function setArrivalStation(?string $arrivalStation): self
    {
        $this->arrivalStation = $arrivalStation;

        return $this;
    }

    /**
     * @param DateTime|null $arrivalDate
     *
     * @return self
     */
    public function setArrivalDate(?DateTime $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    /**
     * @param string|null $departureStation
     *
     * @return self
     */
    public function setDepartureStation(?string $departureStation): self
    {
        $this->departureStation = $departureStation;

        return $this;
    }

    /**
     * @param DateTime|null $departureDate
     *
     * @return self
     */
    public function setDepartureDate(?DateTime $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * @param RouteTicketModel|null $adult
     *
     * @return self
     */
    public function setAdult(?RouteTicketModel $adult): self
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * @param string|null $arrivalTime
     *
     * @return self
     */
    public function setArrivalTime(?string $arrivalTime): self
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    /**
     * @param int|null $availableSeats
     *
     * @return self
     */
    public function setAvailableSeats(?int $availableSeats): self
    {
        $this->availableSeats = $availableSeats;

        return $this;
    }

    /**
     * @param int|null $busCapacity
     *
     * @return self
     */
    public function setBusCapacity(?int $busCapacity): self
    {
        $this->busCapacity = $busCapacity;

        return $this;
    }

    /**
     * @param string|null $busCarrier
     *
     * @return self
     */
    public function setBusCarrier(?string $busCarrier): self
    {
        $this->busCarrier = $busCarrier;

        return $this;
    }

    /**
     * @param string|null $busModel
     *
     * @return self
     */
    public function setBusModel(?string $busModel): self
    {
        $this->busModel = $busModel;

        return $this;
    }

    /**
     * @param RouteTicketModel|null $child
     *
     * @return self
     */
    public function setChild(?RouteTicketModel $child): self
    {
        $this->child = $child;

        return $this;
    }

    /**
     * @param string|null $departureTime
     *
     * @return self
     */
    public function setDepartureTime(?string $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    /**
     * @param string|null $onTheWay
     *
     * @return self
     */
    public function setOnTheWay(?string $onTheWay): self
    {
        $this->onTheWay = $onTheWay;

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
     * @param string|null $routeStartStation
     *
     * @return self
     */
    public function setRouteStartStation(?string $routeStartStation): self
    {
        $this->routeStartStation = $routeStartStation;

        return $this;
    }

    /**
     * @param int|null $sale
     *
     * @return self
     */
    public function setSale(?int $sale): self
    {
        $this->sale = $sale;

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
            ->setRouteStartStation($response[self::ROUTE_START_STATION_KEY] ?? null)
            ->setRouteEndStation($response[self::ROUTE_END_STATION_KEY] ?? null)
            ->setDepartureStation($response[self::DEPARTURE_STATION_KEY] ?? null)
            ->setArrivalStation($response[self::ARRIVAL_STATION_KEY] ?? null)
            ->setDepartureDate(
                isset($response[self::DEPARTURE_DATE_KEY]) ? new DateTime($response[self::DEPARTURE_DATE_KEY]) : null
            )
            ->setDepartureTime($response[self::DEPARTURE_TIME_KEY] ?? null)
            ->setArrivalDate(
                isset($response[self::ARRIVAL_DATE_KEY]) ? new DateTime($response[self::ARRIVAL_DATE_KEY]) : null
            )
            ->setArrivalTime($response[self::ARRIVAL_TIME_KEY] ?? null)
            ->setOnTheWay($response[self::ON_THE_WAY_KEY] ?? null)
            ->setAdult(
                isset($response[self::ADULT_KEY]) ? RouteTicketModel::fromArray($response[self::ADULT_KEY]) : null
            )
            ->setChild(
                isset($response[self::CHILD_KEY]) ? RouteTicketModel::fromArray($response[self::CHILD_KEY]) : null
            )
            ->setAvailableSeats($response[self::AVAILABLE_SEATS_KEY] ?? null)
            ->setBusModel($response[self::BUS_MODEL_KEY] ?? null)
            ->setBusCarrier($response[self::BUS_CARRIER_KEY] ?? null)
            ->setBusCapacity($response[self::BUS_CAPACITY_KEY] ?? null)
            ->setSale($response[self::SALE_KEY] ?? null)
            ->setStatus($response[self::STATUS_KEY] ?? null);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            [
                self::ROUTE_START_STATION_KEY         => $this->getRouteStartStation(),
                self::ROUTE_END_STATION_KEY     => $this->getRouteEndStation(),
                self::DEPARTURE_STATION_KEY => $this->getDepartureStation(),
                self::ARRIVAL_STATION_KEY   => $this->getArrivalStation(),
                self::DEPARTURE_DATE_KEY         => $this->getDepartureDate()?->format('d.m.Y'),
                self::DEPARTURE_TIME_KEY      => $this->getDepartureTime(),
                self::ARRIVAL_DATE_KEY      => $this->getArrivalDate()?->format('d.m.Y'),
                self::ARRIVAL_TIME_KEY      => $this->getArrivalTime(),
                self::ON_THE_WAY_KEY      => $this->getOnTheWay(),
                self::ADULT_KEY      => $this->getAdult()?->toArray(),
                self::CHILD_KEY      => $this->getChild()?->toArray(),
                self::AVAILABLE_SEATS_KEY      => $this->getAvailableSeats(),
                self::BUS_MODEL_KEY      => $this->getBusModel(),
                self::BUS_CARRIER_KEY      => $this->getBusCarrier(),
                self::BUS_CAPACITY_KEY      => $this->getBusCapacity(),
                self::SALE_KEY      => $this->getSale(),
                self::STATUS_KEY      => $this->getStatus(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
