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
        echo "Hello!! It is Http Kernel...";
        return "Hi!! It is Http Kernel...";
    }

    /**
     * @return string
     */
    public function getCurrentStub(): string
    {
        $stub = new Stub($this->app);
        return $stub->getDocumentResult();
    }

    /**
     * Завершение работы приложения вывод результата пользователю
     * @param $request
     * @param $response
     * @return void
     */
    public function terminate($request = null, $response = null)
    {
        $this->app->terminate();
        exit($response);
    }
}