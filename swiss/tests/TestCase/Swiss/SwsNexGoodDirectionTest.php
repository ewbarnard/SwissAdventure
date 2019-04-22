<?php
declare(strict_types=1);

namespace App\Swiss;

class SwsNexGoodDirectionTest extends BaseSwsNex {
    public function testTravelMode(): void {
        $modes = array_combine(SwissCom::SW__DIR2, SwissCom::SW__MODE);
        $default = SwissCom::SW_WALK;
        $locations = array_keys(SwsDat::$sw_begin);
        foreach ($locations as $location) {
            foreach ($modes as $direction => $modeKey) {
                $expected = $default;
                if (array_key_exists($modeKey, SwsDat::$sw_begin_route[$location])) {
                    $travelKey = SwsDat::$sw_begin_route[$location][$modeKey];
                    static::assertArrayHasKey($travelKey, SwissCom::TRAVEL_MODE);
                    $expected = SwissCom::TRAVEL_MODE[$travelKey];
                }
                static::assertSame($expected, SwsNex::travelMode($direction, $location));
            }
        }
    }

    public function dataDirection(): array {
        $data = [];
        $data[] = ['', 'X'];
        $data[] = ['n', 'N'];
        $data[] = ['N', 'N'];
        $data[] = [' south ', 'S'];
        return $data;
    }

    /**
     * @param string $userInput
     * @param string $expected
     * @dataProvider dataDirection
     */
    public function testGetDirection(string $userInput, string $expected): void {
        MachineState::setUserInput($userInput);
        static::assertSame($expected, SwsNex::getDirection());
    }

    public function dataQuit(): array {
        $data = [];
        $data[] = ['', false];
        $data[] = ['Quit', false];
        $data[] = ['N', false];
        $data[] = ['Q', true];
        return $data;
    }

    /**
     * @param string $direction
     * @param bool $expected
     * @dataProvider dataQuit
     */
    public function testIsQuit(string $direction, bool $expected): void {
        static::assertSame($expected, SwsNex::isQuit($direction));
    }

    public function testQuitResponse(): void {
        static::assertSame(['location' => 'QUIT', 'mode' => 3], SwsNex::quitResponse());
    }

    public function testRoutes(): void {
        $directions = array_combine(SwissCom::SW__DIR2, SwissCom::SW__DIREC);
        $locations = array_keys(SwsDat::$sw_begin);
        foreach ($locations as $location) {
            MachineState::setLocation($location);
            foreach ($directions as $direction => $reserved) {
                $expected = array_key_exists($reserved, SwsDat::$sw_begin_route[$location]);
                static::assertSame($expected, SwsNex::isGoodDirection($direction));
                if ($expected) {
                    $nextLocation = SwsDat::$sw_begin_route[$location][$reserved];
                    static::assertArrayHasKey($nextLocation, SwsDat::$sw_begin);
                    static::assertArrayHasKey($nextLocation, SwsDat::$sw_begin_route);
                }
            }
        }
    }
}
