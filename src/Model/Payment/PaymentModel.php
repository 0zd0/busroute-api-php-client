<?php

namespace Onepix\BusrouteApiClient\Model\Payment;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\Ticket\TicketModel;

class PaymentModel extends AbstractModel
{
    public const TRANSACTION_KEY      = 'transaction';
    public const ID_KEY               = 'id';
    public const AMOUNT_KEY           = 'amount';
    public const TASS_ORDER_ID_KEY    = 'tass_order_id';
    public const DATE_OF_PURCHASE_KEY = 'date_of_purchase';
    public const CARRIER_KEY          = 'carrier';
    public const BUSNAME_KEY          = 'busname';
    public const BARCODE_KEY          = 'barcode';
    public const PLATNOM_KEY          = 'platnom';
    public const MARSHNOM_KEY         = 'marshnom';
    public const PVEDNOM_KEY          = 'pvednom';
    public const BUSKAT_KEY           = 'buskat';
    public const TICKETS_KEY          = 'tickets';

    protected ?string $transaction = null;
    protected ?string $id = null;
    protected ?float $amount = null;
    protected ?string $tass_order_id = null;
    protected ?DateTime $date_of_purchase = null;
    protected ?string $carrier = null;
    protected ?string $busname = null;
    protected ?string $barcode = null;
    protected ?string $platnom = null;
    protected ?string $marshnom = null;
    protected ?string $pvednom = null;
    protected ?string $buskat = null;

    /**
     * @var TicketModel[]|null $buskat
     */
    protected ?array $tickets = null;

    /**
     * @return string|null
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
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
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfPurchase(): ?DateTime
    {
        return $this->date_of_purchase;
    }

    /**
     * @return string|null
     */
    public function getTassOrderId(): ?string
    {
        return $this->tass_order_id;
    }

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
     * @return string|null
     */
    public function getBuskat(): ?string
    {
        return $this->buskat;
    }

    /**
     * @return string|null
     */
    public function getBusname(): ?string
    {
        return $this->busname;
    }

    /**
     * @return string|null
     */
    public function getMarshnom(): ?string
    {
        return $this->marshnom;
    }

    /**
     * @return string|null
     */
    public function getPlatnom(): ?string
    {
        return $this->platnom;
    }

    /**
     * @return string|null
     */
    public function getPvednom(): ?string
    {
        return $this->pvednom;
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
     * @param string|null $barcode
     *
     * @return self
     */
    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * @param string|null $carrier
     *
     * @return self
     */
    public function setCarrier(?string $carrier): self
    {
        $this->carrier = $carrier;

        return $this;
    }

    /**
     * @param string|null $buskat
     *
     * @return self
     */
    public function setBuskat(?string $buskat): self
    {
        $this->buskat = $buskat;

        return $this;
    }

    /**
     * @param string|null $busname
     *
     * @return self
     */
    public function setBusname(?string $busname): self
    {
        $this->busname = $busname;

        return $this;
    }

    /**
     * @param DateTime|null $date_of_purchase
     *
     * @return self
     */
    public function setDateOfPurchase(?DateTime $date_of_purchase): self
    {
        $this->date_of_purchase = $date_of_purchase;

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
     * @param string|null $marshnom
     *
     * @return self
     */
    public function setMarshnom(?string $marshnom): self
    {
        $this->marshnom = $marshnom;

        return $this;
    }

    /**
     * @param string|null $platnom
     *
     * @return self
     */
    public function setPlatnom(?string $platnom): self
    {
        $this->platnom = $platnom;

        return $this;
    }

    /**
     * @param string|null $pvednom
     *
     * @return self
     */
    public function setPvednom(?string $pvednom): self
    {
        $this->pvednom = $pvednom;

        return $this;
    }

    /**
     * @param string|null $tass_order_id
     *
     * @return self
     */
    public function setTassOrderId(?string $tass_order_id): self
    {
        $this->tass_order_id = $tass_order_id;

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
                isset($response[self::DATE_OF_PURCHASE_KEY])
                    ? new DateTime($response[self::DATE_OF_PURCHASE_KEY])
                    : null
            )
            ->setCarrier($response[self::CARRIER_KEY] ?? null)
            ->setBusname($response[self::BUSNAME_KEY] ?? null)
            ->setBarcode($response[self::BARCODE_KEY] ?? null)
            ->setPlatnom($response[self::PLATNOM_KEY] ?? null)
            ->setMarshnom($response[self::MARSHNOM_KEY] ?? null)
            ->setPvednom($response[self::PVEDNOM_KEY] ?? null)
            ->setBuskat($response[self::BUSKAT_KEY] ?? null)
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
                self::TASS_ORDER_ID_KEY    => $this->getTassOrderId(),
                self::DATE_OF_PURCHASE_KEY => $this->getDateOfPurchase()?->format('d.m.Y'),
                self::CARRIER_KEY          => $this->getCarrier(),
                self::BUSNAME_KEY          => $this->getBusname(),
                self::BARCODE_KEY          => $this->getBarcode(),
                self::PLATNOM_KEY          => $this->getPlatnom(),
                self::MARSHNOM_KEY         => $this->getMarshnom(),
                self::PVEDNOM_KEY          => $this->getPvednom(),
                self::BUSKAT_KEY           => $this->getBuskat(),
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
