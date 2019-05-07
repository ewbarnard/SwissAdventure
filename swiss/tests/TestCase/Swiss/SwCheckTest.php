<?php
declare(strict_types=1);

namespace App\Swiss;

class SwCheckTest extends BaseSwsNex {
    public function testNotCheckpoint() {
        $location = 'PARIS';
        SwCheck::run($location);
        static::assertSame([], MachineState::getMessages());
    }

    public function testCheckpoint() {
        $location = 'ZERMATT';
        $station = '01';
        static::assertFalse(Score::haveScore($station));
        static::assertSame([], MachineState::getMessages());

        SwCheck::run($location);

        static::assertTrue(Score::haveScore($station));
        static::assertSame(['The following sign stands before you: Checkpoint WAAHID'], MachineState::getMessages());
    }
}
