<?php
declare(strict_types=1);

namespace App\Swiss;

use PHPUnit\Framework\TestCase;

class MachineStateTest extends TestCase {
    public function setUp() {
        MachineState::reset();
        Score::reset();
    }

    public function testResumeMachine() {
        $reached = ['Station02' => 1];
        $location = 'BOGUS';
        $status = 'Bogus';
        $machine = [
            'location' => $location,
            'messages' => ['Where to, boss?'],
            'section' => 'normal',
            'stationsReached' => $reached,
            'status' => $status,
            'userInput' => 'up',
        ];

        /** @noinspection PhpComposerExtensionStubsInspection */
        MachineState::resumeMachine(json_encode($machine));

        static::assertSame($location, MachineState::getLocation());
        static::assertSame($status, MachineState::getStatus());
        static::assertFalse(Score::haveScore('01'));
        static::assertTrue(Score::haveScore('02'));
    }

    public function testPauseMachine() {
        $reached = ['Station02' => 1];
        $location = 'BOGUS';
        $status = 'Bogus';
        $machine = [
            'exam' => '',
            'location' => $location,
            'messages' => [], // Messages do not get restored
            'section' => 'normal',
            'stationsReached' => $reached,
            'status' => $status,
            'userInput' => 'up',
        ];
        /** @noinspection PhpComposerExtensionStubsInspection */
        $jsonState = json_encode($machine);
        MachineState::resumeMachine($jsonState);

        $actual = MachineState::pauseMachine();

        static::assertSame($jsonState, $actual);
    }
}
