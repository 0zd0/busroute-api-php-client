<?php

namespace Onepix\BusrouteApiClient\Model\Payment;

use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class ConfirmPaymentParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public const TRANSACTION_KEY = 'transaction';
    public const ID_KEY          = 'id';
    public const AMOUNT_KEY      = 'amount';

    protected string $transaction;
    protected string $id;
    protected float $amount;

    public function __construct()
    {
        $this->setAction(ActionEnum::CONFIRM_PAYMENT);
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTransaction(): string
    {
        return $this->transaction;
    }

    /**
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return self
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $transaction
     *
     * @return self
     */
    public function setTransaction(string $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model->setTransaction($response[self::TRANSACTION_KEY] ?? null);
        $model->setId($response[self::ID_KEY] ?? null);
        $model->setAmount($response[self::AMOUNT_KEY] ?? null);

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(
                [
                    self::TRANSACTION_KEY => $this->getTransaction(),
                    self::ID_KEY          => $this->getId(),
                    self::AMOUNT_KEY      => $this->getAmount(),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
