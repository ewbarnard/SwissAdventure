<?php
declare(strict_types=1);

namespace App\Swiss;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class MsgTest extends TestCase {
    /** @var \App\Swiss\Kernel */
    public $kernel;
    /** @var m\MockInterface */
    public $mock;

    /** @var \App\Swiss\SwsNo */
    public $target;
    /** @var m\MockInterface */
    public $targetMock;

    public function setUp() {
        $this->mock = m::mock(Kernel::class)->makePartial();
        $this->kernel = $this->mock;
        Kernel::setInstance($this->kernel);
        $this->mock->shouldReceive('run_msgr')->never();

        $this->targetMock = m::mock(SwsNo::class)->makePartial();
        $this->target = $this->targetMock;
        SwsNo::setInstance($this->target);
    }

    public function tearDown() {
        m::close();
    }

    public function dataSnide(): array {
        $data = [];
        foreach (SwsDat::SW_SNIDE as $key => $value) {
            $data[] = [$key, $value];
        }
        return $data;
    }

    /**
     * @param string $key
     * @param string $value
     * @dataProvider dataSnide
     */
    public function testRun(string $key, string $value) {
        $this->targetMock->shouldReceive('pick_key')
            ->once()->andReturn($key);
        $this->mock->shouldReceive('run_msg')
            ->once()->with($value);

        $responseText = SwsNo::run();

        static::assertSame($value, $responseText);
    }
}
