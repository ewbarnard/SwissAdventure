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
    //private $score = 0;
    public static function haveScore(string $station): bool {
        return static::getInstance()->runHaveScore($station);
    }

    public function runHaveScore(string $station): bool {
        return false;
    }

    public static function haveFullScore() {
        return static::getInstance()->runHaveFullScore();
    }

    public function runHaveFullScore() {
        return false;
    }

    /*    public static function getScore(): int {
			return static::getInstance()->run_getScore();
		}

		private function run_getScore(): int {
			return $this->score;
		}

		public static function setScore(int $score) {
			static::getInstance()->run_setScore($score);
		}

		private function run_setScore(int $score) {
			$this->score = $score;
		}*/
}
