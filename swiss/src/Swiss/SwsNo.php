<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsNo - Display snide remark (540-578)
 *
 * @package App\Swiss
 *
 * @method static SwsNo getInstance()
 */
class SwsNo {

    public static function run(): string {
        $key = array_rand(SwsDat::SW_SNIDE);
        $message = SwsDat::SW_SNIDE[$key];
        Kernel::MSG($message);
        return $message;
    }
}
