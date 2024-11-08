<?php

namespace Onepix\BusrouteApiClient\Model\Country;

use Onepix\BusrouteApiClient\Model\AbstractModel;

class CountryModel extends AbstractModel
{
    public const IS_ONE_FIELD = true;

    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public static function fromString(string $response): static
    {
        $model = new static();

        $model->setName($response);

        return $model;
    }

    public function toString(): string
    {
        return $this->getName();
    }

    public static function fromArray(array $response): static
    {
        return new static();
    }

    public function toArray(): array
    {
        return [];
    }
}
