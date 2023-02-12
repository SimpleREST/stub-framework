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
    public static $title = "Hände hoch!!! Ausweis!";

}