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
    public static function merge(...$sourceJsons)
    {
        $sourceArray = [];

        foreach ($sourceJsons as $json) {
            $jsonObject     = \json_decode($json);
            $jsonArray      = \get_object_vars($jsonObject);
            $sourceArray[]  = $jsonArray;
        }

        $mergedArray = (new self)->mergeArray(...$sourceArray);

        return json_encode($mergedArray);
    }

    private function mergeArray(array ...$sourceArray): array
    {
        return \array_merge(...$sourceArray);
    }
}