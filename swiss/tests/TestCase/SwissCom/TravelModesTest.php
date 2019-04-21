<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class TravelModesTest extends TestCase {

    public function testTravelConstants() {
        static::assertSame(0, SwissCom::SW_UNDEF);
        static::assertSame(1, SwissCom::SW_PASS);
        static::assertSame(2, SwissCom::SW_SCORE);
        static::assertSame(3, SwissCom::SW_QUIT);
        static::assertSame(4, SwissCom::SW_WALK);
        static::assertSame(5, SwissCom::SW_TRAIN);
        static::assertSame(6, SwissCom::SW_ASIDE);
        static::assertSame(7, SwissCom::SW_BACK);
        static::assertSame(7, SwissCom::SW_MAX);
    }
}
