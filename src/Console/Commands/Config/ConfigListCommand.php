<?php

namespace Stub\Framework\Console\Commands\Config;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class ConfigListCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "config:list";
        $this->description = "Выводит список всех конфигурационных параметров в виде таблицы";
    }

    public function run(): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}