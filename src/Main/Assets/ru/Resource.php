<?php

namespace Stub\Framework\Main\Assets\Ru;

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
    public static $title_text = "Сайт находится в стадии разработки";
    /**
     * Строки / набор для RU локализации / фреймворк
     * ----
     * Значение строки (языковой код) внутри тега {HTML}
     * ----
     * @var string
     */
    public static $lang = "ru";

}