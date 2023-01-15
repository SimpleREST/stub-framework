<?php

namespace Stub\Framework\Console\Base;

class Output implements \Stub\Framework\Contracts\Console\Output
{

    public function write($message)
    {
        echo $message;
    }

    public function writeln($message)
    {
        echo $message;
        echo "\r\n";
    }
}