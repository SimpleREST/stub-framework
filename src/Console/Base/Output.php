<?php

namespace Stub\Framework\Console\Base;

class Output implements \Stub\Framework\Contracts\Console\Output
{

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