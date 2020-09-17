<?php

namespace IaK\MakeTestable\Tests;

use IaK\MakeTestable\Providers\MakeTestableServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Orchestra\Testbench\TestCase as Orchestra;

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
