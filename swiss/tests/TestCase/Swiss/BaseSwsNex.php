<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

abstract class BaseSwsNex extends TestCase {
    public function setUp(): void {
        MachineState::reset();
        SwsDat::init();
        Score::reset();
    }
}
