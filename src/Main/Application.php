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
    const VERSION = '0.0.10';

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
        $this->params = include_once($this->basePath.'\config\config.php');
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
        };
        $formattedVersionString .= "/" . static::VERSION;
        return $formattedVersionString;
    }

    public function terminate(): string
    {
        return "Работа приложения завершается!";
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
     *Выполнение конкретной команды
     * @return int
     */
    public function run(): int
    {
        echo "Нужно получить собственно наименование команды и перечень параметров команды из argv ";
        return 1;
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