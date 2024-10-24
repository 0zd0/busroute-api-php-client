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
    public const SEATS_SEPARATOR   = ',';

    protected string $tassOrderId;

    /**
     * @var string[]|int[] $seats
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
     * @return string[]|int[]
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
     * @param string[]|int[] $seats
     *
     * @return self
     */
    public function setSeats(array $seats): self
    {
        $this->seats = $seats;

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
