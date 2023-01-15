<?php

namespace Stub\Framework\Console\Base;

class Input implements \Stub\Framework\Contracts\Console\Input
{
    private $baseResult;
    public function __construct()
    {
        $this->baseResult = $_SERVER['argv'];
    }

    public function hasCommandLine(): bool
    {
        return false;
    }

    public function hasCommands(): bool
    {
        return false;
    }

    public function hasOptions(): bool
    {
        return false;
    }

    public function hasArguments(): bool
    {
        return false;
    }

    public function getArguments(): array
    {
        return $this->baseResult;
    }
}