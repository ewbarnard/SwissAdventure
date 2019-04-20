<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class SwPercentMicrosTest extends TestCase {

    public function testMicroSizes() {
        static::assertSame(6, count(SwissCom::SW__DIREC));
        static::assertSame(6, count(SwissCom::SW__DIR2));
        static::assertSame(6, count(SwissCom::SW__MODE));
        static::assertSame(6, count(SwissCom::SW__DIR0));
        static::assertSame(6, count(SwissCom::SW__MODEW));
    }
}
