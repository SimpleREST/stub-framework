<?php

namespace Stub\Framework\Console\Base;
/**
 * --------------------------------------------------------------------------
 * Класс консоли терминала
 * --------------------------------------------------------------------------
 *
 * Для тестирования и обкатки решений по выделению полезных общих функций по
 * декорированию вывода данных в консоль данный класс внедрен в проект SimpleStub
 * так сказать напрямую, в дальнейшем данный класс иже с ним планируется оформить отдельной
 * библиотекой
 *
 */
class Terminal
{
    private static $width = null;
    private static $height = null;

    public function __construct()
    {
        $this->readFromProcess('mode CON');
    }

    /**
     * Возвращает текущее значение ширины экрана терминала в символах, или при невозможности определения,
     * вернет базовое предустановленное значение равное 80 символам.
     * @return null
     */
    public static function getWidth(): ?int
    {
        $width = getenv('COLUMNS');
        if (false !== $width) {
            return (int)trim($width);
        }

        if (null === self::$width) {
            self::initConsoleDimensions();
        }

        return self::$width ?: 80;
    }

    /**
     * Возвращает текущее значение высоты экрана терминала в строках, или при невозможности определения,
     * вернет базовое предустановленное значение равное 6 строкам.
     * @return null
     */
    public static function getHeight(): ?int
    {
        return self::$height ?: 6;
    }


    function readFromProcess($command)
    {
        if (!\function_exists('proc_open')) {
            return null;
        }

        $descriptorspec = [
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open($command, $descriptorspec, $pipes, null, null, ['suppress_errors' => true]);
        if (!\is_resource($process)) {
            return "ого нету ничего...";
        }

        $info = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);

        return $info;
    }

    /**
     * Получение параметров консоли, реализация пока только для windows
     *
     * @return int[]|null Возвращает массив значений параметров следующего содержания:
     * Состояние устройства CON:
     * --------------------------
     * Строки:
     * Столбцы:
     * Скорость клавиатуры:
     * Задержка клавиатуры:
     * Кодовая страница:
     *
     *  Элемент массив [0] содержит все сообщение целиком (String)
     *  Элементы массива [1],[2], [3], [4] и [5] содержат перечисленные ниже заголовка сообщения параметры
     *  соответственно. (String) в пределах данного метода преобразование типов не выполняется.
     */
    private static function getConsoleMode(): ?array
    {
        $info = self::readFromProcess('MODE CON');

        if (null === $info || !preg_match('/--------+\r?\n.+?(\d+)\r?\n.+?(\d+)\r?\n/', $info, $matches)) {
            return null;
        }
        echo "Команда MODE CON -  успешно выполнена \n";
        echo $info;
        return $matches;
    }

    private static function initConsoleDimensions()
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
            if (null !== $dimensions = self::getConsoleMode()) {
                // В данном случае извлекается пока только высота в строках и ширина в символах
                self::$width = (int)$dimensions[0];
                self::$height = (int)$dimensions[1];
            }
        } else {
            echo "Не получилось пока";
        }
    }
}