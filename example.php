<?php

declare(strict_types=1);

use Smith\HtmlParser\Command\CommandInvoker;
use Smith\HtmlParser\Command\GetTagCountCommand;

require_once 'vendor/autoload.php';

$invoker = new CommandInvoker();

$getTagCount = new GetTagCountCommand();

$invoker->submit($getTagCount);