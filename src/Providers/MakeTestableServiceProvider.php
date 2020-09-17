<?php

namespace IaK\MakeTestable\Providers;

use IaK\MakeTestable\Commands\ConsoleMakeCommand;
use IaK\MakeTestable\Commands\ControllerMakeCommand;
use IaK\MakeTestable\Commands\EventMakeCommand;
use IaK\MakeTestable\Commands\JobMakeCommand;
use IaK\MakeTestable\Commands\ListenerMakeCommand;
use IaK\MakeTestable\Commands\MiddlewareMakeCommand;
use IaK\MakeTestable\Commands\ModelMakeCommand;
use IaK\MakeTestable\Commands\NotificationMakeCommand;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class MakeTestableServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModelMakeCommand::class,
                ConsoleMakeCommand::class,
                ControllerMakeCommand::class,
                EventMakeCommand::class,
                JobMakeCommand::class,
                ListenerMakeCommand::class,
                NotificationMakeCommand::class,
                MiddlewareMakeCommand::class,
            ]);
        }
    }

    /**
     * Provides services.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.make.model',
            'command.make.console',
            'command.make.controller',
            'command.make.event',
            'command.make.job',
            'command.make.listener',
            'command.make.notification',
            'command.make.middleware',
        ];
    }
}
