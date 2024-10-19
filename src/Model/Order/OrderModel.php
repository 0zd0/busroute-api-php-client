<?php

namespace Onepix\BusrouteApiClient\Model\Order;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Model\AbstractModel;

class OrderModel extends AbstractModel
{
    public const TRANSACTION_KEY      = 'transaction';
    public const ID_KEY               = 'id';
    public const AMOUNT_KEY           = 'amount';
    public const TASS_ORDER_ID_KEY    = 'tass_order_id';
    public const DATE_OF_PURCHASE_KEY = 'date_of_purchase';
    public const TICKETS_KEY          = 'tickets';

    protected ?string $transaction = null;
    protected ?string $id = null;
    protected ?float $amount = null;
    protected ?string $tassOrderId = null;
    protected ?DateTime $dateOfPurchase = null;

    /**
     * @var OrderTicketModel[]|null
     */
    protected ?array $tickets = null;

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getTassOrderId(): ?string
    {
        return $this->tassOrderId;
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
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfPurchase(): ?DateTime
    {
        return $this->dateOfPurchase;
    }

    /**
     * @return string|null
     */
    public function getTransaction(): ?string
    {
        return $this->transaction;
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
     * @param DateTime|null $dateOfPurchase
     *
     * @return self
     */
    public function setDateOfPurchase(?DateTime $dateOfPurchase): self
    {
        $this->dateOfPurchase = $dateOfPurchase;

        return $this;
    }

    /**
     * @param string|null $tassOrderId
     *
     * @return self
     */
    public function setTassOrderId(?string $tassOrderId): self
    {
        $this->tassOrderId = $tassOrderId;

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
        $model = new static();

        $model
            ->setTransaction($response[self::TRANSACTION_KEY] ?? null)
            ->setId($response[self::ID_KEY] ?? null)
            ->setAmount($response[self::AMOUNT_KEY] ?? null)
            ->setTassOrderId($response[self::TASS_ORDER_ID_KEY] ?? null)
            ->setDateOfPurchase(
                isset($response[self::DATE_OF_PURCHASE_KEY]) ? new DateTime($response[self::DATE_OF_PURCHASE_KEY]) : null
            )
            ->setTickets(
                isset($response[self::TICKETS_KEY])
                    ? array_map(fn($ticket) => OrderTicketModel::fromArray($ticket), $response[self::TICKETS_KEY])
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
                self::TASS_ORDER_ID_KEY    => $this->getTassOrderId(),
                self::DATE_OF_PURCHASE_KEY => $this->getDateOfPurchase()?->format('d.m.Y'),
                self::TICKETS_KEY          => $this->getTickets()
                    ? array_map(fn($ticket) => $ticket->toArray(), $this->getTickets())
                    : null,
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
