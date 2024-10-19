<?php

namespace Onepix\BusrouteApiClient\Model\Order;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\GenderEnum;
use Onepix\BusrouteApiClient\Enum\TicketTypeEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;

class OrderTicketModel extends AbstractModel
{
    public const SURNAME_KEY         = 'surname';
    public const FIRSTNAME_KEY       = 'firstname';
    public const PATRONYMIC_KEY      = 'patronymic';
    public const DOCUMENT_KEY        = 'document';
    public const DOCUMENT_SERIES_KEY = 'document_series';
    public const DOCUMENT_NUMBER_KEY = 'document_number';
    public const DATE_OF_BIRTH_KEY   = 'date_of_birth';
    public const NATIONALITY_KEY     = 'nationality';
    public const GENDER_KEY          = 'gender';
    public const TICKET_TYPE_KEY     = 'ticket_type';
    public const TARIFF_KEY          = 'tariff';
    public const COMMISSION_KEY      = 'comission';
    public const SERVICE_CHARGE_KEY  = 'service_charge';
    public const AGENT_CHARGE_KEY    = 'agent_charge';
    public const AMOUNT_KEY          = 'amount';
    public const TICKET_SERIES_KEY   = 'ticket_series';
    public const TICKET_NUMBER_KEY   = 'ticket_number';
    public const STATUS_KEY          = 'status';
    public const REFUND_KEY          = 'refund';

    protected ?string $surname = null;
    protected ?string $firstname = null;
    protected ?string $patronymic = null;
    protected ?string $document = null;
    protected ?string $document_series = null;
    protected ?string $document_number = null;
    protected ?DateTime $date_of_birth = null;
    protected ?string $nationality = null;
    protected ?GenderEnum $gender = null;
    protected ?TicketTypeEnum $ticket_type = null;
    protected ?int $tariff = null;
    protected ?float $commission = null;
    protected ?float $service_charge = null;
    protected ?float $agent_charge = null;
    protected ?float $amount = null;
    protected ?string $ticket_series = null;
    protected ?string $ticket_number = null;
    protected ?string $status = null;
    protected ?string $refund = null;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getTariff(): ?int
    {
        return $this->tariff;
    }

