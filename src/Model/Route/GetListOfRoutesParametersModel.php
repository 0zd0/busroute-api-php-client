<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Enum\FullDataEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetListOfRoutesParametersModel extends AbstractModel
{
    use RequestModelTrait;

    private const DEPARTURE_DATE_KEY    = 'departure_date';
    private const DEPARTURE_STATION_KEY = 'departure_station';
    private const ARRIVAL_STATION_KEY   = 'arrival_station';
    private const NUMBER_OF_SEATS_KEY   = 'number_of_seats';
    private const FULL_DATA_KEY         = 'full_data';

    protected DateTime $departureDate;
    protected string $departureStation;
    protected string $arrivalStation;
    protected int $numberOfSeats;
    protected ?FullDataEnum $fullData = null;

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
     * @return FullDataEnum|null
     */
    public function getFullData(): ?FullDataEnum
    {
        return $this->fullData;
    }

    /**
     * @return string
     */
    public function getDepartureStation(): string
    {
        return $this->departureStation;
    }

    /**
     * @return int
     */
    public function getNumberOfSeats(): int
    {
        return $this->numberOfSeats;
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
     * @param FullDataEnum|null $fullData
     *
     * @return self
     */
    public function setFullData(?FullDataEnum $fullData): self
    {
        $this->fullData = $fullData;

        return $this;
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

    public function __construct()
    {
        $this->setAction(ActionEnum::GET_LIST_OF_ROUTES);
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model
            ->setDepartureDate(new DateTime($response[self::DEPARTURE_DATE_KEY]))
            ->setDepartureStation($response[self::DEPARTURE_STATION_KEY])
            ->setArrivalStation($response[self::ARRIVAL_STATION_KEY])
            ->setNumberOfSeats($response[self::NUMBER_OF_SEATS_KEY])
            ->setFullData(FullDataEnum::tryFrom($response[self::FULL_DATA_KEY] ?? ''));

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(
                [
                    self::DEPARTURE_DATE_KEY    => $this->getDepartureDate()->format('d.m.Y'),
                    self::DEPARTURE_STATION_KEY => $this->getDepartureStation(),
                    self::ARRIVAL_STATION_KEY   => $this->getArrivalStation(),
                    self::NUMBER_OF_SEATS_KEY   => $this->getNumberOfSeats(),
                    self::FULL_DATA_KEY         => $this->getFullData()?->value,
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
