<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Contracts\Console\Commands;

class ListCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "list";
        $this->description = "Выводит список всех доступных команд консольного приложения";
    }

    public function run(): string
    {
        var_dump($this->getAllClasses());
        return " Ok!";
    }

    private function getAllClasses(): array
    {
        global $composer;
        $classes = array_keys($composer->getClassMap());
        $allClasses = [];
        if (false === empty($classes)) {
            foreach ($classes as $class) {
                $allClasses[] = '\\' . $class;
            }
        }
        return $allClasses;
    }
}