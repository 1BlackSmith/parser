<?php

namespace Smith\HtmlParser\Loader;

final class UrlLoader implements LoaderInterface
{
    private string $url;
    private ?string $content = null;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function load(): string
    {
        if (null === $this->content) {
            $this->content = file_get_contents($this->url);
        }

        return $this->content;
    }
}