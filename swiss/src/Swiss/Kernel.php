<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class Kernel - Emulate kernel functionality
 *
 * @package App\Swiss
 *
 * @method static \App\Swiss\Kernel getInstance()
 */
class Kernel extends Layered {

    /**
     * Line 640 - Send message and accept response
     *
     * @param string $message
     * @return string
     */
    public static function MSGR(string $message): string {
        return static::getInstance()->run_msgr($message);
    }

    public function run_msgr(string $message): string {
        return '';
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
    }

}
