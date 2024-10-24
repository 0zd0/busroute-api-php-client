<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class CancelBookingParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public const TRANSACTION_KEY = 'transaction';
    public const ID_KEY          = 'id';

    protected ?string $transaction = null;
    protected ?string $id = null;

    public function __construct()
    {
        $this->setAction(ActionEnum::CANCEL_BOOKING);
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
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model
            ->setId($response[self::ID_KEY])
            ->setTransaction($response[self::TRANSACTION_KEY]);

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
                    self::TRANSACTION_KEY => $this->getTransaction(),
                    self::ID_KEY          => $this->getId(),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
