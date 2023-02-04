<?php

namespace Stub\Framework\Console\Base;

class Output implements \Stub\Framework\Contracts\Console\Output
{
    protected static $_instance;

    private function __construct()
    {
    }

    public static function getInstance(): Output
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * Выводит в консоль строку сообщения
     * ----------------------------------
     * @param string|array $message Строка сообщения для вывода в консоль
     * @param bool $newline Флаг / признак необходимости выполнить перевод
     * каретки на новую строку по окончании вывода сообщения
     * @return void
     */
    public function write($message, bool $newline = false)
    {
        if ($newline) {
            $this->writeln($message);
        } else {
            echo $message;
        }
    }

    /**
     * Выводит в консоль строку сообщения с последующим переводом каретки на новую строку.
     * ----------------------------------
     * @param string|array $message Строка сообщения для вывода в консоль
     * @return void
     */
    public function writeln($message)
    {
        if (is_array($message)) {
            var_dump($message);
        } else {
            echo $message;
            echo "\r\n";
        }

    }

    /**
     * Выводит в консоль строку сообщения, но каретку возвращает в начало строки
     * ----------------------------------
     * метод подходит для вывода динамических данных изменение которых требует
     * перезаписи значения вывода.
     * @param string $message
     * @return void
     */
    public function writels(string $message)
    {
        echo $message;
        echo "\r";
    }

    /**
     * Выводит прогреc бар вида6 [наименование процесса] ....         50%
     * ---
     *
     * @param int $percent Численное значение процента выполнения процесса [от 0 до 100], иные значения будут приведены
     * к ближайшему пределу (110->100, -20 -> 0) значения отличных от INT типов вызовут исключение
     * @param string|null $name Наименование процесса для прогессбара, в случае если требуется его отобразить в именно
     * в строке прогресс бара, в противном случае параметр указывать нет необходимости, он будет заменен на пустую строку.
     * Либо можно поставить вместо наименования отступ (пустой или форматированный)
     * @param int|null $totalLengthStringProgressBar Общая итоговая длина прогресс бара в символах (не обязателен)
     * @return void
     */
    public function writeProgressLine(int $percent, string $name = "", int $totalLengthStringProgressBar = null)
    {
        if ($percent > 100) $percent = 100;
        if (!$totalLengthStringProgressBar) $totalLengthStringProgressBar = 90;
        $lineLength = $totalLengthStringProgressBar - strlen($name) - 4;
        echo $name . " ";
        for ($i = 0; $i <= $lineLength; $i += 2) {
            echo ". ";
        }
        if ($percent == 100) {
            echo "DONE";
        } else {
            echo $percent . "%";
        }
        echo "\r";
    }

    /**
     * Выводит прогреc бар вида6 [наименование процесса] ....         50%
     * ---
     *
     * @param int $percent Численное значение процента выполнения процесса [от 0 до 100], иные значения будут приведены
     * к ближайшему пределу (110->100, -20 -> 0) значения отличных от INT типов вызовут исключение
     * @param string|null $name Наименование процесса для прогессбара, в случае если требуется его отобразить в именно
     * в строке прогресс бара, в противном случае параметр указывать нет необходимости, он будет заменен на пустую строку.
     * Либо можно поставить вместо наименования отступ (пустой или форматированный)
     * @param int|null $totalLengthStringProgressBar Общая итоговая длина прогресс бара в символах (не обязателен)
     * @return void
     */
    public function writeProgressLineD(int $percent, string $name = "", int $totalLengthStringProgressBar = null)
    {
        if ($percent > 100) $percent = 100;
        if (!$totalLengthStringProgressBar) $totalLengthStringProgressBar = 90;
        $lineLength = $totalLengthStringProgressBar - strlen($name) - 4;
        $zch = $lineLength * $percent / 100;
        $pch = $lineLength - $zch;
        echo str_pad($name . " ", strlen($name) + $zch, ".");
        echo str_pad(" ", $pch, " ", STR_PAD_LEFT);
        if ($percent == 100) {
            echo "DONE";
        } else {
            echo str_pad($percent . "%", 4);
        }
        echo "\r";
    }

}