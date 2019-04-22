<?php
declare(strict_types=1);

namespace App\Swiss;

class SwsNexExamTest extends BaseSwsNex {
    public function testRunPassedQuit() {
        $this->passExam();
        $this->quit();

        $response = SwsNex::run();

        $this->checkSetPassed();
        static::assertSame(['location' => 'VICTORY', 'mode' => 1], $response);
    }

    public function testRunQuit() {
        $this->quit();

        $response = SwsNex::run();

        static::assertSame(SwsNex::quitResponse(), $response);
    }

    public function testRunPrompt() {
        $response = SwsNex::run();

        static::assertSame([], $response);
        static::assertSame([SwsNex::MESSAGE], MachineState::getMessages());
        static::assertSame(MachineState::STATUS_NEED_INPUT, MachineState::getStatus());
    }

    public function testPassedExam(): void {
        $this->passExam();

        static::assertTrue(SwsNex::passedExam());

        MachineState::setLocation('ZURICH');
        static::assertFalse(SwsNex::passedExam());
    }

    public function testSetExamPassed() {
        MachineState::setUserInput('Bogus');
        MachineState::setStatus(MachineState::STATUS_BEGIN);

        SwsNex::setExamPassed();

        $this->checkSetPassed();
    }

    private function checkSetPassed(): void {
        static::assertSame('W', MachineState::getUserInput());
        static::assertSame(MachineState::STATUS_RECEIVED_INPUT, MachineState::getStatus());
    }

    private function passExam(): void {
        static::assertFalse(SwsNex::passedExam());
        MachineState::setLocation('ZURICH');
        static::assertFalse(SwsNex::passedExam());
        MachineState::setLocation(SwsDat::SW_EXAM);
        foreach (SwissCom::CKMIC as $location) {
            static::assertFalse(SwsNex::passedExam());
            Score::markLocationReached($location);
        }
    }

    private function quit(): void {
        MachineState::setUserInput('Quit');
        MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
    }
}
