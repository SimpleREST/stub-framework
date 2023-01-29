<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\ConsoleTextBackgroundColorsEnum;
use Stub\Framework\Console\Base\ConsoleTextForegroundColorsEnum;
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
        $resultString = "SimpleStub Framework " . SD::green(Application::VERSION) . "\r\n\n";
        $resultString .= SD::brown("Usage:\r\n");
        $resultString .= "command [options] [arguments]\r\n\n";
        $resultString .= SD::brown("Options:\r\n");
        $resultString .= "  " . str_pad(SD::green("-h, --help"), 32);
        $resultString .= "Показать справку для выбранной команды, если команда не задана, будет выполнена команда" . SD::green("list") . "\r\n";
        $resultString .= "  " . str_pad(SD::green("-q, --quiet"), 32);
        $resultString .= "Блокировать (не выводить / игнорировать) все сообщения (генерируемые при выполнении команды)\r\n";
        $resultString .= "  " . str_pad(SD::green("-V, --version"), 32);
        $resultString .= "Вывести версию приложения (команда в данном случае не важна)\r\n";
        $resultString .= "  " . str_pad(SD::green("-n, --no-interaction"), 32);
        $resultString .= "Не задавать никаких вопросов (блокировать интерактивный режим)\r\n\n";

        //полный список классов
        //$classes = $this->getAllClasses();
        // сортируем список на предмет наличия только искомого пространства имен
        $fclasses = $this->getClassesByNamespace("Stub\Framework\Console\Commands");
        $resultString .= SD::brown("Available commands:") . "\r\n";
        foreach ($fclasses as $fclass) {
            //$resultString .= "Найден класс команды в пространстве имен" . SD::brown($fclass) . "\r\n";
            /** @var Commands $currentClass */
            $currentClass = new $fclass();
            $resultString .= "  " . str_pad(SD::green($currentClass->name), 32);
            $resultString .= $currentClass->description . "\r\n";
        }
        // формируем результирующую строку

        var_dump($fclasses);
        $sortclasses = $this->sortCommandsByGroup($fclasses, "Stub\Framework\Console\Commands");
        echo "ОТСОРТИРОВАННЫЕ КЛАССЫ";
        var_dump($sortclasses);
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
        var_dump($allClasses);
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

    private function sortCommandsByGroup(array $prepareArrayCommandClasses, $namespace): array
    {
        if (0 !== strpos($namespace, '\\')) {
            $namespace = '\\' . $namespace;
        }
        $resultClasses = array();
        foreach ($prepareArrayCommandClasses as $class) {
            $group = str_replace($namespace, "", $class);
            //echo "Обрезаемая строка сзади";
            //echo strrpos($group,'\\',1);
            //$group = substr($group, strrpos($group,'\\',1));
            $group = str_replace(substr($group, strrpos($group,'\\',1)), "", $group);
            //$group = str_replace(strrpos($group,'\\',1), "", $group);
            if (isset($resultClasses[$group])){
                $currentArr = $resultClasses[$group];
                $currentArr[] = $class;
                $resultClasses[$group] = $currentArr;
            } else {
                $resultClasses[$group] = array($class);
            }
        }
        return $resultClasses;
    }
}