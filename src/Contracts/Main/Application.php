<?php

namespace Stub\Framework\Contracts\Main;

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
     * Возвращает установленную локаль.
     *
     * @return string
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
    public function get(string $key, $default = null);

}