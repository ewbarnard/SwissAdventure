<?php
declare(strict_types=1);

namespace App\Swiss;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class DisplayTextTest extends TestCase {
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

    public function testDisplayMessage() {
        $location = 'ZURICH';
        $expected = 'Zurich';
        $this->mock->shouldReceive('run_msg')
            ->once()
            ->with($expected)
        ;
        $this->mock->shouldReceive('run_msg')
            ->once()
            ->with(SwsDat::SW_BEGIN[$location][1])
        ;

        $responseText = SwsMov::run($location);

        static::assertSame($expected, $responseText);
    }
}
