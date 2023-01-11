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
    const VERSION = '0.0.2';

    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace;

    public function version()
    {
        return static::VERSION;
    }

    public function terminate()
    {
        return "Работа приложения завершается!";
    }

    public function basePath($path = '')
    {
        return "Это метод пригодится позже, сейчас зарезервирован";
    }

    public function getLocale()
    {
        return setlocale(LC_ALL, 0);
    }

    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * Временно тестовый метод
     *
     * @var string
     */
    public function execute($commandString)
    {
        echo $commandString;
    }
}