<?php
declare(strict_types=1);

namespace App\Swiss;

class SwsNexResumeTest extends BaseSwsNex {

    public function testQuit(): void {
        MachineState::setUserInput('quit');

        $response = SwsNex::resume();

        static::assertSame(SwsNex::quitResponse(), $response);
    }

    public function dataBadResponse(): array {
        $data = [];
        $data[] = ['ZURICH', 'U'];
        $data[] = ['ZERMATT', 'south'];
        $data[] = ['BERN', ''];
        return $data;
    }

    /**
     * @param string $location
     * @param string $userInput
     * @dataProvider dataBadResponse
     */
    public function testBadResponse(string $location, string $userInput): void {
        MachineState::setLocation($location);
        MachineState::setUserInput($userInput);

        $response = SwsNex::resume();

        static::assertSame([], $response);
        static::assertSame([SwsNex::MESSAGE], MachineState::getMessages());
        static::assertSame(MachineState::STATUS_NEED_INPUT, MachineState::getStatus());
    }

    public function dataGoodResponse(): array {
        $data = [];
        $data[] = ['ZURICH', 'S', 'BERN', 'SW$TRAIN'];
        $data[] = ['BERN', 'S', 'THUN', 'SW$TRAIN'];
        $data[] = ['THUN', 'U', 'ENTRANC', 'SW$WALK'];
        return $data;
    }

    /**
     * @param string $location
     * @param string $userInput
     * @param string $nextLocation
     * @param string $mode
     * @dataProvider dataGoodResponse
     */
    public function testGoodResponse(string $location, string $userInput, string $nextLocation, string $mode): void {
        MachineState::setLocation($location);
        MachineState::setUserInput($userInput);

        $response = SwsNex::resume();

        static::assertArrayHasKey('location', $response);
        static::assertArrayHasKey('mode', $response);
        static::assertSame($nextLocation, $response['location']);
        static::assertSame(SwissCom::TRAVEL_MODE[$mode], $response['mode']);
    }
}
