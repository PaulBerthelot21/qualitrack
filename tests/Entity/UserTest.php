<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetSetId(): void
    {
        $user = new User();
        $reflection = new \ReflectionClass($user);
        $property = $reflection->getProperty('id');
        $property->setValue($user, 1);
        $this->assertEquals(1, $user->getId());
    }

    public function testGetSetEmail(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertEquals('test@example.com', $user->getEmail());
    }

    public function testGetSetFirstName(): void
    {
        $user = new User();
        $user->setFirstName('John');
        $this->assertEquals('John', $user->getFirstName());
    }

    public function testGetSetLastName(): void
    {
        $user = new User();
        $user->setLastName('Doe');
        $this->assertEquals('Doe', $user->getLastName());
    }

    public function testGetSetRoles(): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $this->assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
    }
}
