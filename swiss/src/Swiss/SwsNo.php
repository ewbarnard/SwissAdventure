<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsNo - Display snide remark (540-578)
 *
 * @package App\Swiss
 *
 * @method static \App\Swiss\SwsNo getInstance()
 */
class SwsNo extends Layered {

    public static function run(): string {
        return static::getInstance()->run_snide();
    }

    public function run_snide(): string {
        $key = $this->pick_key();
        $message = SwsDat::SW_SNIDE[$key];
        Kernel::MSG($message);
        return $message;
    }

    public function pick_key(): string {
        return array_rand(SwsDat::SW_SNIDE);
    }
}
