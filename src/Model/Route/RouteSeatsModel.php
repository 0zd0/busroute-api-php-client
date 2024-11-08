<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use Onepix\BusrouteApiClient\Model\AbstractModel;

class RouteSeatsModel extends AbstractModel
{
    private const TRANSACTION_KEY     = 'transaction';
    private const ID_KEY              = 'id';
    private const NUMBER_OF_SEATS_KEY = 'number_of_seats';
    private const AVAILABLE_SEATS_KEY = 'available_seats';
    private const REG_PD_KEY          = 'reg_PD';

    public const SEATS_SEPARATOR = ',';

    protected ?string $transaction = null;
    protected ?string $id = null;
    protected ?int $numberOfSeats = null;
    protected ?array $availableSeats = null;
    protected ?int $regPD = null;

    /**
     * @return int|null
     */
    public function getNumberOfSeats(): ?int
    {
        return $this->numberOfSeats;
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
    public function getAvailableSeats(): ?array
    {
        return $this->availableSeats;
    }

    /**
     * @return int|null
     */
    public function getRegPD(): ?int
    {
        return $this->regPD;
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
     * @param array|null $availableSeats
     *
     * @return self
     */
    public function setAvailableSeats(?array $availableSeats): self
    {
        $this->availableSeats = $availableSeats;

        return $this;
    }

    /**
     * @param int|null $regPD
     *
     * @return self
     */
    public function setRegPD(?int $regPD): self
    {
        $this->regPD = $regPD;

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
            ->setNumberOfSeats($response[self::NUMBER_OF_SEATS_KEY] ?? null)
            ->setAvailableSeats(
                isset($response[self::AVAILABLE_SEATS_KEY])
                    ? explode(self::SEATS_SEPARATOR, $response[self::AVAILABLE_SEATS_KEY])
                    : null
            )
            ->setRegPD(
                isset($response[self::REG_PD_KEY]) && is_int($response[self::REG_PD_KEY])
                    ? $response[self::REG_PD_KEY]
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
                self::TRANSACTION_KEY     => $this->getTransaction(),
                self::ID_KEY              => $this->getId(),
                self::NUMBER_OF_SEATS_KEY => $this->getNumberOfSeats(),
                self::AVAILABLE_SEATS_KEY => ! is_null($this->getAvailableSeats())
                    ? implode(self::SEATS_SEPARATOR, $this->getAvailableSeats())
                    : null,
                self::REG_PD_KEY          => $this->getRegPD(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
