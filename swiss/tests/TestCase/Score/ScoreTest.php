<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase {
    public function setUp() {
        Score::reset();
    }

    public function dataStations() {
        $data = [];
        foreach (SwissCom::SW__ENGL as $station) {
            $data[] = [$station];
        }
        return $data;
    }

    /**
     * @param string $station
     * @dataProvider dataStations
     */
    public function testUnreachedStation(string $station) {
        static::assertFalse(Score::haveScore($station));
    }

    public function dataLocationStation() {
        $data = [];
        foreach (SwissCom::SW__ENGL as $key => $station) {
            $location = SwissCom::CKMIC[$key];
            $data[] = [$location, $station];
        }
        return $data;
    }

    /**
     * @param string $location
     * @param string $station
     * @dataProvider dataLocationStation
     */
    public function testStationReached(string $location, string $station) {
        static::assertFalse(Score::haveScore($station));

        Score::markLocationReached($location);

        static::assertTrue(Score::haveScore($station));
    }

    public function testHaveFullScore() {
        foreach (SwissCom::CKMIC as $location) {
            static::assertFalse(Score::haveFullScore());
            Score::markLocationReached($location);
            Score::markLocationReached($location);
        }
        static::assertTrue(Score::haveFullScore());
    }
}
