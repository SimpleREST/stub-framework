<?php

namespace Stub\Framework\Console\Base;

/**
 * Класс входного потока данных консоли
 * Реализован паттерн singleton
 * Аргумент - у приложения может быть один и только один входной поток, по крайней мере класс это точно.
 * Сам инстанс хранится в статическом поле класса, приватный, доступен только через геттер.
 *
 */
class Input implements \Stub\Framework\Contracts\Console\Input
{
    /**
     * Хранит запрос консоли целиком, не обработанный
     * @var mixed
     */
    private $baseResult;
    /**
     * Хранит инстанс входного потока
     * @var \Stub\Framework\Contracts\Console\Input
     */
    protected static $_instance;

    /**
     * Приватный конструктор класса, доступен только изнутри
     *
     */
    private function __construct()
    {
        $this->baseResult = $_SERVER['argv'];
    }

    /**
     * Возвращает инстанс входного потока
     * @return Input
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * Признак непустой командной строки
     * @return bool
     */
    public function hasCommandLine(): bool
    {
        return false;
    }

    /**
     * Признак присутствия команды
     * @return bool
     */
    public function hasCommands(): bool
    {
        return false;
    }

    /**
     * Признак присутствия как минимум одной опции
     * @return bool
     */
    public function hasOptions(): bool
    {
        return false;
    }

    /**
     * Признак присутствия как минимум одного аргумента
     * @return bool
     */
    public function hasArguments(): bool
    {
        return false;
    }

    /**
     * Возвращает массив аргументов командной строки (не обработанный)
     * @return array
     */
    public function getArguments(): array
    {
        return $this->baseResult;
    }
}