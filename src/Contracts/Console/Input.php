<?php

namespace Stub\Framework\Contracts\Console;

/**
 * Интерфейс объекта входящего потока консоли терминала
 */
interface Input
{
    /**
     * Возвращает истина если командная строка вообще содержит данные
     * @return bool
     */
    public function hasCommandLine(): bool;

    /**
     * Возвращает Истина если командная строка содержит нечто похожее на команду
     * @return bool
     */
    public function hasCommands(): bool;

    /**
     * Возвращает истина если командная строка содержит опции команды
     * @return bool
     */
    public function hasOptions(): bool;

    /**
     * Возвращает Истина если командная строка содержит аргументы команды
     * @return bool
     */
    public function hasArguments(): bool;

    /**
     * Возвращает весь набор аргументов введенный в командной строке
     * @return array
     */
    public function getArguments(): array;


}