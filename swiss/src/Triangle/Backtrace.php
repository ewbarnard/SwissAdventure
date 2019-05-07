<?php
declare(strict_types=1);

namespace App\Triangle;

use Exception;

class Backtrace {
    public static function sTriangle(int $n): int {
        if ($n <= 1) {
            throw new \Exception();
        }
        try {
            return self::sTriangle($n - 1) + $n;
        } catch (Exception $e) {
            echo $e->getTraceAsString() . PHP_EOL;
            return -1;
        }
    }
}

echo Backtrace::sTriangle(5) . PHP_EOL;
