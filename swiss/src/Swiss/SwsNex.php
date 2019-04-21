<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsNex - Get new valid location (332-450)
 *     CALL      SWSNEX,(SW,CL,RO=NL1,RO=TV1)
 *
 * @package App\Swiss
 * @method static SwsNex getInstance()
 ************************************************************************
 *                                                                      *
 *  Name     - SWSNEX                                                   *
 *                                                                      *
 *  Input    - Local Memory address of current location descriptor (SW@)*
 *             Current location ordinal                                 *
 *                                                                      *
 *  Output   - Ordinal of new location                                  *
 *             Mode of travel to get there                              *
 *                                                                      *
 *  Function - Get new valid location                                   *
 *                                                                      *
 *  Method   - 1.  Allocate prompt buffer                               *
 *             2.  Allocate and clear response buffer                   *
 *             3.  Prompt and read travel description                   *
 *             4.  Deallocate Local Memory buffers                      *
 *             5.  If response found in table,                          *
 *                 return:  New location                                *
 *                          Mode of travel to get there                 *
 *                 Return from overlay.                                 *
 *             6.  Call SWSNO to write snide remark                     *
 *             7.  GOTO SWSNEX to try for a better response             *
 *                                                                      *
 ************************************************************************
 */
class SwsNex extends Layered {
    public const MAX_INVALID_RESPONSES = 6;
    public const MESSAGE = 'Where to, boss?';

    public $nextLocation = '';
    public $responseDirection = '';

    /**
     * @param string $location
     * @return array ['location' => (string)key, 'mode' => (int)SW$xxxx]
     */
    public static function run(string $location): array {
        return static::getInstance()->run_swsnex($location);
    }

    public function run_swsnex(string $location): array {
        $invalidResponses = 0;
        $goodResponse = false;
        $mode = SwissCom::SW_WALK;

        while (!$goodResponse && ($invalidResponses++ < self::MAX_INVALID_RESPONSES)) {
            $this->checkExam($location);
            if ($this->responseDirection === 'Q') {
                return ['location' => 'QUIT', 'mode' => SwissCom::SW_QUIT];
            }
            if ($this->isQuitRequest()) {
                return $this->quitResponse();
            }
            $goodResponse = $this->goodResponse($location);

            if ($goodResponse) {
                $mode = $this->mode($location);
                /**
                 * Line 426
                 * See if we require a certain score to proceed.
                 */
                if (($mode === SwissCom::SW_SCORE) && preg_match('/^TEST(\d\d)$/', $location, $matches)) {
                    $station = $matches[1];
                    $goodResponse = Score::haveScore($station);
                } elseif ($mode === SwissCom::SW_PASS) {
                    $goodResponse = Score::haveFullScore();
                }
            }

            if (!$goodResponse) {
                /**
                 * Line 445
                 * Not a valid response
                 */
                SwsNo::run();
            }
        }

        return $goodResponse ? ['location' => $this->nextLocation, 'mode' => $mode] : $this->quitResponse();
    }

    public function checkExam(string $location) {
        /**
         * Line 390
         * Trap passing the exam as a special case. If our adventurer
         * made it all the way through and passed the exam, shunt him or
         * her directly into the victory circle.
         */
        if (($location === SwsDat::SW_EXAM) && (Score::haveFullScore())) {
            $this->responseDirection = 'W'; // Go west to victory
        } else {
            $responseText = trim(strtoupper(Kernel::MSGR(self::MESSAGE)));
            if ($responseText === '') {
                $responseText = 'X'; // Invalid direction
            }
            $this->responseDirection = substr($responseText, 0, 1);
        }
    }

    /**
     * Line 404
     * Trap a QUIT request
     */
    public function isQuitRequest() {
        return ($this->responseDirection === 'Q');
    }

    public function quitResponse() {
        return ['location' => 'QUIT', 'mode' => SwissCom::SW_QUIT];
    }

    public function goodResponse(string $location): bool {
        /**
         * Line 415
         * Now see if it's a good response
         */
        $key = $this->responseDirection;
        if ($key === 'W') {
            // 'W' is a reserved word in the assembler version, so using WEST instead
            $key = 'WEST';
        }
        $goodResponse = array_key_exists($key, SwsDat::$sw_begin_route[$location]);
        $this->nextLocation = $goodResponse ? SwsDat::$sw_begin_route[$location][$key] : '';
        return $goodResponse;
    }

    public function mode(string $location): int {
        $modeKey = $this->responseDirection . 'M';
        $mode = array_key_exists($modeKey, SwsDat::$sw_begin_route[$location]) ?
            SwsDat::$sw_begin_route[$location][$modeKey] : 'SW$WALK';
        return SwissCom::TRAVEL_MODE[$mode];
    }
}
