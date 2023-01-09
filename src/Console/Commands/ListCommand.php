<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class ListCommand extends Command implements Commands
{

    public function __construct()
    {
        $this->name = "Command1";
        $this->description = "Description 1";
    }

    public function getConsoleDescriptionString(): string
    {
        return "";
    }

    public function run(): string
    {
        return "Выполнено";
    }
}