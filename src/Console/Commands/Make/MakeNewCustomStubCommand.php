<?php

namespace Stub\Framework\Console\Commands\Make;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

class MakeNewCustomStubCommand extends Command
{
    public function __construct()
    {
        $this->name = "make:new-custom-stub";
        $this->description = "Создает пользовательскую заглушку из штатного шаблона";
    }

    public function run(Input $input = null, Output $output = null): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}