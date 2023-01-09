<?php

namespace Stub\Framework\Console\Base;

abstract class Command
{
    /**
     * Имя команды (собственно сама команда как есть)
     *
     * @var string
     */
    protected $name;

    /**
     * Описание команды
     *
     * @var string
     */
    protected $description;

    /**
     * Возвращает описание команды
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Возвращает имя команды
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->name = "No Name!!!";
        $this->description = "NO Description !!!";
    }


}