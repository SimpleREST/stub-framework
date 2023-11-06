<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

class HelpCommand extends Command
{
    /**
     * Конструктор класса команды HELP
     * -------------------------------
     *
     */
    public function __construct()
    {
        $this->name = "help";
        $this->description = "Выводит расширенную справку по выбранной команде";
    }

    public function run(Input $input = null, Output $output = null): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}