<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Entity;

final class TagEntity
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}