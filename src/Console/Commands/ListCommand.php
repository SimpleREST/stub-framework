<?php

namespace Stub\Framework\Console\Commands;

use Stub\Framework\Console\Base\Command;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;
use Stub\Framework\Console\Base\StringDecorator as SD;
use Stub\Framework\Contracts\Console\Commands;
use Stub\Framework\Main\Application;

class ListCommand extends Command
{
    public function __construct()
    {
        $this->name = "list";
        $this->description = "Выводит список всех доступных команд консольного приложения";
    }

    /**
     * Основной метод команды
     *--------------------------------------------------------------------------------
     * Формирует список всех доступных в текущей версии SimpleStub Framework команд
     * с общей информацией о действиях команд ыи параметрах.
     *
     * Детальная информация по каждой команде может быть получена при использовании команды
     * help с передачей в качестве параметра ей наименования команды, справку по которой
     * нужно получить.
     * @return string - возвращает отформатированную для консоли строку результата.
     */
    public function run(Input $input = null, Output $output = null): string
    {
        $resultString = "SimpleStub Framework " . SD::green(Application::VERSION) . "\r\n\n";
        $resultString .= SD::brown("Usage:\r\n");
        $resultString .= "command [options] [arguments]\r\n\n";
        $resultString .= SD::brown("Options:\r\n");
        $resultString .= "  " . str_pad(SD::green("-h, --help"), 32);
        $resultString .= "Показать справку для выбранной команды, если команда не задана, будет выполнена команда"
            . SD::green("list") . "\r\n";
        $resultString .= "  " . str_pad(SD::green("-q, --quiet"), 32);
        $resultString .= "Блокировать (не выводить / игнорировать) все сообщения (генерируемые при выполнении команды)\r\n";
        $resultString .= "  " . str_pad(SD::green("-V, --version"), 32);
        $resultString .= "Вывести версию приложения (команда в данном случае не важна)\r\n";
        $resultString .= "  " . str_pad(SD::green("-n, --no-interaction"), 32);
        $resultString .= "Не задавать никаких вопросов (блокировать интерактивный режим)\r\n\n";

        $prepareListCommand = $this->getClassesByNamespace(__NAMESPACE__);
        if (empty($prepareListCommand)) {
            $resultString .= SD::red("ДОСТУПНЫХ КОМАНД НЕТ!") . "\r\n";
        } else {
            $resultString .= SD::brown("Available commands:") . "\r\n";
            $sortedAvailableClasses = $this->sortCommandsByGroup($prepareListCommand, __NAMESPACE__);
            foreach ($sortedAvailableClasses as $key => $value) {
                $resultString .= SD::brown($key) . "\r\n";
                foreach ($value as $commandClass) {
                    /** @var Commands $currentClass */
                    $currentClass = new $commandClass();
                    $resultString .= "  " . str_pad(SD::green($currentClass->name), 32);
                    $resultString .= $currentClass->description . "\r\n";
                }
            }
        }
        $output->writeln($resultString);
        return "OK";
    }

    /**
     * Возвращает массив всех классов приложения
     *--------------------------------------------------------------------------------
     * Для работы этого метода используется автозагрузчик ***composer***.
     *
     * ***Важно!!!***
     * Должен быть сгенерирован оптимизированный автозагрузчик, используя опцию для работы со всеми классами.
     * ***composer dump-autoload -o ***
     * @return array
     */
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

    /**
     * Возвращает массив классов заданного пространства имен
     *--------------------------------------------------------------------------------
     * Формирует одномерный массив содержащий пространства имен классов входящих в заданное пространство имен
     * @param string $namespace - строка пространства имен в котором нужно искать все классы
     * @return array - результирующий массив пространств имен классов входящих в заданное
     */
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

    /**
     * Сортирует классы команд по группам
     *--------------------------------------------------------------------------------
     *
     * сортировка происходит на основании указанного в каждом классе пространства имен
     * @param array $prepareArrayCommandClasses Одномерный массив (пространств имен отобранных классов)
     * @param string $namespace Исключаемый из наименований групп корень (базовое пространство имен)
     * @return array Двумерный ассоциативный массив где key - это группа команд, value - одномерный
     * массив пространств имен классов команд, входящих в группу.
     */
    private function sortCommandsByGroup(array $prepareArrayCommandClasses, string $namespace): array
    {
        if (0 !== strpos($namespace, '\\')) {
            $namespace = '\\' . $namespace;
        }
        $resultClasses = array();
        foreach ($prepareArrayCommandClasses as $class) {
            $group = str_replace($namespace, "", $class);
            $group = str_replace(substr($group, strrpos($group, '\\', 1)), "", $group);
            if (isset($resultClasses[$group])) {
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