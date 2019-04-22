<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class MsgTest extends TestCase {

    public function setUp() {
        MachineState::reset();
    }

    public function testSnide() {
        $message = SwsNo::run();

        static::assertSame([$message],MachineState::getMessages());
        static::assertSame($message,(string)$message);
        static::assertNotSame($message, '');
    }
}
