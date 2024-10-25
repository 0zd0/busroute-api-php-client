<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class RefundTicketsParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public const TASS_ORDER_ID_KEY = 'tass_order_id';
    public const SEATS_KEY         = 'seats';
    public const OPER_KEY          = 'oper';
    public const MODE_KEY          = 'mode';
    public const SEATS_SEPARATOR   = ',';

    protected string $tassOrderId;
    protected ?string $oper = null;
    protected ?string $mode = null;

    /**
     * @var string[] $seats
     */
    protected array $seats;

    public function __construct()
    {
        $this->setAction(ActionEnum::REFUND_TICKETS);
    }

    /**
     * @return string
     */
    public function getTassOrderId(): string
    {
        return $this->tassOrderId;
    }

    /**
     * @return string|null
     */
    public function getOper(): ?string
    {
        return $this->oper;
    }

    /**
     * @return string|null
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }

    /**
     * @return string[]
     */
    public function getSeats(): array
    {
        return $this->seats;
    }

    /**
     * @param string $tassOrderId
     *
     * @return self
     */
    public function setTassOrderId(string $tassOrderId): self
    {
        $this->tassOrderId = $tassOrderId;

        return $this;
    }

    /**
     * @param string[] $seats
     *
     * @return self
     */
    public function setSeats(array $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * @param string|null $oper
     *
     * @return self
     */
    public function setOper(?string $oper): self
    {
        $this->oper = $oper;

        return $this;
    }

    /**
     * @param string|null $mode
     *
     * @return self
     */
    public function setMode(?string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = self::fromArrayRequest($response);

        $model
            ->setTassOrderId($response[self::TASS_ORDER_ID_KEY])
            ->setMode($response[self::MODE_KEY] ?? null)
            ->setOper($response[self::OPER_KEY] ?? null)
            ->setSeats(explode(self::SEATS_SEPARATOR, $response[self::SEATS_KEY]));

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
                    self::TASS_ORDER_ID_KEY => $this->getTassOrderId(),
                    self::OPER_KEY          => $this->getOper(),
                    self::MODE_KEY          => $this->getMode(),
                    self::SEATS_KEY         => implode(self::SEATS_SEPARATOR, $this->getSeats()),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
