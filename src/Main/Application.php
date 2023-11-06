<?php

namespace Stub\Framework\Main;

use Stub\Framework\Contracts\Main\Application as BaseApplicationContract;

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
    const VERSION = '0.1.1';

    /**
     * Массив конфигурационных параметров заглушки
     * @var array $params [mixed]
     */
    private $params;

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
     * Конструктор экземпляра класса приложения
     * @param $basePath
     */
    public function __construct($basePath)
    {
        if ($basePath) {
            $this->basePath = rtrim($basePath, '\/');
        }
        $this->params = include_once($this->basePath . '\config\config.php');
    }

    /**
     * Возвращает форматированную строку версии приложения / фреймворка
     * @return string
     */
    public function version(): string
    {
        $formattedVersionString = "";
        if (defined('STUB_APP_VERSION')) {
            $formattedVersionString = STUB_APP_VERSION;
        }
        $formattedVersionString .= "/" . static::VERSION;
        return $formattedVersionString;
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

    /**
     * Gets the value of the configuration parameter.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function get(string $key, $default = null)
    {
        return $this->params[$key] ?: $default;
    }
}