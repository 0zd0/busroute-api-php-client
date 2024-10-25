<?php

namespace Onepix\BusrouteApiClient\Test\Util;

use Exception;

trait StubTrait
{
    public static string $jsonRequiredKey = 'required';
    public static string $jsonAllKey      = 'all';

    /**
     * @throws Exception
     */
    public static function getStubJsonModelWithRequiredFields(string $name): array
    {
        return self::getJsonFile($name, self::$jsonRequiredKey);
    }

    /**
     * @throws Exception
     */
    public static function getStubJsonModelWithAllFields(string $name): array
    {
        return self::getJsonFile($name, self::$jsonAllKey);
    }

    /**
     * @throws Exception
     */
    public static function getJsonFile(string $name, string $prefix): array
    {
        $path = __DIR__ . "/../../stubs/json/$name.json";

        $modelData = file_get_contents($path);
        if ($modelData === false) {
            throw new Exception("Unable to load JSON model: $path");
        }

        $model = json_decode($modelData, true);
        if ($model === null) {
            throw new Exception("Invalid JSON in model: $path");
        }

        return $model[$prefix];
    }
}
