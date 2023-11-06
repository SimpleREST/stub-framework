<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

class ResetCommand extends Command
{
    public function __construct()
    {
        $this->name = "reset";
        $this->description = "Сбрасывает заглушку к первоначальному состоянию полностью (деструктивная функция, все изменения сделанные ранее будут потеряны";
    }

    public function run(Input $input = null, Output $output = null): string
    {
        echo "отработал метод" . $this::getName();
        return " Ok!";
    }
}