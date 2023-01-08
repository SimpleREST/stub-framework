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
    const VERSION = '0.0.1';

    public function version()
    {
        return static::VERSION;
    }

    public function terminate()
    {
        return "Работа приложения завершается!";
    }
}