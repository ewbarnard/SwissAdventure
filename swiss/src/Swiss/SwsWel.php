<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsWel - Print welcome message and instructions (579-650)
 *
 * @package App\Swiss
 */
class SwsWel {
    public const MSG1 = 'Welcome to Swiss Adventure. ' .
    'Have you been here before (answer YES or NO)?';

    public const MSG2 = 'Now is your chance to roam certain parts of Europe. ' .
    'You might find some treasure and get to quit. Or you ' .
    'might not. You can get places by typing direction ' .
    'commands (North, South, East, West, Up, Down). ' .
    'You are most likely to find what you seek in or under ' .
    'castles. Once you find it (or them), you may enter ' .
    'the Winners\' Circle.  Try to avoid the Scrap Heap. ' .
    'If you desperately need to quit, try typing Quit. ' .
    'Commands may be abbreviated to one letter. ' .
    'Off you go now. . .';

    public static function run(): string {
        MachineState::setSection(MachineState::SECTION_WELCOME);
        if (MachineState::getStatus() === MachineState::STATUS_RECEIVED_INPUT) {
            return self::resume();
        }

        Kernel::MSGR(self::MSG1);
        return self::MSG1;
    }

    public static function resume(): string {
        $responseText = strtoupper(trim(MachineState::getUserInput()));
        if (strpos($responseText, 'Y') !== 0) {
            Kernel::MSG(self::MSG2);
        }
        MachineState::setSection(MachineState::SECTION_NORMAL);
        MachineState::setStatus(MachineState::STATUS_BEGIN);
        return $responseText;
    }
}
