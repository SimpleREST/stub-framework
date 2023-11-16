<?php

namespace Stub\Framework\Main;

use Stub\Framework\Contracts\Main\Application as BaseApplicationContract;
use Stub\Framework\Contracts\Main\UserEditable;

/**
 * Основной класс приложения (единый для консоли, http  rest APi
 *
 */
class Application implements BaseApplicationContract
{
    /**
     * The SimpleStub framework version.
     *
     * @var string
     */
    const VERSION = '0.1.3';

    /**
     * The base path for the SimpleStub installation.
     *
     * @var string
     */
    protected $basePath;

    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The application configuration object.
     *
     * @var string
     */
    private $config;

    /**
     * Конструктор экземпляра класса приложения
     * @param $basePath
     */
    public function __construct($basePath)
    {
        if ($basePath) {
            $this->basePath = rtrim($basePath, '\/');
        }
    }

    /**
     * Возвращает строку версии фреймворка
     * @return string
     */
    public function version(): string
    {
        return self::VERSION;
    }

    /**
     * Метод пока пустой, зарезервирован на будущее развитие приложения
     * однако вызовы на него стоят, давая возможность будущей реализации
     * операций выполняемых при закрытии приложения (без необходимости
     * переписывать проект, внося изменения во фреймворк)
     * @return void
     */
    public function terminate()
    {

    }

    public function basePath(string $path = ''): string
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

    public function setConfig(MainConfig $param)
    {
        $this->config = $param;
    }

    public function getConfig():UserEditable
    {
        return $this->config;
    }
}