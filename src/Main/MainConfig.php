<?php

namespace Stub\Framework\Main;

use Stub\Framework\Contracts\Main\UserEditable;

abstract class MainConfig implements UserEditable
{
    /**
     * @var array[]
     * Набор локализационных ресурсов и указание наименований языковых реализаций для выбора.
     * Формат: 'Ru' => 'RU' Ключ массива директория языкового набора,
     * текстовое значение массива  - представление языка страницы в поле выбора значения
     * Порядок, в котором представлены элементы массива определяет последовательность,
     * в которой будут указаны языки в поле выбора локализации
     * Примечание: масии в может быть пустым, в этом случае поле выбора языка на странице не
     * отображается и строковые ресурсы принимаюз назначения языка по умолчанию
     * т.е. предустановленные SimpleStub Framework значения.
     */
    private static $languageSet = array();
    private static $defaultLanguage = "";
    private static $automaticDetectionBrowserLanguage = true;
    private static $languageSelectorDisabled = false;
    private static $resourceLocaleDisabled = false;

    /**
     * Устанавливает порядок и вид представления локализации ресурса ( Наименование языка в поле выбора)
     * Порядок следования элементов массива важен, именно в этом порядке они и будут выстраиваться в поле выбора
     * Этот метод при конфигурировании необязателен. ПРи отсутствии ресурсов или при отсутствии настройки
     * данного параметра, поле выбора языка просто не будет отражено, и будет применет дефолтный набор строковых
     * параметров отпределенный SimpleStub Framework и минимальными настройками пользователя.
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
     * ресурсы для которого не созданы (не поддерживается) будет назначен язык по умолчанию.
     * В базовых настройках данный параметр по определению включен.
     * @return void
     */
    protected static function automaticDetectionBrowserLanguageON()
    {
        self::$automaticDetectionBrowserLanguage = true;
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
        self::$automaticDetectionBrowserLanguage = false;
    }

    protected static function languageSelectorOn()
    {
        self::$languageSelectorDisabled = false;
    }

    protected static function languageSelectorOFF()
    {
        self::$languageSelectorDisabled = true;
    }

    protected static function resourceLocaleDisabledOn()
    {
        self::$resourceLocaleDisabled= false;
    }

    protected static function resourceLocaleDisabledOFF()
    {
        self::$resourceLocaleDisabled = true;
    }

    public static function IsAutomaticDetectionBrowserLanguageEnabled(): bool
    {
        return self::$automaticDetectionBrowserLanguage;
    }

    public static function getLanguageSet(): array
    {
        return self::$languageSet;
    }

    public static function getDefaultLanguage(): string
    {
        return self::$defaultLanguage;
    }


    public static function IsLanguageSelectorDisabled(): bool
    {
        return self::$languageSelectorDisabled;
    }

    public static function IsResourceLocaleDisabled(): bool
    {
        return self::$resourceLocaleDisabled;
    }
}