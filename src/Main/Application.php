<?php

namespace Stub\Framework\Main;

use Stub\Framework\Contracts\Main\Application as BaseApplicationContract;

class Application implements BaseApplicationContract
{
    /**
     * The SimpleStub framework version.
     *
     * @var string
     */
    const VERSION = '0.0.5';

    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace;

    public function version(): string
    {
        return static::VERSION;
    }

    public function terminate(): string
    {
        return "Работа приложения завершается!";
    }

    public function basePath($path = ''): string
    {
        return "Это метод пригодится позже, сейчас зарезервирован";
    }

    public function getLocale()
    {
        return setlocale(LC_ALL, 0);
    }

    public function getNamespace(): string
    {
        return __NAMESPACE__;
    }

    /**
     * Временно тестовый метод
     *
     * @return void
     * @var string $commandString
     */
    public function execute(string $commandString)
    {
        echo $commandString;
    }

    /**
     *Выполнение конкреттной команды
     * @return int
     */
    public function run(): int
    {
        echo "Нужно получить собственно наименование команды и перечень параметров команды из argv ";
        return 1;
    }
}