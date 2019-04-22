<?php
declare(strict_types=1);

namespace App\Swiss;

class SwsNexHaveScoreTest extends BaseSwsNex {

    public function dataLocation(): array {
        $data = [];
        foreach (array_keys(SwsDat::SW_BEGIN) as $location) {
            $data[] = [$location];
        }
        return $data;
    }

    /**
     * @param string $location
     * @dataProvider dataLocation
     */
    public function testDefaultTravel(string $location): void {
        static::assertTrue(SwsNex::haveRequiredScore(SwissCom::SW_WALK, $location));
    }

    public function dataStations(): array {
        $data = [];
        foreach (SwissCom::SW__ENGL as $key => $station) {
            $data[] = [$station, SwissCom::CKMIC[$key]];
        }
        return $data;
    }

    /**
     * @param string $station
     * @param string $location
     * @dataProvider dataStations
     */
    public function testScore(string $station, string $location): void {
        static::assertFalse(Score::haveScore($station));

        static::assertFalse(SwsNex::haveRequiredScore(SwissCom::SW_SCORE, 'TEST' . $station));

        Score::markLocationReached($location);
        static::assertTrue(SwsNex::haveRequiredScore(SwissCom::SW_SCORE, 'TEST' . $station));
    }

    public function testPass(): void {
        foreach (SwissCom::CKMIC as $location) {
            static::assertFalse(SwsNex::haveRequiredScore(SwissCom::SW_PASS, $location));
            Score::markLocationReached($location);
        }
        static::assertTrue(SwsNex::haveRequiredScore(SwissCom::SW_PASS, SwsDat::SW_EXAM));
    }
}
