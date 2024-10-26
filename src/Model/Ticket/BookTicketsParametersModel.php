<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class BookTicketsParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public const TRANSACTION_KEY       = 'transaction';
    public const ID_KEY                = 'id';
    public const NUMBER_OF_SEATS_KEY   = 'number_of_seats';
    public const DEPARTURE_STATION_KEY = 'departure_station';
    public const TICKETS_KEY           = 'tickets';

    protected ?string $transaction = null;
    protected ?string $id = null;
    protected ?int $numberOfSeats = null;
    protected ?string $departureStation = null;

    /**
     * @var TicketModel[]|null $tickets
     */
    protected ?array $tickets = null;

    public function __construct()
    {
        $this->setAction(ActionEnum::BOOK_TICKETS);
    }

    /**
     * @return string|null
     */
    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return array|null
     */
    public function getTickets(): ?array
    {
        return $this->tickets;
    }

    /**
     * @return string|null
     */
    public function getDepartureStation(): ?string
    {
        return $this->departureStation;
    }

    /**
     * @return int|null
     */
    public function getNumberOfSeats(): ?int
    {
        return $this->numberOfSeats;
    }

    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param array|null $tickets
     *
     * @return self
     */
    public function setTickets(?array $tickets): self
    {
        $this->tickets = $tickets;

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
     * @param int|null $numberOfSeats
     *
     * @return self
     */
    public function setNumberOfSeats(?int $numberOfSeats): self
    {
        $this->numberOfSeats = $numberOfSeats;

        return $this;
    }

    /**
     * @param string|null $transaction
     *
     * @return self
     */
    public function setTransaction(?string $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model
            ->setId($response[self::ID_KEY])
            ->setTransaction($response[self::TRANSACTION_KEY])
            ->setNumberOfSeats($response[self::NUMBER_OF_SEATS_KEY])
            ->setDepartureStation($response[self::DEPARTURE_STATION_KEY])
            ->setTickets(
                isset($response[self::TICKETS_KEY])
                    ? array_map(function ($key) use ($response) {
                        return TicketModel::fromArrayAndKey($key, $response[self::TICKETS_KEY][$key]);
                    }, array_keys($response[self::TICKETS_KEY]))
                    : null
            );

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
                self::TRANSACTION_KEY       => $this->getTransaction(),
                self::ID_KEY                => $this->getId(),
                self::NUMBER_OF_SEATS_KEY   => $this->getNumberOfSeats(),
                self::DEPARTURE_STATION_KEY => $this->getDepartureStation(),
                self::TICKETS_KEY           => $this->getTickets()
                    ? array_reduce($this->getTickets(), function ($carry, $ticket) {
                        /**
                         * @var TicketModel $ticket
                         */
                        $carry[$ticket->getReservedSeatNumber()] = $ticket->toArray();

                        return $carry;
                    }, [])
                    : null,
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
