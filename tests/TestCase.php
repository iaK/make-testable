<?php

namespace IaK\MakeTestable\Tests;

use Illuminate\Filesystem\Filesystem;
use Orchestra\Testbench\TestCase as Orchestra;
use IaK\MakeTestable\Tests\TestMakeCommandDouble;
use IaK\MakeTestable\Providers\MakeTestableServiceProvider;

class TestCase extends Orchestra
{
    protected $double;

    public function setUp(): void
    {
        parent::setUp();

        $this->double = new TestMakeCommandDouble($this->app->make(Filesystem::class));
        $this->app->singleton('command.test.make', fn ($app) => $this->double);
    }

    protected function getPackageProviders($app)
    {
        return [
            MakeTestableServiceProvider::class,
        ];
    }
}
