<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\StringDecorator as SD;
use Stub\Framework\Main\Application;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

/**
 *
 */
class CountdownCommand extends Command
{
    public function __construct()
    {
        $this->name = "countdown";
        $this->description = "Управляет таймером обратного отсчета текущей активной заглушки";
    }

    /**
     * Основной метод команды управления таймером обратного отсчета
     *--------------------------------------------------------------------------------
     * @return string - технический отчет о выполнении команды
     */
    public function run(Input $input = null, Output $output = null): string
    {
        //из потока ввода берем передаваемый параметр
        // это может быть команда off - выключить таймер
        // это может быть команда on - включить таймер
        // может быть set - установить конкретную дату
        // может быть set hour - установить на час
        // может быть set day - установить сутки
        // может быть set month - установить месяц
        // может быть set year - установить год

        $resultString = "SimpleStub Framework " . SD::green(Application::VERSION) . "\r\n\n";
        $resultString .= "Получена команда " . SD::green($input->getArguments()[1]) . "\r\n\n";
        $output->writeln($resultString);
        parent::run();
        return $resultString;
    }
}