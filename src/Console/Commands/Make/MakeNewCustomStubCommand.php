<?php

namespace Stub\Framework\Console\Commands\Make;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class MakeNewCustomStubCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "make:new-custom-stub";
        $this->description = "Создает пользовательскую заглушку из штатного шаблона";
    }
    public function run(): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}