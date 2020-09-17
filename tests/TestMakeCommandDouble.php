<?php

namespace IaK\MakeTestable\Tests;

use Illuminate\Foundation\Console\TestMakeCommand;

class TestMakeCommandDouble extends TestMakeCommand
{
    public $testClassName;
    public $unitTest;
    public $called = false;

    public function handle()
    {
        parent::handle();

        $this->called = true;
        $this->unitTest = $this->option('unit');
        $this->testClassName = $this->getNameInput();
    }

    public function isUnitTest()
    {
        return $this->unitTest;
    }

    public function isNotUnitTest()
    {
        return ! $this->isUnitTest();
    }

    public function wasCalled()
    {
        return $this->called;
    }

    public function wasNotCalled()
    {
        return ! $this->wasCalled();
    }
}
