<?php

namespace Stub\Framework\Contracts\Mail;

interface Message
{
    /**
     * Возвращает тестовое приветствие
     *
     * @return string
     */
    public function hi();

    /**
     * Add a "from" address to the message.
     *
     * @param string|array $address
     * @param string|null $name
     * @return Message
     */
    public function setFrom($address, $name = null);

}