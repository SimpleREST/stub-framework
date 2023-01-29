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
    public static function red($string): string
    {
        return "\033[" . ConsoleTextForegroundColorsEnum::RED . "m" . $string . "\033[0m";
    }

    public static function green($string): string
    {
        return "\033[" . ConsoleTextForegroundColorsEnum::GREEN . "m" . $string . "\033[0m";
    }

    public static function yellow($string): string
    {
        return "\033[" . ConsoleTextForegroundColorsEnum::YELLOW . "m" . $string . "\033[0m";
    }

    public static function blue($string): string
    {
        return "\033[" . ConsoleTextForegroundColorsEnum::BLUE . "m" . $string . "\033[0m";
    }

    public static function purple($string): string
    {
        return "\033[" . ConsoleTextForegroundColorsEnum::PURPLE . "m" . $string . "\033[0m";
    }

    public static function brown($string): string
    {
        return "\033[" . ConsoleTextForegroundColorsEnum::BROWN . "m" . $string . "\033[0m";
    }

    public static function color($colorableString, string $foregroundColorsEnum = null, string $backgroundColorsEnum = null): string
    {
        $coloredString = "";
        if (isset($foregroundColorsEnum)) {
            $coloredString .= "\033[" . $foregroundColorsEnum . "m";
        }
        if (isset($backgroundColorsEnum)) {
            $coloredString .= "\033[" . $backgroundColorsEnum . "m";
        }
        $coloredString .= $colorableString . "\033[0m";

        return $coloredString;
    }
}