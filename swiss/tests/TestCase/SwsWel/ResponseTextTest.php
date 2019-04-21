<?php
declare(strict_types=1);

namespace App\Swiss;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class ResponseTextTest extends TestCase {
    /** @var \App\Swiss\Kernel */
    public $kernel;
    /** @var m\MockInterface */
    public $mock;

    public function setUp() {
        $this->mock = m::mock(Kernel::class)->makePartial();
        $this->kernel = $this->mock;
        Kernel::setInstance($this->kernel);
    }

    public function tearDown() {
        m::close();
    }

    public function testYes() {
        $user = 'yes';
        $this->mock->shouldReceive('run_msgr')
            ->once()->with(SwsWel::MSG1)
            ->andReturn($user)
        ;
        $this->mock->shouldReceive('run_msg')
            ->never()->with(SwsWel::MSG2)
        ;

        $responseText = SwsWel::run();

        static::assertSame(strtoupper($user), $responseText);
    }

    public function testNo() {
        $user = 'nope';
        $this->mock->shouldReceive('run_msgr')
            ->once()->with(SwsWel::MSG1)
            ->andReturn($user)
        ;
        $this->mock->shouldReceive('run_msg')
            ->once()->with(SwsWel::MSG2)
        ;

        $responseText = SwsWel::run();

        static::assertSame(strtoupper($user), $responseText);
    }
}
