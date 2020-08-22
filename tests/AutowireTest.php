<?php

namespace Zhwei\LaravelAutowireTests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase;
use Zhwei\LaravelAutowire\AutowireServiceProvider;

class AutowireTest extends TestCase
{
    public function testContainer()
    {
        /** @var ExampleA $a */
        $a = app(ExampleA::class);
        self::assertInstanceOf(ExampleB::class, $a->getPrivateProperty());
        self::assertInstanceOf(ExampleB::class, $a->getProtectedProperty());
        self::assertInstanceOf(ExampleB::class, $a->getPublicProperty());
        self::assertInstanceOf(ExampleB::class, $a::getPrivateStatic());
        self::assertInstanceOf(ExampleB::class, $a::getProtectedStatic());
        self::assertInstanceOf(ExampleB::class, $a::getPublicStatic());
        self::assertNull($a->getPrivatePropertyNotWire());

        $a::getPublicStatic()->value = 'overwrite';

        $aa = app(ExampleA::class);
        self::assertSame('overwrite', $aa::getPublicStatic()->value);
    }

    public function createApplication()
    {
        $app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        $app->register(AutowireServiceProvider::class);
        return $app;
    }
}
