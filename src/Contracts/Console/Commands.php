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
     * Базовое действие команды
     *
     * @return string
     */
    public function run(): string;
}