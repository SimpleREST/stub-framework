<?php

namespace Stub\Framework\Console\Base;

/**
 * --------------------------------------------------------------------------
 * Данный класс - предназначен для облегчения декорирования и форматирования результатов вывода строковых данных в консоль
 * --------------------------------------------------------------------------
 *
 * Для тестирования и обкатки решений по выделению полезных общих функций по
 * декорированию вывода данных в консоль данный класс внедрен в проект SimpleStub
 * так сказать напрямую, в дальнейшем данный класс иже с ним планируется оформить отдельной
 * библиотекой
 *
 */
class StringDecorator
{
    public function red($string): string
    {
        return ConsoleTextForegroundColorsEnum::RED . $string . ConsoleTextForegroundColorsEnum::BLACK;
    }

    public function green($string): string
    {
        return ConsoleTextForegroundColorsEnum::GREEN . $string . ConsoleTextForegroundColorsEnum::BLACK;
    }

    public function yellow($string): string
    {
        return ConsoleTextForegroundColorsEnum::YELLOW . $string . ConsoleTextForegroundColorsEnum::BLACK;
    }

    public function blue($string): string
    {
        return ConsoleTextForegroundColorsEnum::BLUE . $string . ConsoleTextForegroundColorsEnum::BLACK;
    }
}