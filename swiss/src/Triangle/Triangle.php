<?php
declare(strict_types=1);

namespace App\Triangle;

class Triangle {
    public static function sTriangle(int $n): int {
        if ($n <= 1) {
            return 1;
        }
        return self::sTriangle($n - 1) + $n;
    }
}

echo Triangle::sTriangle(1) . PHP_EOL;
echo Triangle::sTriangle(5) . PHP_EOL;
