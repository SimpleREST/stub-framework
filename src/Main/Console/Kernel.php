<?php

namespace Stub\Framework\Main\Console;

use DateTime;
use Stub\Framework\Console\Base\Command;
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
     * @var InputContract
     */
    protected $input;

    /**
     * @var OutputContract
     */
    protected $output;

    /**
     * Создает новый экземпляр ядра консоли
     * @param Application $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->input = Input::getInstance();
        $this->output = Output::getInstance();
        self::handle();
    }

    public function handle()
    {
        $this->commandStartedDateTime = new DateTime();
        try {
            $this->output->writeln($this->input->getArguments()[1]);
            $className = "Stub\Framework\Console\Commands\\".$this->input->getArguments()[1] . 'Command';
            $this->output->writeln($className);
            $this->execute(new $className());
        } catch (Throwable $e) {
            $this->output->writeln("Это на случай если ошибка возникнет, ее нужно передать на обработку (оформление) добавить к ней
             данные разные окружения и уже потом выдать на гора...");
        }
    }

    protected function execute(Command $command)
    {
        $this->output->writeln("Инициирую обращение к геттеру имени команды \r\n");
        $this->output->writeln($command->getName());
        $this->output->writeln("Инициирую обращение к основному методу команды \r\n");
        $this->output->writeln($command->run());
        $this->output->writeln("Завершаю выполнение команды");
    }

    public function sayHello(): string
    {
        $this->output->writeln("Hello!! It is Console Kernel...");
        return "Hi!! It is Console Kernel...";
    }

    /**
     * Завершение работы приложения вывод результата пользователю
     * @param $request
     * @param $response
     * @return void
     */
    public function terminate($request, $response)
    {
        exit($response);
    }
}