    /**
     * @return float|null
     */
    public function getServiceCharge(): ?float
    {
        return $this->service_charge;
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
    public function getAgentCharge(): ?float
    {
        return $this->agent_charge;
    }

    /**
     * @return GenderEnum|null
     */
    public function getGender(): ?GenderEnum
    {
        return $this->gender;
    }

    /**
     * @return string|null
     */
    public function getTicketSeries(): ?string
    {
        return $this->ticket_series;
    }

    /**
     * @return TicketTypeEnum|null
     */
    public function getTicketType(): ?TicketTypeEnum
    {
        return $this->ticket_type;
    }

    /**
     * @return float|null
     */
    public function getCommission(): ?float
    {
        return $this->commission;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfBirth(): ?DateTime
    {
        return $this->date_of_birth;
    }

    /**
     * @return string|null
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * @return string|null
     */
    public function getDocumentNumber(): ?string
    {
        return $this->document_number;
    }

    /**
     * @return string|null
     */
    public function getDocumentSeries(): ?string
    {
        return $this->document_series;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @return string|null
     */
    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    /**
     * @return string|null
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    /**
     * @return string|null
     */
    public function getRefund(): ?string
    {
        return $this->refund;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @return string|null
     */
    public function getTicketNumber(): ?string
    {
        return $this->ticket_number;
    }

    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

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
     * @param GenderEnum|null $gender
     *
     * @return self
     */
    public function setGender(?GenderEnum $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @param string|null $ticket_series
     *
     * @return self
     */
    public function setTicketSeries(?string $ticket_series): self
    {
        $this->ticket_series = $ticket_series;

        return $this;
    }

    /**
     * @param float|null $agent_charge
     *
     * @return self
     */
    public function setAgentCharge(?float $agent_charge): self
    {
        $this->agent_charge = $agent_charge;

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
     * @param DateTime|null $date_of_birth
     *
     * @return self
     */
    public function setDateOfBirth(?DateTime $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    /**
     * @param string|null $document
     *
     * @return self
     */
    public function setDocument(?string $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @param string|null $document_number
     *
     * @return self
     */
    public function setDocumentNumber(?string $document_number): self
    {
        $this->document_number = $document_number;

        return $this;
    }

    /**
     * @param string|null $document_series
     *
     * @return self
     */
    public function setDocumentSeries(?string $document_series): self
    {
        $this->document_series = $document_series;

        return $this;
    }

    /**
     * @param string|null $firstname
     *
     * @return self
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param string|null $nationality
     *
     * @return self
     */
    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @param string|null $patronymic
     *
     * @return self
     */
    public function setPatronymic(?string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * @param string|null $refund
     *
     * @return self
     */
    public function setRefund(?string $refund): self
    {
        $this->refund = $refund;

        return $this;
    }

    /**
     * @param float|null $service_charge
     *
     * @return self
     */
    public function setServiceCharge(?float $service_charge): self
    {
        $this->service_charge = $service_charge;

        return $this;
    }

    /**
     * @param string|null $surname
     *
     * @return self
     */
    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

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
     * @param string|null $ticket_number
     *
     * @return self
     */
    public function setTicketNumber(?string $ticket_number): self
    {
        $this->ticket_number = $ticket_number;

        return $this;
    }

    /**
     * @param TicketTypeEnum|null $ticket_type
     *
     * @return self
     */
    public function setTicketType(?TicketTypeEnum $ticket_type): self
    {
        $this->ticket_type = $ticket_type;

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
            ->setSurname($response[self::SURNAME_KEY] ?? null)
            ->setFirstname($response[self::FIRSTNAME_KEY] ?? null)
            ->setPatronymic($response[self::PATRONYMIC_KEY] ?? null)
            ->setDocument($response[self::DOCUMENT_KEY] ?? null)
            ->setDocumentSeries($response[self::DOCUMENT_SERIES_KEY] ?? null)
            ->setDocumentNumber($response[self::DOCUMENT_NUMBER_KEY] ?? null)
            ->setDateOfBirth(
                isset($response[self::DATE_OF_BIRTH_KEY]) ? new DateTime($response[self::DATE_OF_BIRTH_KEY]) : null
            )
            ->setNationality($response[self::NATIONALITY_KEY] ?? null)
            ->setGender(GenderEnum::tryFrom($response[self::GENDER_KEY] ?? ''))
            ->setTicketType(TicketTypeEnum::tryFrom($response[self::TICKET_TYPE_KEY] ?? ''))
            ->setTariff($response[self::TARIFF_KEY] ?? null)
            ->setCommission($response[self::COMMISSION_KEY] ?? null)
            ->setServiceCharge($response[self::SERVICE_CHARGE_KEY] ?? null)
            ->setAgentCharge($response[self::AGENT_CHARGE_KEY] ?? null)
            ->setAmount($response[self::AMOUNT_KEY] ?? null)
            ->setTicketSeries($response[self::TICKET_SERIES_KEY] ?? null)
            ->setTicketNumber($response[self::TICKET_NUMBER_KEY] ?? null)
            ->setStatus($response[self::STATUS_KEY] ?? null)
            ->setRefund($response[self::REFUND_KEY] ?? null);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            [
                self::SURNAME_KEY         => $this->getSurname(),
                self::FIRSTNAME_KEY       => $this->getFirstname(),
                self::PATRONYMIC_KEY      => $this->getPatronymic(),
                self::DOCUMENT_KEY        => $this->getDocument(),
                self::DOCUMENT_SERIES_KEY => $this->getDocumentSeries(),
                self::DOCUMENT_NUMBER_KEY => $this->getDocumentNumber(),
                self::DATE_OF_BIRTH_KEY   => $this->getDateOfBirth()?->format('d.m.Y'),
                self::NATIONALITY_KEY     => $this->getNationality(),
                self::GENDER_KEY          => $this->getGender()?->value,
                self::TICKET_TYPE_KEY     => $this->getTicketType()?->value,
                self::TARIFF_KEY          => $this->getTariff(),
                self::COMMISSION_KEY      => $this->getCommission(),
                self::SERVICE_CHARGE_KEY  => $this->getServiceCharge(),
                self::AGENT_CHARGE_KEY    => $this->getAgentCharge(),
                self::AMOUNT_KEY          => $this->getAmount(),
                self::TICKET_SERIES_KEY   => $this->getTicketSeries(),
                self::TICKET_NUMBER_KEY   => $this->getTicketNumber(),
                self::STATUS_KEY          => $this->getStatus(),
                self::REFUND_KEY          => $this->getRefund(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
