<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class Score
 *
 * @package App\Swiss
 * @method static Score getInstance()
 */
class Score extends Layered {
    private $stationsReached = [];

    public static function getStationsReached(): array {
        return static::getInstance()->runGetStationsReached();
    }

    private function runGetStationsReached(): array {
        return $this->stationsReached;
    }

    public static function setStationsReached(array $stationsReached): void {
        static::getInstance()->runSetStationsReached($stationsReached);
    }

    private function runSetStationsReached(array $stationsReached): void {
        $this->stationsReached = $stationsReached;
    }

    public static function haveScore(string $station): bool {
        return static::getInstance()->runHaveScore($station);
    }

    private function runHaveScore(string $station): bool {
        $stationKey = $this->stationKey($station);
        return array_key_exists($stationKey, $this->stationsReached);
    }

    private function stationKey(string $station): string {
        return 'Station' . $station;
    }

    public static function haveFullScore(): bool {
        return static::getInstance()->runHaveFullScore();
    }

    private function runHaveFullScore(): bool {
        return (count($this->stationsReached) === count(SwissCom::CKMIC));
    }

    public static function markLocationReached(string $location): void {
        static::getInstance()->runMarkLocationReached($location);
    }

    private function runMarkLocationReached(string $location): void {
        $map = array_combine(SwissCom::CKMIC, SwissCom::SW__ENGL);
        if (!array_key_exists($location, $map)) {
            return;
        }
        $stationKey = $this->stationKey($map[$location]);
        $this->stationsReached[$stationKey] = 1;
    }
}
