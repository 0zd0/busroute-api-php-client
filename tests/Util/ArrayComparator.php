<?php

declare(strict_types=1);

namespace Onepix\BusrouteApiClient\Test\Util;

use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\ComparisonFailure;
use SebastianBergmann\Exporter\Exporter;

use function array_key_exists;
use function is_array;
use function ksort;
use function sprintf;
use function str_replace;
use function trim;

class ArrayComparator extends Comparator
{
    public function accepts(mixed $expected, mixed $actual): bool
    {
        return is_array($expected) && is_array($actual);
    }

    public function assertEquals(
        mixed $expected,
        mixed $actual,
        float $delta = 0.0,
        bool $canonicalize = false,
        bool $ignoreCase = false,
        array &$processed = []
    ): void {
        $this->compareArraysRecursively($expected, $actual, $delta, $canonicalize, $ignoreCase, $processed);
    }

    private function compareArraysRecursively(
        array $expected,
        array $actual,
        float $delta,
        bool $canonicalize,
        bool $ignoreCase,
        array &$processed
    ): void {
        $exporter         = new Exporter();
        $equal            = true;
        $remaining        = $actual;
        $actualAsString   = "Array (\n";
        $expectedAsString = "Array (\n";

        if ($canonicalize) {
            ksort($expected);
            ksort($actual);
        }

        foreach ($expected as $key => $value) {
            unset($remaining[$key]);

            if (! array_key_exists($key, $actual)) {
                $expectedAsString .= $this->formatKeyValue($exporter, $key, $value);
                $equal            = false;
                continue;
            }

            try {
                if (is_array($value) && is_array($actual[$key])) {
                    $this->compareArraysRecursively(
                        $value,
                        $actual[$key],
                        $delta,
                        $canonicalize,
                        $ignoreCase,
                        $processed
                    );
                } else {
                    $comparator = $this->factory()->getComparatorFor($value, $actual[$key]);
                    $comparator->assertEquals($value, $actual[$key], $delta, $canonicalize, $ignoreCase, $processed);
                }
                $expectedAsString .= $this->formatKeyValue($exporter, $key, $value);
                $actualAsString   .= $this->formatKeyValue($exporter, $key, $actual[$key]);
            } catch (ComparisonFailure $e) {
                $expectedAsString .= $this->formatExceptionOutput($exporter, $key, $e, true);
                $actualAsString   .= $this->formatExceptionOutput($exporter, $key, $e, false);
                $equal            = false;
            }
        }

        foreach ($remaining as $key => $value) {
            $actualAsString .= $this->formatKeyValue($exporter, $key, $value);
            $equal          = false;
        }

        $expectedAsString .= ')';
        $actualAsString   .= ')';

        if (! $equal) {
            throw new ComparisonFailure(
                $expected,
                $actual,
                $expectedAsString,
                $actualAsString,
                'Failed asserting that two arrays are equal with keys and values at all levels.',
            );
        }
    }

    private function formatKeyValue(Exporter $exporter, mixed $key, mixed $value): string
    {
        return sprintf(
            "    %s => %s\n",
            $exporter->export($key),
            $exporter->shortenedExport($value),
        );
    }

    private function formatExceptionOutput(
        Exporter $exporter,
        mixed $key,
        ComparisonFailure $e,
        bool $isExpected
    ): string {
        return sprintf(
            "    %s => %s\n",
            $exporter->export($key),
            $this->indent(
                $isExpected
                    ? ($e->getExpectedAsString() ?: $exporter->shortenedExport($e->getExpected()))
                    : ($e->getActualAsString() ?: $exporter->shortenedExport($e->getActual()))
            )
        );
    }

    private function indent(string $lines): string
    {
        return trim(str_replace("\n", "\n    ", $lines));
    }
}
