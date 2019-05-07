<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class SwsMovDisplayTextTest extends TestCase {
    public function setUp(): void {
        MachineState::reset();
    }

    public function dataMode(): array {
        $data = [];

        foreach (SwissCom::TRAVEL_KEY as $mode => $key) {
            $messages = SwsDat::SW_TRAVL[$key];
            $data[] = [$mode, $messages];
        }

        return $data;
    }

    /**
     * @param int $mode
     * @param array $messages
     * @dataProvider dataMode
     */
    public function testTrundleText(int $mode, array $messages): void {
        SwsMov::run($mode);

        static::assertSame($messages, MachineState::getMessages());
    }
}
