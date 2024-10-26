<?php

namespace Onepix\BusrouteApiClient\Model\Route;

use Onepix\BusrouteApiClient\Model\AbstractModel;

class RouteTicketModel extends AbstractModel
{
    public const TARIFF_KEY         = 'tariff';
    public const COMMISSION_KEY     = 'commission';
    public const SERVICE_CHARGE_KEY = 'service_charge';
    public const AGENT_CHARGE_KEY   = 'agent_charge';
    public const AMOUNT_KEY         = 'amount';
    public const INSURANCE_KEY      = 'insurance';

    private int|float|null $tariff = null;
    private int|float|null $commission = null;
    private int|float|null $serviceCharge = null;
    private int|float|null $agentCharge = null;
    private int|float|null $amount = null;
    private int|float|null $insurance = null;

    /**
     * @return float|int|null
     */
    public function getAmount(): float|int|null
    {
        return $this->amount;
    }

    /**
     * @return float|int|null
     */
    public function getAgentCharge(): float|int|null
    {
        return $this->agentCharge;
    }

    /**
     * @return float|int|null
     */
    public function getServiceCharge(): float|int|null
    {
        return $this->serviceCharge;
    }

    /**
     * @return float|int|null
     */
    public function getTariff(): float|int|null
    {
        return $this->tariff;
    }

    /**
     * @return float|int|null
     */
    public function getCommission(): float|int|null
    {
        return $this->commission;
    }

    /**
     * @return float|int|null
     */
    public function getInsurance(): float|int|null
    {
        return $this->insurance;
    }

    /**
     * @param float|int|null $amount
     *
     * @return self
     */
    public function setAmount(float|int|null $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param float|int|null $tariff
     *
     * @return self
     */
    public function setTariff(float|int|null $tariff): self
    {
        $this->tariff = $tariff;

        return $this;
    }

    /**
     * @param float|int|null $serviceCharge
     *
     * @return self
     */
    public function setServiceCharge(float|int|null $serviceCharge): self
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * @param float|int|null $commission
     *
     * @return self
     */
    public function setCommission(float|int|null $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * @param float|int|null $agentCharge
     *
     * @return self
     */
    public function setAgentCharge(float|int|null $agentCharge): self
    {
        $this->agentCharge = $agentCharge;

        return $this;
    }

    /**
     * @param float|int|null $insurance
     *
     * @return self
     */
    public function setInsurance(float|int|null $insurance): self
    {
        $this->insurance = $insurance;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = new static();

        $model
            ->setTariff($response[self::TARIFF_KEY] ?? null)
            ->setCommission($response[self::COMMISSION_KEY] ?? null)
            ->setServiceCharge($response[self::SERVICE_CHARGE_KEY] ?? null)
            ->setAgentCharge($response[self::AGENT_CHARGE_KEY] ?? null)
            ->setAmount($response[self::AMOUNT_KEY] ?? null)
            ->setInsurance($response[self::INSURANCE_KEY] ?? null);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            [
                self::TARIFF_KEY         => $this->getTariff(),
                self::COMMISSION_KEY     => $this->getCommission(),
                self::SERVICE_CHARGE_KEY => $this->getServiceCharge(),
                self::AGENT_CHARGE_KEY   => $this->getAgentCharge(),
                self::AMOUNT_KEY         => $this->getAmount(),
                self::INSURANCE_KEY      => $this->getInsurance(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
