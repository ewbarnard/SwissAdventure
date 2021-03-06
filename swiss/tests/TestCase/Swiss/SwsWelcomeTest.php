<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class SwsWelcomeTest extends TestCase {
    public function setUp(): void {
        MachineState::reset();
    }

    public function testBegin(): void {
        $responseText = SwsWel::run();

        static::assertSame(SwsWel::MSG1, $responseText);
        static::assertSame(MachineState::SECTION_WELCOME, MachineState::getSection());
        static::assertSame(MachineState::STATUS_NEED_INPUT, MachineState::getStatus());
        static::assertSame([SwsWel::MSG1], MachineState::getMessages());
    }

    public function testResumeNo(): void {
        MachineState::setUserInput(' no ');
        MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);

        $responseText = SwsWel::run();

        static::assertSame('NO', $responseText);
        static::assertSame(MachineState::SECTION_NORMAL, MachineState::getSection());
        static::assertSame(MachineState::STATUS_BEGIN, MachineState::getStatus());
        static::assertSame([SwsWel::MSG2], MachineState::getMessages());
    }

    public function testResumeYes(): void {
        MachineState::setUserInput('y');
        MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);

        $responseText = SwsWel::run();

        static::assertSame('Y', $responseText);
        static::assertSame(MachineState::SECTION_NORMAL, MachineState::getSection());
        static::assertSame(MachineState::STATUS_BEGIN, MachineState::getStatus());
        static::assertSame([], MachineState::getMessages());
    }
}
