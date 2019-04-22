<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class SwsMovDisplayTextTest extends TestCase {
    public function setUp(): void {
        MachineState::reset();
    }

    public function testRunMessage(): void {
        $location = 'ZURICH';
        $expected = 'Zurich';

        $responseText = SwsMov::run($location);

        static::assertSame($expected, $responseText);
        $messages = [
            SwsDat::SW_BEGIN[$location][0],
            SwsDat::SW_BEGIN[$location][1],
        ];
        static::assertSame($messages, MachineState::getMessages());
    }
}
