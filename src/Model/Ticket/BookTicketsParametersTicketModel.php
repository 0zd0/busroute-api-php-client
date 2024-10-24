<?php

namespace Onepix\BusrouteApiClient\Model\Ticket;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Enum\GenderEnum;
use Onepix\BusrouteApiClient\Model\AbstractModel;
use Onepix\BusrouteApiClient\Model\RequestModelTrait;

class BookTicketsParametersTicketModel extends AbstractModel
{
    use RequestModelTrait;

    public const SURNAME_KEY         = 'surname';
    public const FIRSTNAME_KEY       = 'firstname';
    public const PATRONYMIC_KEY      = 'patronymic';
    public const DOCUMENT_KEY        = 'document';
    public const DOCUMENT_SERIES_KEY = 'document_series';
    public const DOCUMENT_NUMBER_KEY = 'document_number';
    public const DATE_OF_BIRTH_KEY   = 'date_of_birth';
    public const NATIONALITY_KEY     = 'nationality';
    public const GENDER_KEY          = 'gender';
    public const PHONE_KEY           = 'phone';

    protected string $surname;
    protected string $firstname;
    protected ?string $patronymic = null;
    protected string $document;
    protected string $documentSeries;
    protected string $documentNumber;
    protected DateTime $dateOfBirth;
    protected string $nationality;
    protected GenderEnum $gender;
    protected string $phone;

    public function __construct()
    {
        $this->setAction(ActionEnum::BOOK_TICKETS);
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return GenderEnum
     */
    public function getGender(): GenderEnum
    {
        return $this->gender;
    }

    /**
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->document;
    }

    /**
     * @return string
     */
    public function getDocumentNumber(): string
    {
        return $this->documentNumber;
    }

    /**
     * @return string
     */
    public function getDocumentSeries(): string
    {
        return $this->documentSeries;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getNationality(): string
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
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $documentSeries
     *
     * @return self
     */
    public function setDocumentSeries(string $documentSeries): self
    {
        $this->documentSeries = $documentSeries;

        return $this;
    }

    /**
     * @param string $documentNumber
     *
     * @return self
     */
    public function setDocumentNumber(string $documentNumber): self
    {
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * @param DateTime $dateOfBirth
     *
     * @return self
     */
    public function setDateOfBirth(DateTime $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param GenderEnum $gender
     *
     * @return self
     */
    public function setGender(GenderEnum $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @param string $document
     *
     * @return self
     */
    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param string $nationality
     *
     * @return self
     */
    public function setNationality(string $nationality): self
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
     * @param string $surname
     *
     * @return self
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $response): static
    {
        $model = static::fromArrayRequest($response);

        $model
            ->setSurname($response[self::SURNAME_KEY])
            ->setFirstname($response[self::FIRSTNAME_KEY])
            ->setPatronymic($response[self::PATRONYMIC_KEY] ?? null)
            ->setDocument($response[self::DOCUMENT_KEY])
            ->setDocumentSeries($response[self::DOCUMENT_SERIES_KEY])
            ->setDocumentNumber($response[self::DOCUMENT_NUMBER_KEY])
            ->setDateOfBirth(new DateTime($response[self::DATE_OF_BIRTH_KEY]))
            ->setNationality($response[self::NATIONALITY_KEY])
            ->setGender($response[self::GENDER_KEY])
            ->setPhone($response[self::PHONE_KEY]);

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(
                [
                    self::SURNAME_KEY         => $this->getSurname(),
                    self::FIRSTNAME_KEY       => $this->getFirstname(),
                    self::PATRONYMIC_KEY      => $this->getPatronymic(),
                    self::DOCUMENT_KEY        => $this->getDocument(),
                    self::DOCUMENT_SERIES_KEY => $this->getDocumentSeries(),
                    self::DOCUMENT_NUMBER_KEY => $this->getDocumentNumber(),
                    self::DATE_OF_BIRTH_KEY   => $this->getDateOfBirth()->format('d.m.Y'),
                    self::NATIONALITY_KEY     => $this->getNationality(),
                    self::GENDER_KEY          => $this->getGender(),
                    self::PHONE_KEY           => $this->getPhone(),
                ],
                $this->toArrayRequestData()
            ),
            function ($value) {
                return $value !== null;
            }
        );
    }
}
