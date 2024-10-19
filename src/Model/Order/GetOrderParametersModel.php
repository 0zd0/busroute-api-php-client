<?php

namespace Onepix\BusrouteApiClient\Model\Order;

use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class GetOrderParametersModel extends AbstractModel
{
    use RequestModelTrait;

    public const TASS_ORDER_ID = 'tass_order_id';

    protected int $tassOrderId;

    /**
     * @return int
     */
    public function getTassOrderId(): int
    {
        return $this->tassOrderId;
    }

    /**
     * @param int $tassOrderId
     *
     * @return self
     */
    public function setTassOrderId(int $tassOrderId): self
    {
        $this->tassOrderId = $tassOrderId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model->setTassOrderId($response[self::TASS_ORDER_ID] ?? null);

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
                    self::TASS_ORDER_ID => $this->getTassOrderId(),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
