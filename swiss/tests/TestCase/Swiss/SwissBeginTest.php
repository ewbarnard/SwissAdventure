<?php
declare(strict_types=1);

namespace App\Swiss;

class SwissBeginTest extends BaseSwsNex {
//    public $expected = [];

    public function testWelcomeYes(): void {
        $response1 = Swiss::run();
        $response2 = Swiss::run('yes', $response1['jsonState']);
        static::assertSame(3, count($response2['messages']));
    }

    public function dataArrive(): array {
        $data = [];

        $data[] = ['ZURICH', 'Zurich'];
        $data[] = ['PARIS', 'Paris'];
        $data[] = ['GENEVA', 'Geneva'];
        $data[] = ['MILAN', 'Milan'];

        return $data;
    }

    /**
     * @param string $location
     * @param string $title
     * @dataProvider dataArrive
     */
    public function testArriveYes(string $location, string $title): void {
        $response1 = Swiss::run();
        $response2 = Swiss::run('yes', $response1['jsonState'], $location);
        static::assertSame($title, $response2['messages'][0]);
    }

    public function testWelcomeNo(): void {
        $response1 = Swiss::run();
        $response2 = Swiss::run('NO', $response1['jsonState']);
        static::assertSame(4, count($response2['messages']), print_r($response2, true));
    }

    public function testMoves(): void {
        $this->expected = [];
        $response = Swiss::run();
        $response = Swiss::run('yes', $response['jsonState'], 'ZURICH');
        $this->checkLocation('ZURICH', $response);
        $response = Swiss::run('W', $response['jsonState']);
        $this->checkLocation('BASEL', $response);
        $response = Swiss::run('S', $response['jsonState']);
        $this->checkLocation('BERN', $response);
        $response = Swiss::run('W', $response['jsonState']);
        $this->checkLocation('LAUSANN', $response);
        $response = Swiss::run('W', $response['jsonState']);
        $this->checkLocation('MONTREU', $response);
        $response = Swiss::run('E', $response['jsonState']);
        $this->checkLocation('SPIEZ', $response);
        $response = Swiss::run('N', $response['jsonState']);
        $this->checkLocation('THUN', $response);
    }

    public function checkLocation(string $expected, array $response): void {
//        $this->expected[] = $expected;
        /** @noinspection PhpComposerExtensionStubsInspection */
        $state = json_decode($response['jsonState'], true);
        static::assertSame($expected, $state['location'], print_r([
//            'history' => $this->expected,
//            'trace' => Swiss::$trace,
//            'swissInput' => Swiss::$userInput,
//            'swissStatus' => Swiss::$status,
            'response' => $response], true));
    }
}
