<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

class AboutCommand extends Command
{
    public function __construct()
    {
        $this->name = "about";
        $this->description = "Отображает основные данные о приложении";
    }

    public function run(Input $input = null, Output $output = null): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}