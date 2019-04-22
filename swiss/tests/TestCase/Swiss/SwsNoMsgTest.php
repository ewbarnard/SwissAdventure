<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class SwsNoMsgTest extends TestCase {

    public function setUp(): void {
        MachineState::reset();
    }

    public function testSnide(): void {
        $message = SwsNo::run();

        static::assertSame([$message], MachineState::getMessages());
        static::assertSame($message, (string)$message);
        static::assertNotSame($message, '');
    }
}
