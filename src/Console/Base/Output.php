<?php

namespace Stub\Framework\Console\Base;

class Output implements \Stub\Framework\Contracts\Console\Output
{
    protected static $_instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function write($message, bool $newline = false)
    {
        if ($newline) {
            $this->writeln($message);
        } else {
            echo $message;
        }
    }

    public function writeln($message)
    {
        echo $message;
        echo "\r\n";
    }
}