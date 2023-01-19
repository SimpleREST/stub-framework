<?php

namespace Stub\Framework\Main\Http;

class Kernel implements \Stub\Framework\Contracts\Http\Kernel
{
    public function sayHello(): string
    {
        echo "Hello!! It is Console Kernel...";
        return "Hi!! It is Console Kernel...";
    }
}