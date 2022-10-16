<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Command;

use Smith\HtmlParser\Entity\TagEntity;
use Smith\HtmlParser\Loader\UrlLoader;
use Smith\HtmlParser\Facade;

final class GetTagCountCommand implements CommandInterface
{
    public function execute(): void
    {
        $loader = new UrlLoader('https://google.com/');

        $tagList = Facade::create($loader)->parse();

        $result = array_reduce(
            $tagList,
            static function (array $result, TagEntity $tag): array {
                if (false === array_key_exists($tag->getName(), $result)) {
                    $result[$tag->getName()] = 0;
                }

                $result[$tag->getName()]++;

                return $result;
            },
            []
        );

        print_r($result);
    }
}