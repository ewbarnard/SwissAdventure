<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class PickKeyTest extends TestCase {
    /** @var \App\Swiss\SwsNo */
    private $target;

    public function setUp() {
        $this->target = SwsNo::getInstance();
    }

    public function testKey() {
        $key = $this->target->pick_key();
        static::assertArrayHasKey($key, SwsDat::SW_SNIDE);
    }

    public function testValue() {
        $key = $this->target->pick_key();
        $value = SwsDat::SW_SNIDE[$key];
        $string = (string)$value;
        static::assertSame($string, $value);
        static::assertNotSame('', $value);
    }
}
