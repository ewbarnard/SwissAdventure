<?php
declare(strict_types=1);

namespace App\Swiss;

class SwShowDisplayTest extends BaseSwsNex {
    public function dataLocations(): array {
        $data = [];

        $locations = array_keys(SwsDat::SW_BEGIN);
        foreach ($locations as $location) {
            if (($location !== SwsDat::SW_EXAM) && !in_array($location, SwissCom::CKMIC)) {
                $data[] = [$location];
            }
        }

        return $data;
    }

    /**
     * @param string $location
     * @dataProvider dataLocations
     */
    public function testDisplayDescription(string $location): void {
        MachineState::setLocation($location);

        $result = SwShow::run();

        static::assertTrue(is_array($result));
        $messages = MachineState::getMessages();
        static::assertSame(3, count($messages), print_r([
            'location' => $location,
            'messages' => $messages,
        ], true));
    }

    public function dataCheckpoints(): array {
        $data = [];

        $locations = SwissCom::CKMIC;
        foreach ($locations as $location) {
            $data[] = [$location];
        }

        return $data;
    }

    /**
     * @param string $location
     * @dataProvider dataCheckpoints
     */
    public function testDisplayCheckpoint(string $location): void {
        MachineState::setLocation($location);

        $result = SwShow::run();

        static::assertTrue(is_array($result));
        $messages = MachineState::getMessages();
        static::assertSame(4, count($messages), print_r([
            'location' => $location,
            'messages' => $messages,
        ], true));
    }

    public function testBeginExam() {
        MachineState::setLocation(SwsDat::SW_EXAM);

        $result = SwShow::run();

        static::assertTrue(is_array($result));
        $messages = MachineState::getMessages();
        static::assertSame(3, count($messages), print_r($messages, true));
        static::assertSame('01', MachineState::getExam());
    }

    public function dataExam(): array {
        $data = [];

        $exam = array_combine(SwissCom::SW__ARAB, SwissCom::SW__ENGL);
        foreach ($exam as $answer => $station) {
            $data[] = [$station, $answer];
        }
        array_pop($data); // Use all but last question

        return $data;
    }

    /**
     * @param string $station
     * @param string $answer
     * @dataProvider dataExam
     */
    public function testExam(string $station, string $answer): void {
        MachineState::setLocation(SwsDat::SW_EXAM);
        MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
        MachineState::setSection(MachineState::SECTION_EXAM);
        MachineState::setExam($station);
        MachineState::setUserInput($answer);

        $result = SwShow::run();

        static::assertTrue(is_array($result));
        static::assertSame(MachineState::STATUS_NEED_INPUT, MachineState::getStatus());
    }

    /**
     * @param string $station
     * @param string $answer
     * @dataProvider dataExam
     */
    public function testExamFail(string $station, string $answer): void {
        $answer .= 'x';
        MachineState::setLocation(SwsDat::SW_EXAM);
        MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
        MachineState::setSection(MachineState::SECTION_EXAM);
        MachineState::setExam($station);
        MachineState::setUserInput($answer);

        $result = SwShow::run();

        static::assertSame(['location' => 'HEAP', 'mode' => SwissCom::SW_WALK], $result);
        static::assertSame(MachineState::STATUS_FAIL, MachineState::getStatus());
    }

    public function testExamComplete(): void {
        $exam = array_combine(SwissCom::SW__ARAB, SwissCom::SW__ENGL);
        foreach ($exam as $answer => $station) {
            MachineState::setLocation(SwsDat::SW_EXAM);
            MachineState::setStatus(MachineState::STATUS_RECEIVED_INPUT);
            MachineState::setSection(MachineState::SECTION_EXAM);
            MachineState::setExam($station);
            MachineState::setUserInput($answer);
            $result = SwShow::run();
            static::assertTrue(is_array($result));
        }
        static::assertSame(MachineState::STATUS_PASS, MachineState::getStatus());
    }
}
