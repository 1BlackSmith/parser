<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Parser;

use Smith\HtmlParser\Entity\TagEntity;
use Smith\HtmlParser\Exception\PregError;
use Smith\HtmlParser\Utils\Regex;

final class TagNameParser implements ParserInterface
{
    /**
     * @throws PregError
     */
    public function parse(string $content): array
    {
        return array_reduce(
            Regex::occurrences('/\<(\w+)/us', $content),
            static function (array $result, string $tagName): array {
                $result[] = (new TagEntity())->setName($tagName);
                return $result;
            },
            []
        );
    }
}