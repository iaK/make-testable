<?php

namespace IaK\MakeTestable\Commands;

use Illuminate\Support\Str;
use Illuminate\Foundation\Console\JobMakeCommand as Command;
use Symfony\Component\Console\Input\InputOption;

class JobMakeCommand extends Command
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
     * Create a test for the job.
     *
     * @return void
     */
    protected function createTest()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:test', [
            'name' => 'Jobs\\' . $name  . 'Test',
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
            ['test', 't', InputOption::VALUE_NONE, 'Generate a test for the job']
        ];
    }
}
