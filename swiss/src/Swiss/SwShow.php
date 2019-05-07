<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwShow - Display location text, get new location (64-209)
 *     CALL      SWSHOW,(R!WHERE,RO=NEXT,RO=MODE)
 *     CALL       SWSHOW,(R!WHERE,RO=NEXT,RO=MODE)
 *
 * @package App\Swiss
 ************************************************************************
 *                                                                      *
 *  Name     - SWSHOW                                                   *
 *                                                                      *
 *  Input    - Current location ordinal                                 *
 *                                                                      *
 *  Output   - New location ordinal                                     *
 *             Mode of travel to new location                           *
 *                                                                      *
 *  Function - Display location text, get new location                  *
 *                                                                      *
 *  Method   - 1.  Call SWSLOC to get description                       *
 *             2.  Display description                                  *
 *             3.  Call SWCHECK to display checkpoint sign, if any      *
 *             4.  Call SWSNEX to get new valid location                *
 *             5.  Call SWSMOV to display trundle text                  *
 *             6.  Deallocate old description buffers                   *
 *             7.  Return:  New location, travel mode to get there      *
 *                                                                      *
 *  Registers- CL    - Current location (input)                         *
 *             NL    - New location (output)                            *
 *             TV    - Travel mode (output)                             *
 *                                                                      *
 *             BA    - Base address (offset) of the travel table        *
 *             SW    - L.M. address of current location descriptor (SW@)*
 *             TX    - L.M. address of description text                 *
 *             TV1   - New travel mode (passed to TV)                   *
 *             NL1   - New location (passed to NL)                      *
 *                                                                      *
 ************************************************************************
 */
class SwShow {
    private const EXAM = 'Please name checkpoint no. %s: ';

    public static function run(): array {
        if (MachineState::getStatus() === MachineState::STATUS_RECEIVED_INPUT) {
            return self::resume();
        }

        // Line 108 - Display description
        SwsDat::init();
        $location = MachineState::getLocation();
        foreach (SwsDat::$sw_begin[$location] as $message) {
            Kernel::MSG($message);
        }

        // Line 109 - Display checkpoint sign, if any
        SwCheck::run($location);

        // Line 110 - If in examination room, administer exam
        if ($location === SwsDat::SW_EXAM) {
            return self::exam();
        }
        return SwsNex::run();
    }

    public static function resume(): array {
        if (MachineState::getSection() === MachineState::SECTION_EXAM) {
            return self::nextExamQuestion();
        }
        $next = SwsNex::run();
        if (MachineState::getStatus() === MachineState::STATUS_NEED_INPUT) {
            return [];
        }
        if (array_key_exists('location', $next)) {
            MachineState::setLocation($next['location']);
        }
        if (array_key_exists('mode', $next)) {
            SwsMov::run($next['mode']);
        }
        return $next;
    }

    public static function nextExamQuestion(): array {
        self::resumeExam();
        $status = MachineState::getStatus();
        if ($status === MachineState::STATUS_NEED_INPUT) {
            return [];
        }
        if ($status === MachineState::STATUS_FAIL) {
            return ['location' => 'HEAP', 'mode' => SwissCom::SW_WALK];
        }
        return [];
    }

    public static function resumeExam(): void {
        $answer = trim(strtoupper(MachineState::getUserInput()));
        $station = MachineState::getExam();
        $flip = array_flip(SwissCom::SW__ENGL);
        $index = $flip[$station];
        $correctAnswer = SwissCom::SW__ARAB[$index];
        if ($answer !== $correctAnswer) {
            MachineState::setStatus(MachineState::STATUS_FAIL);
            return;
        }
        Score::markExamQuestionPassed($station);
        if (Score::haveFullScore()) {
            MachineState::setStatus(MachineState::STATUS_PASS);
            return;
        }
        self::showExam(++$index);
    }

    public static function showExam(int $index): void {
        $station = SwissCom::SW__ENGL[$index];
        MachineState::setExam($station);
        Kernel::MSGR(sprintf(self::EXAM, $station));
    }

    public static function exam(): array {
        MachineState::setSection(MachineState::SECTION_EXAM);
        Score::clearScore();
        self::showExam(0);
        return [];
    }
}
