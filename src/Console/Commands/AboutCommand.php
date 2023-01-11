<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class AboutCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "about";
        $this->description = "Отображает основные данные о приложении";
    }

    public function run(): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}