<?php

namespace Stub\Framework\Contracts\Console;

/**
 * Интерфейс объекта исходящего потока консоли терминала
 */
interface Output
{
    /**
     * Печатает строку в консоли
     * @param string|array $message
     * @return mixed
     */
    public function write($message);

    /**
     * Печатает строку в консоли и переводит строку автоматически
     * @param $message
     * @return mixed
     */
    public function writeln($message);

}