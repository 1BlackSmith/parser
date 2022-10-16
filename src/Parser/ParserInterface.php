<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Parser;

interface ParserInterface
{
    public function parse(string $content): array;
}