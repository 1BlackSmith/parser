<?php

declare(strict_types=1);

namespace Smith\HtmlParser;

use Smith\HtmlParser\Loader\LoaderInterface;
use Smith\HtmlParser\Parser\TagNameParser;
use Smith\HtmlParser\Parser\ParserInterface;

final class Facade
{
    private LoaderInterface $loader;
    private ParserInterface $parser;

    public function __construct(
        LoaderInterface $loader,
        ParserInterface $parser
    ) {
        $this->loader = $loader;
        $this->parser = $parser;
    }

    public static function create(LoaderInterface $loader, ParserInterface $parser = null): self
    {
        if (null === $parser) {
            $parser = new TagNameParser();
        }

        return new self($loader, $parser);
    }

    public function parse(): array
    {
        return $this->parser->parse(
            $this->loader->load()
        );
    }
}