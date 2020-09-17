<?php

namespace IaK\MakeTestable\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ControllerMakeCommand extends Command
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
     * Create a test for the controller.
     *
     * @return void
     */
    protected function createTest()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:test', [
            'name' => 'Controllers\\' . $name  . 'Test',
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function getOptions()
    {
        return [
            ...parent::getOptions(),
            ['test', 't', InputOption::VALUE_NONE, 'Generate a test for the controller'],
        ];
    }
}
