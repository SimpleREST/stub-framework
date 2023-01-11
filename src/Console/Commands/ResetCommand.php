<?php

namespace Stub\Framework\Console\Commands\Config;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class ResetCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "reset";
        $this->description = "Сбрасывает заглушку к первоначальному состоянию полностью (деструктивная функция,
         все изменения сделанные ранее будут потеряны";
    }

    public function run(): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}