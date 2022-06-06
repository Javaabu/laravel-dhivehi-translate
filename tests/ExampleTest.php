<?php

namespace Javaabu\LaravelDhivehiTranslate\Tests;

use Orchestra\Testbench\TestCase;
use Javaabu\LaravelDhivehiTranslate\Providers\LaravelDhivehiTranslateServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelDhivehiTranslateServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
