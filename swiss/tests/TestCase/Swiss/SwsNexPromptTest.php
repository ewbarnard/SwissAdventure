<?php
declare(strict_types=1);

namespace App\Swiss;

class SwsNexPromptTest extends BaseSwsNex {
    public function testPrompt(): void {
        $response = SwsNex::prompt();

        static::assertSame([], $response);
        static::assertSame([SwsNex::MESSAGE], MachineState::getMessages());
        static::assertSame(MachineState::STATUS_NEED_INPUT, MachineState::getStatus());
    }
}
