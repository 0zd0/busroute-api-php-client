<?php

namespace Onepix\BusrouteApiClient\Model\Station;

use Onepix\BusrouteApiClient\Model\AbstractModel;

class StationModel extends AbstractModel
{
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

    public static function fromArray(array $response): static
    {
        return new static();
    }

    public function toArray(): array
    {
        return [];
    }
}
