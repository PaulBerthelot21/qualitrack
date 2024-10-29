<?php

namespace App\Tests\Service;

use App\Service\MyService;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase
{
    public function testSomething(): void
    {
        $service = new MyService();

        $result = $service->greet('World');

        $this->assertEquals('Hello, World!', $result);
    }

    public function testSomethingElse(): void
    {
        $service = new MyService();

        $result = $service->greet('Alice');

        $this->assertEquals('Hello, Alice!', $result);
    }

}
