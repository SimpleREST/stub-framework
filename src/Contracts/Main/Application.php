<?php

namespace Stub\Framework\Contracts\Main;

interface Application
{
    /**
     * Возвращает номер версии фреймворка
     *
     * @return string
     */
    public function version();

    /**
     * Возвращает базовый путь к установке заглушки
     *
     * @param string $path
     * @return string
     */
    public function basePath($path = '');

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
    public function getNamespace();

    /**
     * Завершает работу приложения
     *
     * @return void
     */
    public function terminate();

}