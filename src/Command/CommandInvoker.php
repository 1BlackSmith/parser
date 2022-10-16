<?php

declare(strict_types=1);

namespace Smith\HtmlParser\Command;

final class CommandInvoker
{
    public function submit(CommandInterface $command): void
    {
        $command->execute();
    }
}