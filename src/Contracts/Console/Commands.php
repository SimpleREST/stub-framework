<?php

namespace Stub\Framework\Contracts\Console;

/**
 * @property string $name
 * @property string $shortName
 * @property string $description
 */
interface Commands
{
    /**
     * Возвращает форматированную для консоли строку описания команды
     *
     * @return string
     */
    public function getConsoleDescriptionString(): string;

    /**
     * Базовое действие команды
     *
     * @return string
     */
    public function run(): string;
}