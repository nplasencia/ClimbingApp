<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Utils;

use JsonException;
use stdClass;

final class JsonUtils
{
    /**
     * @param string $string
     * @return stdClass[]
     * @throws JsonException
     */
    public function jsonDecodeThrowsOnError(string $string): array
    {
        return json_decode($string, false, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param stdClass $object
     * @return string
     * @throws JsonException
     */
    public function jsonEncodeThrowsOnError(stdClass $object): string
    {
        return json_encode($object, JSON_THROW_ON_ERROR);
    }
}