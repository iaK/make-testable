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
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->app->extend('command.make.model', function () {
                return new ModelMakeCommand();
            });
            $this->app->extend('command.make.console', function () {
                return new ConsoleMakeCommand();
            });
            $this->app->extend('controller.make.console', function () {
                return new ControllerMakeCommand();
            });
            $this->app->extend('event.make.console', function () {
                return new EventMakeCommand();
            });
            $this->app->extend('job.make.console', function () {
                return new JobMakeCommand();
            });
            $this->app->extend('listener.make.console', function () {
                return new ListenerMakeCommand();
            });
            $this->app->extend('notification.make.console', function () {
                return new NotificationMakeCommand();
            });
            $this->app->extend('middleware.make.console', function () {
                return new MiddlewareMakeCommand();
            });
        }
    }

    /**
     * Provides services.
     *
     * @return void
     */
    public function provides()
    {
        return [
            'command.make.model',
        ];
    }
}
