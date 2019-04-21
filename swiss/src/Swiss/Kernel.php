<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class Kernel - Emulate kernel functionality
 *
 * @package App\Swiss
 *
 * @method static Kernel getInstance()
 */
class Kernel extends Layered {

    /**
     * Line 640 - Send message and accept response
     *
     * @param string $message
     */
    public static function MSGR(string $message): void {
         static::getInstance()->run_msgr($message);
    }

    public function run_msgr(string $message): void {
        MachineState::addMessage($message);
        MachineState::setStatus(MachineState::STATUS_NEED_INPUT);
    }

    /**
     * Line 644 - Send message
     *
     * @param string $message
     */
    public static function MSG(string $message) {
        static::getInstance()->run_msg($message);
    }

    public function run_msg(string $message) {
        MachineState::addMessage($message);
    }

}
