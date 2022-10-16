<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Loader;

interface LoaderInterface
{
    public function load(): string;
}