<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class DescriptionsTest extends TestCase {
    public function setUp() {
        SwsDat::reset();
        SwsDat::init();
    }

    public function testConstSwBeginCount() {
        foreach (SwsDat::SW_BEGIN as $tag => $info) {
            static::assertSame(2, count($info));
        }
    }

    public function testStaticBeginCount() {
        foreach (SwsDat::$sw_begin as $tag => $info) {
            static::assertSame(2, count($info));
        }
    }

    public function testBeginHasRoute() {
        foreach (SwsDat::$sw_begin as $tag => $info) {
            static::assertArrayHasKey($tag, SwsDat::$sw_begin_route);
        }
    }

    public function testCheckDescriptionCount() {
        foreach (SwsDat::$sw_check as $tag => $info) {
            static::assertSame(2, count($info));
        }
    }

    public function testCheckHasRoute() {
        foreach (SwsDat::$sw_check as $tag => $info) {
            static::assertArrayHasKey($tag, SwsDat::$sw_check_route);
        }
    }
}
