<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\ConsoleTextBackgroundColorsEnum as BackgroundColor;
use Stub\Framework\Console\Base\ConsoleTextForegroundColorsEnum as TextColor;
use Stub\Framework\Console\Base\StringDecorator as SD;
use Stub\Framework\Contracts\Console\Commands;
use Stub\Framework\Main\Application;

class ListCommand extends Command implements Commands
{
    public function __construct()
    {
        $this->name = "list";
        $this->description = "Выводит список всех доступных команд консольного приложения";
    }

    public function run(): string
    {
        $resultString = "SimpleStub Framework " . SD::green(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::red(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::yellow(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::blue(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::brown(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::purple(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::color(Application::VERSION) . "\r\n";
        $resultString .= "SimpleStub Framework " . SD::color(Application::VERSION,
                TextColor::CYAN,
                BackgroundColor::MAGENTA) . "\r\n";
        //полный список классов
        $classes = $this->getAllClasses();
        // сортируем список на предмет наличия только искомого пространства имен
        $fclasses = $this->getClassesByNamespace("Stub\Framework\Console\Commands");
        // формируем результирующую строку
        //var_dump($fclasses);
        return $resultString;
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

    private function getClassesByNamespace(string $namespace): array
    {
        if (0 !== strpos($namespace, '\\')) {
            $namespace = '\\' . $namespace;
        }

        $termUpper = strtoupper($namespace);
        return array_filter($this->getAllClasses(), function ($class) use ($termUpper) {
            $className = strtoupper($class);
            if (
                0 === strpos($className, $termUpper) and
                false === strpos($className, strtoupper('Abstract')) and
                false === strpos($className, strtoupper('Interface'))
            ) {
                return $class;
            }
            return false;
        });
    }
}