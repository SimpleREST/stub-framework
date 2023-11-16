<?php

namespace Stub\Framework\Console\Base;

use Stub\Framework\Contracts\Console\Commands;

/**
 * Абстрактный класс для всех команд
 * ---
 * Класс:
 * - содержит реализации общих методов для всех команд;
 * - инициирует все свойства команд, общие для всех команд;
 * - имплементируют общий для всех интерфейс;
 *
 */
abstract class Command implements Commands
{
    /**
     * Имя команды (собственно сама команда как есть)
     *
     * @var string
     */
    protected $name;

    /**
     * Описание команды
     *
     * @var string
     */
    protected $description;

    /**
     * Возвращает описание команды
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Возвращает имя команды
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Основной рабочий метод родительского класса команды
     * --
     * @param Input|null $input
     * @param Output|null $output
     * @return string
     */
    public function run(Input $input = null, Output $output = null): string
    {
        return "Empty...";
    }


}