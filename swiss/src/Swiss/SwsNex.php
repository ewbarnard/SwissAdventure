<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsNex - Get new valid location (332-450)
 *     CALL      SWSNEX,(SW,CL,RO=NL1,RO=TV1)
 *
 * @package App\Swiss
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
class SwsNex {
    public const MESSAGE = 'Where to, boss?';

    /**
     * @return array
     * @see SwsNexExamTest
     */
    public static function run(): array {
        if (self::passedExam()) {
            self::setExamPassed();
        }
        if (MachineState::getStatus() === MachineState::STATUS_RECEIVED_INPUT) {
            return self::resume();
        }
        return self::prompt();
    }

    /**
     * Line 390
     * Trap passing the exam as a special case. If our adventurer
     * made it all the way through and passed the exam, shunt him or
     * her directly into the victory circle.
     *
     * @return bool
     * @see SwsNexExamTest
     */
    public static function passedExam(): bool {
        return (MachineState::getLocation() === SwsDat::SW_EXAM) && Score::haveFullScore();
    }

    /**
     * Line 395 - Go west to victory
     *
     * @see SwsNexExamTest
     */
    public static function setExamPassed(): void {
        MachineState::setUserInput('W');
        MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
    }

    /**
     * @return array
     * @see SwsNexResumeTest
     */
    public static function resume(): array {
        $direction = self::getDirection();
        if (static::isQuit($direction)) {
            return static::quitResponse();
        }

        $goodResponse = static::isGoodDirection($direction);
        $location = MachineState::getLocation();
        $travelMode = SwissCom::SW_WALK;
        $nextLocation = $location;

        if ($goodResponse) {
            $nextLocation = SwsDat::$sw_begin_route[$location][static::reservedDirection($direction)];
            $travelMode = self::travelMode($direction, $location);
            $goodResponse = static::haveRequiredScore($travelMode, $location);
        }

        if (!$goodResponse) {
            return self::prompt();
        }
        return ['location' => $nextLocation, 'mode' => $travelMode];
    }

    /**
     * @return string
     * @see SwsNexGoodDirectionTest
     */
    public static function getDirection(): string {
        $responseText = strtoupper(trim(MachineState::getUserInput()));
        if ($responseText === '') {
            $responseText = 'X'; // Invalid direction
        }
        return substr($responseText, 0, 1);
    }

    /**
     * @param string $direction
     * @return bool
     * @see SwsNexGoodDirectionTest
     */
    public static function isQuit(string $direction): bool {
        return ($direction === 'Q');
    }

    /**
     * @return array
     * @see SwsNexGoodDirectionTest
     */
    public static function quitResponse(): array {
        return ['location' => 'QUIT', 'mode' => SwissCom::SW_QUIT];
    }

    /**
     * Line 415
     * Now see if it's a good response
     *
     * @param string $direction
     * @return bool
     * @see SwsNexGoodDirectionTest
     */
    public static function isGoodDirection(string $direction): bool {
        return array_key_exists(static::reservedDirection($direction),
            SwsDat::$sw_begin_route[MachineState::getLocation()]);
    }

    /**
     * W is a reserved word in the assembler version - it's the modifier indicating a word address
     * rather than a parcel address, so the routing map uses key WEST rather than key W
     *
     * @param string $direction
     * @return string
     * @see SwsNexReservedDirectionTest
     */
    public static function reservedDirection(string $direction): string {
        return ($direction === 'W') ? 'WEST' : $direction;
    }

    /**
     * @param string $direction
     * @param string $location
     * @return int
     * @see SwsNexGoodDirectionTest
     */
    public static function travelMode(string $direction, string $location): int {
        $mode = 'SW$WALK';
        $modeKey = $direction . 'M';
        if (array_key_exists($modeKey, SwsDat::$sw_begin_route[$location])) {
            $mode = SwsDat::$sw_begin_route[$location][$modeKey];
        }
        return SwissCom::TRAVEL_MODE[$mode];
    }

    /**
     * Line 426
     * See if we require a certain score to proceed
     *
     * @param int $travelMode
     * @param string $location
     * @return bool
     * @see SwsNexHaveScoreTest
     */
    public static function haveRequiredScore(int $travelMode, string $location): bool {
        if (($travelMode == SwissCom::SW_SCORE) && preg_match('/^TEST(\d\d)$/', $location, $matches)) {
            return Score::haveScore($matches[1]);
        } elseif ($travelMode === SwissCom::SW_PASS) {
            return Score::haveFullScore();
        }
        return true;
    }

    /**
     * @return array
     * @see SwsNexPromptTest
     */
    public static function prompt(): array {
        Kernel::MSGR(self::MESSAGE);
        return [];
    }
}
