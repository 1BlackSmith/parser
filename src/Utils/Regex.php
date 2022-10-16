<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Utils;

use Smith\HtmlParser\Exception\PregError;

final class Regex
{
    /**
     * @throws PregError
     */
    public static function occurrences(string $pattern, string $subject): array
    {
        return self::pregAndWrap(static function ($subject) use ($pattern): array {
            preg_match_all($pattern, $subject, $matches);
            return $matches[1];
        }, $subject);
    }

    /**
     * @throws PregError
     */
    private static function pregAndWrap(callable $operation, string $subject): array|string|int
    {
        $result = $operation($subject);

        if (PREG_NO_ERROR !== preg_last_error()) {
            throw new PregError(preg_last_error_msg());
        }

        return $result;
    }
}