<?php

declare(strict_types=1);

namespace JsonMerger;

/**
 * Core json merger Object.
 *
 * @author Babagana Zannah
 */
final class JsonMerger
{
    /**
     * @param mixed ...$sourceJsons
     * @return mixed
     */
    public static function merge(...$sourceJsons): array
    {
        $sourceArray = [];
        foreach ($sourceJsons as $json) {
            $sourceArray[] = json_decode($json);
        }

        return json_encode((new self)->mergeArray(...$sourceArray), JSON_THROW_ON_ERROR, 512);
    }

    private function mergeArray(array ...$sourceArray) : array
    {
        $outputArray = [];

        foreach ($sourceArray as $item) {
            $outputArray[] = \array_merge($item);
        }

        return $outputArray;
    }
}