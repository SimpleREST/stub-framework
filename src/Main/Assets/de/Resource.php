<?php

namespace Stub\Framework\Main\Assets\De;

use Stub\Framework\Contracts\Main\ContainingResources;

class Resource extends \Stub\Framework\Main\Assets\Resource implements ContainingResources
{
    /**
     * Предопределенное значение строкового параметра
     * ---
     * внутри HTML тега (<TITLE>...</TITLE>)
     * (На уровне фреймворка)
     * @final @var string
     */
    public static $title_text = "Hände hoch!!! Ausweis!";
    /**
     * Строки / набор для DE локализации / фреймворк
     * ----
     * Значение строки (языковой код) внутри тега {HTML}
     * ----
     * @var string
     */
    public static $html_lang = "de";

}