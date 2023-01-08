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
     * Завершает работу приложения
     *
     * @return void
     */
    public function terminate();

}