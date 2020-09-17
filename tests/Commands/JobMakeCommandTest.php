<?php

namespace IaK\MakeTestable\Tests\Commands;

use IaK\MakeTestable\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class JobMakeCommandTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_a_test_for_a_given_job()
    {
        Artisan::call('make:job Blog --test');

        $this->assertTrue($this->double->wasCalled());
        $this->assertTrue($this->double->isUnitTest());
        $this->assertEquals('Jobs\BlogTest', $this->double->testClassName);
    }

    /**
     * @test
     */
    public function it_does_not_create_a_test_by_default()
    {
        Artisan::call('make:job Blog');

        $this->assertTrue($this->double->wasNotCalled());
    }
}
