<?php

namespace App\Service;

class MyService
{
    public function greet(string $name): string
    {
        return "Hello, " . $name . "!";
    }
}
