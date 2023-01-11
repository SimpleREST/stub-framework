<?php

namespace Stub\Framework\Main\Console;

use Stub\Framework\Contracts\Main\Application;

class Kernel implements \Stub\Framework\Contracts\Console\Kernel
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        self::hi();
    }

    public function hi()
    {
        echo "Привет!!! Результат есть!";
    }
}