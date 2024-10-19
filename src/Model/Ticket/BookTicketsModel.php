<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Exception;
use Onepix\BusrouteApiClient\Model\AbstractModel;

class BookTicketsModel extends AbstractModel
{
    public const TRANSACTION_KEY = 'transaction';
    public const ID_KEY = 'id';
    public const AMOUNT_KEY = 'amount';
    public const TICKETS_KEY = 'tickets';

    protected ?string $transaction = null;
    protected ?string $id = null;
    protected ?float $amount = null;
    protected ?array $tickets = null;

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
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
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
     * @param float|null $amount
     *
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

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
            ->setTransaction($response[self::TRANSACTION_KEY])
            ->setId($response[self::ID_KEY])
            ->setAmount($response[self::AMOUNT_KEY])
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
            [
                self::TRANSACTION_KEY      => $this->getTransaction(),
                self::ID_KEY               => $this->getId(),
                self::AMOUNT_KEY           => $this->getAmount(),
                self::TICKETS_KEY          => $this->getTickets()
                    ? array_reduce($this->getTickets(), function ($carry, $ticket) {
                        /**
                         * @var TicketModel $ticket
                         */
                        $carry[$ticket->getReservedSeatNumber()] = $ticket->toArray();
                        return $carry;
                    }, [])
                    : null,
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
