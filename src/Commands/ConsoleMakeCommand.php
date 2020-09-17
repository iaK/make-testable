<?php

namespace IaK\MakeTestable\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ConsoleMakeCommand extends Command
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
     * Create a test for the command.
     *
     * @return void
     */
    protected function createTest()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:test', [
            'name' => 'Commands\\' . $name  . 'Test',
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
            ['test', 't', InputOption::VALUE_NONE, 'Generate a test for the command'],
        ];
    }
}
