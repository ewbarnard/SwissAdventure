<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class Swiss - Swiss adventure, root overlay (13-63)
 *
 * @package App\Swiss
 ************************************************************************
 *                                                                      *
 *  Name     - SWISS                                                    *
 *                                                                      *
 *  Input    - None                                                     *
 *                                                                      *
 *  Output   - None                                                     *
 *                                                                      *
 *  Function - Root overlay for Swiss Adventure                         *
 *                                                                      *
 *  Method   - 1.  Call SWSWEL to print instructions.                   *
 *             2.  Establish initial location.                          *
 *             3.  While not at last location, call SWSHOW to run the   *
 *                 show.                                                *
 *             4.  Return (terminate).                                  *
 *                                                                      *
 ************************************************************************
 */
class Swiss {
//    public static $userInput = '';
//    public static $status = '';
//    public static $trace = [];

    public static function run(string $userInput = '', string $jsonState = '', string $land = ''): array {
//        self::$trace = []; // Fixme
//        self::$userInput = $userInput; // Fixme
//        self::trace("Swiss::run userInput $userInput");
//        self::trace("Swiss::run jsonState $jsonState");
        self::init($userInput, $jsonState);
        if (MachineState::getSection() === MachineState::SECTION_WELCOME) {
            SwsWel::run();
        }
        if (MachineState::getSection() === MachineState::SECTION_NORMAL) {
            if (MachineState::getStatus() === MachineState::STATUS_BEGIN) {
                $location = $land ? $land : array_rand(SwsDat::ARRIVE);
                MachineState::setLocation($location);
//                self::trace("Swiss::run location $location");
            }
            SwShow::run();
        }


        $messages = MachineState::getMessages();
        $jsonState = MachineState::pauseMachine();
        return ['messages' => $messages, 'jsonState' => $jsonState];
    }

//    public static function trace(string $text): void {
//        self::$trace[] = $text;
//    }

    public static function init(string $userInput, string $jsonState): void {
        MachineState::reset();
        SwsDat::init();
        Score::reset();

        if ($jsonState !== '') {
            MachineState::resumeMachine($jsonState);
        }
//        self::$status = MachineState::getStatus(); // Fixme
//        self::trace("Swiss::init status " . self::$status);
        if ($userInput !== '') {
            MachineState::setUserInput($userInput);
            MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
        }
        if ((MachineState::getStatus() === MachineState::STATUS_NEED_INPUT)) {
            MachineState::setUserInput($userInput);
            MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
        }
        if (MachineState::getSection() === '') {
            MachineState::setSection(MachineState::SECTION_WELCOME);
        }
    }
}
