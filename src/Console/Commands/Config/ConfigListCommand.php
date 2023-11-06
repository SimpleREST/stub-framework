<?php

namespace Stub\Framework\Console\Commands\Config;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

class ConfigListCommand extends Command
{
    public function __construct()
    {
        $this->name = "config:list";
        $this->description = "Выводит список всех конфигурационных параметров в виде таблицы";
    }

    public function run(Input $input = null, Output $output = null): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}