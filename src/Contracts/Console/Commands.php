<?php

namespace Stub\Framework\Contracts\Console;

use Stub\Framework\Console\Base\Input;
use Stub\Framework\Console\Base\Output;

/**
 * @property string $name
 * @property string $shortName
 * @property string $description
 */
interface Commands
{

    /** Основное действие команды
     *----
     * @param Input|null $input Входящий поток
     * @param Output|null $output Исходящий поток (представление в консоль)
     * @return string
     */
    public function run(Input $input = null, Output $output = null): string;
    public function getName(): string;

}