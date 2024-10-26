<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Onepix\BusrouteApiClient\Model\AbstractModel;

class RefundTicketsModel extends AbstractModel
{
    public const TRANSACTION_KEY = 'transaction';
    public const ID_KEY = 'id';
    public const REFUND_AMOUNT_KEY = 'refund_amount';

    protected ?string $transaction;
    protected ?string $id;
    protected ?float $refundAmount;

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
     * @return float|null
     */
    public function getRefundAmount(): ?float
    {
        return $this->refundAmount;
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
     * @param float|null $refundAmount
     *
     * @return self
     */
    public function setRefundAmount(?float $refundAmount): self
    {
        $this->refundAmount = $refundAmount;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = new static();

        $model
            ->setTransaction($response[self::TRANSACTION_KEY] ?? null)
            ->setId($response[self::ID_KEY] ?? null)
            ->setRefundAmount($response[self::REFUND_AMOUNT_KEY] ?? null);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            [
                self::TRANSACTION_KEY  => $this->getTransaction(),
                self::ID_KEY           => $this->getId(),
                self::REFUND_AMOUNT_KEY => $this->getRefundAmount(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
