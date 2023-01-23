<?php

namespace Stub\Framework\Main\Console;

use DateTime;
use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;
use Stub\Framework\Contracts\Console\Input as InputContract;
use Stub\Framework\Contracts\Console\Output as OutputContract;
use Stub\Framework\Contracts\Main\Application;
use Throwable;

/**
 * Класс ядра консоли
 */
class Kernel implements \Stub\Framework\Contracts\Console\Kernel
{
    /**
     * Содержит экземпляр класса приложения
     * @var Application
     */
    protected $app;

    /**
     * Дата и время старта обрабатываемой команды
     * @var DateTime|Null
     */
    protected $commandStartedDateTime;

    /**
     * Создает новый экземпляр ядра консоли
     * @param Application $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        self::handle(Input::getInstance(), Output::getInstance());
    }

    public function handle(InputContract $input, OutputContract $output)
    {
        $this->commandStartedDateTime = new DateTime();
        try {
            echo "Из потока ввода беру набор команд т.е. конкретно то, что мне выдаст метод ";
            echo "И именно под защитой данной конструкции выполняем непосредственно передачу команды 
            на отработку приложению";
        } catch (Throwable $e) {
            echo "Это на случай если ошибка возникнет, ее нужно передать на обработку (оформление) добавить к ней
             данные разные окружения и уже потом выдать на гора...";
        }
    }

    public function sayHello(): string
    {
        echo "Hello!! It is Console Kernel...";
        return "Hi!! It is Console Kernel...";
    }
}