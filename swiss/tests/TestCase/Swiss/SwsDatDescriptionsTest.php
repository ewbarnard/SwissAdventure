<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class SwsDatDescriptionsTest extends TestCase {
    public function setUp(): void {
        SwsDat::reset();
        SwsDat::init();
    }

    public function testConstSwBeginCount(): void {
        foreach (SwsDat::SW_BEGIN as $tag => $info) {
            static::assertSame(2, count($info));
        }
    }

    public function testStaticBeginCount(): void {
        foreach (SwsDat::$sw_begin as $tag => $info) {
            static::assertSame(2, count($info));
        }
    }

    public function testBeginHasRoute(): void {
        foreach (SwsDat::$sw_begin as $tag => $info) {
            static::assertArrayHasKey($tag, SwsDat::$sw_begin_route);
        }
    }

    public function testCheckDescriptionCount(): void {
        foreach (SwsDat::$sw_check as $tag => $info) {
            static::assertSame(2, count($info));
        }
    }

    public function testCheckHasRoute(): void {
        foreach (SwsDat::$sw_check as $tag => $info) {
            static::assertArrayHasKey($tag, SwsDat::$sw_check_route);
        }
    }
}
