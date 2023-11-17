<?php

namespace Stub\Framework\Main;

use Stub\Framework\Contracts\Config\ReadableConfiguration;

abstract class MainConfig implements ReadableConfiguration
{
    /**
     * @var array[]
     * Набор локализационных ресурсов (строк) и указание наименований языковых реализаций для выбора.
     * Формат: 'Ru' => 'RU' Ключ массива директория языкового набора,
     * текстовое значение массива - представление языка страницы в поле выбора значения
     * Порядок, в котором представлены элементы массива, определяет последовательность,
     * в которой будут указаны языки в поле выбора локализации
     * Примечание: массив может быть пустым, в этом случае поле выбора языка на странице не
     * отображается и строковые ресурсы принимают назначения языка по умолчанию
     * т.е. предустановленные SimpleStub Framework значения.
     */
    private static $languageSet = array();
    private static $defaultLanguage = "";
    private static $isADBLanguageEnabled = true;
    private static $isLanguageSelectorEnabled = false;
    private static $isResourceLocaleEnabled = false;

    /**
     * Устанавливает порядок и вид представления локализации ресурса (Наименование языка в поле выбора)
     * Порядок следования элементов массива важен, именно в этом порядке они и будут выстраиваться в поле выбора
     * Этот метод при конфигурировании необязателен. При отсутствии ресурсов или при отсутствии настройки
     * данного параметра, поле выбора языка просто не будет отражено, и будет применен дефолтный набор строковых
     * параметров определенный SimpleStub Framework и минимальными настройками пользователя.
     * @param array $languageSet
     * @return void
     */
    protected static function setLanguageSet(array $languageSet)
    {
        self::$languageSet = $languageSet;
    }

    /**
     * Устанавливает язык по умолчанию, в случае если язык не определен автоматически на основании настроек
     * браузера, или отсутствует параметр указателя языка (как например при первом входе на сайт, и (или) когда
     * функция автоматического определения языка браузера отключена)
     * @param string $languageDir
     * @return void
     */
    protected static function setDefaultLanguage(string $languageDir = "")
    {
        self::$defaultLanguage = $languageDir;
    }

    /**
     * Включает автоматическое определения языка браузера пользователя
     * В этом случае, если в URI отсутствует указание языка страницы
     * Система будет пытаться назначить язык страницы автоматически
     * на основании настроек браузера. Если системой будет определен язык браузера
     * ресурсы для которого не созданы (или не поддерживается) будет назначен язык по умолчанию.
     * В базовых настройках данный параметр по определению включен.
     * @return void
     */
    protected static function automaticDetectionBrowserLanguageON()
    {
        self::$isADBLanguageEnabled = true;
    }

    /**
     * Выключает автоматическое определения языка браузера пользователя.
     * В этом случае, если в URI отсутствует указание языка страницы
     * Системой будет назначен язык по умолчанию.
     * В базовых настройках данная функция по умолчанию включена.
     * @return void
     */
    protected static function automaticDetectionBrowserLanguageOFF()
    {
        self::$isADBLanguageEnabled = false;
    }

    protected static function languageSelectorOn()
    {
        self::$isLanguageSelectorEnabled = true;
    }

    protected static function languageSelectorOFF()
    {
        self::$isLanguageSelectorEnabled = false;
    }

    protected static function resourceLocaleEnable()
    {
        self::$isResourceLocaleEnabled = true;
    }

    protected static function resourceLocaleDisable()
    {
        self::$isResourceLocaleEnabled = false;
    }

    public static function isAutomaticDetectionBrowserLanguageEnabled(): bool
    {
        return self::$isADBLanguageEnabled;
    }

    public static function getLanguageSet(): array
    {
        return self::$languageSet;
    }

    public static function getDefaultLanguage(): string
    {
        return self::$defaultLanguage;
    }

    public static function isLanguageSelectorEnabled(): bool
    {
        return self::$isLanguageSelectorEnabled;
    }

    public static function isResourceLocaleEnabled(): bool
    {
        return self::$isResourceLocaleEnabled;
    }
}