<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class HelpCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "help";
        $this->description = "Выводит расширенную справку по выбранной команде";
    }

    public function run(): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}