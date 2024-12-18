<?php

namespace Onepix\BusrouteApiClient\Model;

abstract class AbstractModel
{
    public const IS_ONE_FIELD = false;

    /**
     * Convert to class from json
     *
     * @param array $response response from API.
     *
     * @return static
     */
    abstract public static function fromArray(array $response): static;

    public static function fromString(string $response): static
    {
        return new static();
    }

    /**
     * Convert class to array
     *
     * @return array
     */
    abstract public function toArray(): array;

    public function toString(): string
    {
        return '';
    }

    public static function getClassName(): string
    {
        $rawPath = str_replace(__NAMESPACE__ . '\\', '', get_called_class());

        return str_replace('\\', '/', $rawPath);
    }
}
