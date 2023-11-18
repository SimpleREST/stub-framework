<?php

namespace Stub\Framework\Contracts\Main;

use Stub\Framework\Contracts\Config\ReadableConfiguration;
use Stub\Framework\Main\MainConfig;

/**
 * Интерфейс приложения
 */
interface Application
{
    /**
     * Возвращает номер версии фреймворка
     *
     * @return string
     */
    public function version(): string;

    /**
     * Возвращает базовый путь к установке заглушки
     *
     * @param string $path
     * @return string
     */
    public function basePath(string $path = ''): string;

    /**
     * Принимает настройки конфигурации текущего выполнения
     *
     * @param MainConfig $param
     * @return void
     */
    public function setConfig(MainConfig $param);

    /**
     * Возвращает настройки конфигурации текущего выполнения
     * с использованием общего интерфейса редактирования конфигурации
     *
     * @return ReadableConfiguration
     */
    public function getConfig(): ReadableConfiguration;

    /**
     * Возвращает установленную локаль.
     *
     * @return false | string
     */
    public function getLocale();

    /**
     * Возвращает текущее пространство имен.
     *
     * @return string
     */
    public function getNamespace(): string;

    /**
     * Завершает работу приложения
     *
     * @return void
     */
    public function terminate();

    /**
     * Возвращает значение конфигурационного параметра заглушки по ключу
     * @param string $key
     * @param $default
     * @return mixed
     */
}