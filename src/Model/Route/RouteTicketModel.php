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

    // Поля для данных
    private ?int $tariff = null;
    private ?float $commission = null;
    private ?float $serviceCharge = null;
    private ?float $agentCharge = null;
    private ?float $amount = null;
    private ?float $insurance = null;

    /**
     * @return float|null
     */
    public function getInsurance(): ?float
    {
        return $this->insurance;
    }

    /**
     * @return float|null
     */
    public function getAgentCharge(): ?float
    {
        return $this->agentCharge;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @return float|null
     */
    public function getCommission(): ?float
    {
        return $this->commission;
    }

    /**
     * @return float|null
     */
    public function getServiceCharge(): ?float
    {
        return $this->serviceCharge;
    }

    /**
     * @return int|null
     */
    public function getTariff(): ?int
    {
        return $this->tariff;
    }

    /**
     * @param float|null $insurance
     *
     * @return self
     */
    public function setInsurance(?float $insurance): self
    {
        $this->insurance = $insurance;

        return $this;
    }

    /**
     * @param float|null $agentCharge
     *
     * @return self
     */
    public function setAgentCharge(?float $agentCharge): self
    {
        $this->agentCharge = $agentCharge;

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
     * @param float|null $commission
     *
     * @return self
     */
    public function setCommission(?float $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * @param float|null $serviceCharge
     *
     * @return self
     */
    public function setServiceCharge(?float $serviceCharge): self
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * @param int|null $tariff
     *
     * @return self
     */
    public function setTariff(?int $tariff): self
    {
        $this->tariff = $tariff;

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
