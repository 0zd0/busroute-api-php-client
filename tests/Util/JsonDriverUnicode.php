<?php

namespace Onepix\BusrouteApiClient\Test\Util;

use Spatie\Snapshots\Drivers\JsonDriver;
use Spatie\Snapshots\Exceptions\CantBeSerialized;

class JsonDriverUnicode extends JsonDriver
{
    private const SNAPSHOT_FLAGS = \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE;

    /**
     * @throws CantBeSerialized
     */
    public function serialize($data): string
    {
        if (\is_string($data)) {
            $data = \json_decode($data, true);
        }

        if (!\is_array($data)) {
            throw new CantBeSerialized('Only strings can be serialized to json');
        }

        return \json_encode($data, \JSON_PRETTY_PRINT | self::SNAPSHOT_FLAGS) . \PHP_EOL;
    }
}
