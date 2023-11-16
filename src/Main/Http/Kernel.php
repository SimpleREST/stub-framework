<?php

namespace Stub\Framework\Main\Http;

use DateTime;
use Stub\Framework\Contracts\Main\Application;
use Stub\Framework\Contracts\Main\UserEditable;
use Stub\Framework\Http\View\Stub;
use Stub\Framework\Main\Assets\BaseDefaultStubResource;
use Stub\Framework\Main\MainConfig;

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

    private $config;

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
     * Возвращает в виде строки готовый код заглушки
     * @param BaseDefaultStubResource $r набор строковых параметров для заглушки (модифицированный)
     * @return string
     */
    public function getCurrentStub(BaseDefaultStubResource $r): string
    {
        $stub = "";
        if (!empty($this->app)) {
            $stub = new Stub($this->app, $r);
        }
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

    public function setConfig(MainConfig $param)
    {
        $this->config = $param;
        $this->app->setConfig($param);
    }

    public function getConfig(): UserEditable
    {
        return $this->app->getConfig();
    }
}