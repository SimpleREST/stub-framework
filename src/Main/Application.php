<?php

namespace Stub\Framework\Main;

use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;
use Stub\Framework\Contracts\Main\Application as BaseApplicationContract;

class Application implements BaseApplicationContract
{
    /**
     * The SimpleStub framework version.
     *
     * @var string
     */
    const VERSION = '0.0.6';

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
     * Поток ввода.
     *
     * @var Input
     */
    private static $input;

    /**
     * Поток вывода.
     *
     * @var Output
     */
    private static $output;

    public function __construct($basePath)
    {
//        self::$input = Input::getInstance();
//        self::$output = Output::getInstance();
        $this->params = include_once('./../config/config.php');
        if ($basePath) {
            $this->basePath = rtrim($basePath, '\/');
        }
    }

    public function version(): string
    {
        $formattedVersionString = "";
        if (defined('STUB_APP_VERSION')) {
            $formattedVersionString = STUB_APP_VERSION;
        };
        $formattedVersionString .= "/" . static::VERSION;
        return $formattedVersionString;
    }

    /**
     * @return Input|null
     */
    public static function getInput(): Input
    {
        return self::$input;
    }

    /**
     * @return Output
     */
    public static function getOutput(): Output
    {
        return self::$output;
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