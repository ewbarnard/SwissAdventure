<?php
declare(strict_types=1);

namespace App\Swiss;

class SwsNexReservedDirectionTest extends BaseSwsNex {
    public function dataReserved(): array {
        $data = [];
        $data[] = ['E', 'E'];
        $data[] = ['W', 'WEST'];
        return $data;
    }

    /**
     * @param string $direction
     * @param string $result
     * @dataProvider dataReserved
     */
    public function testReservedDirection(string $direction, string $result): void {
        $actual = SwsNex::reservedDirection($direction);

        static::assertSame($actual, $result);
    }
}
