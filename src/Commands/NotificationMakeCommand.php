<?php

namespace IaK\MakeTestable\Commands;

use Illuminate\Support\Str;
use Illuminate\Foundation\Console\NotificationMakeCommand as Command;
use Symfony\Component\Console\Input\InputOption;

class NotificationMakeCommand extends Command
{
    /**
     * @inheritDoc
     */
    public function handle()
    {
        parent::handle();

        if ($this->option('test')) {
            $this->createTest();
        }
    }

    /**
     * Create a test for the notification.
     *
     * @return void
     */
    protected function createTest()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:test', [
            'name' => 'Notifications\\' . $name  . 'Test',
            '--unit' => true,
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function getOptions()
    {
        return [
            ...parent::getOptions(),
            ['test', 't', InputOption::VALUE_NONE, 'Generate a test for the notification']
        ];
    }
}
