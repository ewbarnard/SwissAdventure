<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class Kernel - Emulate kernel functionality
 *
 * @package App\Swiss
 */
class Kernel {

    /**
     * Line 640 - Send message and accept response
     *
     * @param string $message
     */
    public static function MSGR(string $message): void {
        MachineState::addMessage($message);
        MachineState::setStatus(MachineState::STATUS_NEED_INPUT);
    }

    /**
     * Line 644 - Send message
     *
     * @param string $message
     */
    public static function MSG(string $message) {
        MachineState::addMessage($message);
    }
}
