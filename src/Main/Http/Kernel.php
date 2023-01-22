<?php

namespace Stub\Framework\Main\Http;

use DateTime;
use Stub\Framework\Contracts\Main\Application;
use Stub\Framework\Http\View\Stub;

/**
 * Класс ядра НТТР
 */
class Kernel implements \Stub\Framework\Contracts\Http\Kernel
{
    /**
     * Содержит экземпляр класса приложения
     * @var Application
     */
    protected $app;

    /**
     * Дата и время старта обрабатываемого запроса
     * @var DateTime|Null
     */
    protected $requestStartedDateTime;

    /**
     * Создает новый экземпляр ядра HTTP
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return void
     */
    public function hendle()
    {
        $this->requestStartedDateTime = new DateTime();

    }

    /**
     * @return string
     */
    public function sayHello(): string
    {
//        echo "Hello!! It is Console Kernel...";
//        return "Hi!! It is Console Kernel...";
        $stub = new Stub($this->app);
        $stub->generate($this->app);
        echo $stub->getDocumentResult();

        return "";
    }
}