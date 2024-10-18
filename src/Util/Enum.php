<?php

namespace Onepix\BusrouteApiClient\Util;

use InvalidArgumentException;
use ReflectionClass;

class Enum
{
    public static function isEnumValueValid(string $enumClass, string $valueName): bool
    {
        if (!enum_exists($enumClass)) {
            throw new InvalidArgumentException("Enum class does not exist.");
        }

        $enum = new ReflectionClass($enumClass);

        if (!$enum->isEnum()) {
            throw new InvalidArgumentException("Provided class is not an enum.");
        }

        foreach ($enum->getConstants() as $constant => $enumCase) {
            if ($enumCase->name === $valueName) {
                return true;
            }
        }

        return false;
    }
}
